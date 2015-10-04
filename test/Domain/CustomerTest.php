<?php

    require_once('C:/xampp/htdocs/ip3_PHP_project/Domain/Customer.php');  
    
    class CustomerTest extends PHPUnit_Framework_TestCase{
        
        public function testCustomer() {
            
            $customer = new Customer(3, "asd", "asd", "asd", "asd@asd", "asd3", "asd", 321);
            
            $this->assertEquals(3, $customer->getID());
            $this->assertEquals("asd", $customer->getName());
            $this->assertEquals("asd", $customer->getSurname());
            $this->assertEquals("asd", $customer->getAddress());
            $this->assertEquals("asd@asd", $customer->getEmail());
            $this->assertEquals("asd3", $customer->getPassword());
            $this->assertEquals("asd", $customer->getBank());
            $this->assertEquals(321, $customer->getCardNo());
        }
    }
?>
