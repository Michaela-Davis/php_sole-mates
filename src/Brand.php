<?php
    class Brand
    {
        private $brand_name;
        private $brand_id;

        function __construct($brand_name, $brand_id = null)
        {
            $this->brand_name = $brand_name;
            $this->brand_id = $brand_id;
        }


        ///   Brand Name getter and setter   ///
        function getBrandName()
        {
            return $this->brand_name;
        }

        function setBrandName($new_name)
        {
            $this->brand_name = (string) $new_name;
        }

        ///   BrandId getter  ///
        function getBrandId()
        {
            return $this->brand_id;
        }


        /////     begin METHODS     /////
        function save()
        {
            $GLOBALS['DB']->exec("INSERT INTO stores (store_name) VALUES ('{$this->getBrandName()}');");
            $this->brand_id = $GLOBALS['DB']->lastInsertId();
        }
        /////     end METHODS     /////


        /////     begin Static METHODS     /////
        // static function getAll()
        // {
        //     $returned_stores = $GLOBALS['DB']->query("SELECT * FROM stores ORDER BY store_name ASC;");
        //     $all_stores = array();
        //     foreach($returned_stores as $store) {
        //         $store_name = $store['store_name'];
        //         $store_phone = $store['store_phone'];
        //         $store_address = $store['store_address'];
        //         $store_id = $store['store_id'];
        //         $new_store = new Store($store_name, $store_phone, $store_address, $store_id);
        //         array_push($all_stores, $new_store);
        //     }
        //     return $all_stores;
        // }

        static function deleteAll()
        {
          $GLOBALS['DB']->exec("DELETE FROM brands;");
        }
        /////     end Static METHODS     /////
    }
?>
