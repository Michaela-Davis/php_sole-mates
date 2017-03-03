<?php
    class Store
    {
        private $store_name;
        private $store_phone;
        private $store_address;
        private $store_id;

        function __construct($store_name, $store_phone, $store_address, $store_id = null)
        {
            $this->store_name = $store_name;
            $this->store_phone = $store_phone;
            $this->$store_address = $$store_address;
            $this->store_id = $store_id;
        }

        ///   Store Name getter and setter   ///
        function getStoreName()
        {
            return $this->store_name;
        }

        function setStoreName($new_name)
        {
            $this->store_name = (string) $new_name;
        }

        ///   Store Phone getter and setter   ///
        function getStorePhone()
        {
            return $this->store_phone;
        }

        function setStorePhone($new_phone)
        {
            $this->store_phone = (string) $new_phone;
        }

        ///   Store Phone getter and setter   ///
        function getStoreAddress()
        {
            return $this->store_address;
        }

        function setStoreAddress($new_address)
        {
            $this->store_address = (string) $new_address;
        }

        ///   StoreId getter  ///
        function getStoreId()
        {
            return $this->store_id;
        }


        /////     begin METHODS     /////

        /////     end METHODS     /////


        /////     begin Static METHODS     /////

        /////     end Static METHODS     /////
    }
?>
