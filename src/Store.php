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
            $this->store_address = $store_address;
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

        ///   Store Address getter and setter   ///
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
        function save()
        {
            $GLOBALS['DB']->exec("INSERT INTO stores (store_name, store_phone, store_address) VALUES ('{$this->getStoreName()}', '{$this->getStorePhone()}', '{$this->getStoreAddress()}');");
            $this->store_id = $GLOBALS['DB']->lastInsertId();
        }

        function update($new_store_name, $new_store_phone, $new_store_address)
        {
            $GLOBALS['DB']->exec("UPDATE stores SET store_name = '{$new_store_name}', store_phone = '{$new_store_phone}', store_address = '{$new_store_address}' WHERE id = {$this->getStoreId()};");
            $this->setStoreName($new_store_name);
            $this->setStorePhone($new_store_phone);
            $this->setStoreAddress($new_store_address);
        }
        /////     end METHODS     /////


        /////     begin Static METHODS     /////
        static function getAll()
        {
            $returned_stores = $GLOBALS['DB']->query("SELECT * FROM stores ORDER BY store_name ASC;");
            $all_stores = array();
            foreach($returned_stores as $store) {
                $store_name = $store['store_name'];
                $store_phone = $store['store_phone'];
                $store_address = $store['store_address'];
                $store_id = $store['store_id'];
                $new_store = new Store($store_name, $store_phone, $store_address, $store_id);
                array_push($all_stores, $new_store);
            }
            return $all_stores;
        }

        static function deleteAll()
        {
          $GLOBALS['DB']->exec("DELETE FROM stores;");
        }
        /////     end Static METHODS     /////
    }
?>
