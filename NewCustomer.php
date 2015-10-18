<?php

    if (isset($_GET["btnSubmit"])) {
            
        get();
    }
    
    function get() {
        
        $name = $_GET["name"];
        $surname = $_GET["surname"];
        $address = $_GET["address"];
        $email = $_GET["email"];
        $password = $_GET["password1"];
        $bank = $_GET["bank"];
        $card_no = $_GET["cardNo"];
        
        $conn = new mysqli("localhost","root","fjab1991","ip3_php_project_db");
        $query = "INSERT INTO customer(customer_name,customer_surname,customer_address,customer_email,customer_password,customer_bank,customer_card_no) VALUES('$name', '$surname', '$address', '$email', '$password', '$bank', '$card_no')";

        if ($conn->connect_error) {

            die('Could not connect to database!');
        }
        else {

            if($conn->query($query)) {
                
                echo 'Account created. You may login.';
                $doc = new DOMDocument();
                $doc->loadHTMLFile("LoginPage.html");
                echo $doc->saveHTML();
            }
            else {
                
                echo $conn->error;
            }
        }
    }
?>

