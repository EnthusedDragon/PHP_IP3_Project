<?php

    class Item {
        private $item_id;
        private $item_code;
        private $item_name;
        private $item_price;
        
        public function __construct($id, $code, $name, $price) {
            
            $this->item_id = $id;
            $this->item_code = $code;
            $this->item_name = $name;
            $this->item_price = $price;
        }
        
        public function getID() {
            return $this->item_id;
        }
        
        public function getCode() {
            return $this->item_code;
        }
        
        public function getName() {
            return $this->item_name;
        }
        
        public function getPrice() {
            return $this->item_price;
        }
    }
