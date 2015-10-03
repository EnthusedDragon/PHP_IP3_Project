<?php

    class Customer {
        
        private $id;
        private $name;
        private $surname;
        private $address;
        private $bank;
        private $card_no;
        
        /**
         * 
         * @assert (1, param1) == 1
         */
        function __construct($id, $name, $surname, $address, $bank, $card_no) {
            
            $this->id = $id;
            $this->name = $name;
            $this->surname = $surname;
            $this->address = $address;
            $this->bank = $bank;
            $this->card_no = $card_no;
        }
    }
?>
