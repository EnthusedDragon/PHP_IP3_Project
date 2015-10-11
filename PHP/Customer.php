<?php

    class Customer {
        
        private $id;
        private $name;
        private $surname;
        private $address;
        private $email;
        private $password;
        private $bank;
        private $card_no;
        
        public function __construct($id, $name, $surname, $address, $email, $password, $bank, $card_no) {
            
            $this->id = $id;
            $this->name = $name;
            $this->surname = $surname;
            $this->address = $address;
            $this->email = $email;
            $this->password = $password;
            $this->bank = $bank;
            $this->card_no = $card_no;
        }
        
        public function getID() {
            return $this->id;
        }
        
        public function getName() {
            return $this->name;
        }
        
        public function getSurname() {
            return $this->surname;
        }
        
        public function getAddress() {
            return $this->address;
        }
        
        public function getEmail() {
            return $this->email;
        }
        
        public function getPassword() {
            return $this->password;
        }
        
        public function getBank() {
            return $this->bank;
        }
        
        public function getCardNo() {
            return $this->card_no;
        }
    }
?>