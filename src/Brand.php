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
            $GLOBALS['DB']->exec("INSERT INTO brands (brand_name) VALUES ('{$this->getBrandName()}');");
            $this->brand_id = $GLOBALS['DB']->lastInsertId();
        }

        function addStore($store)
        {
            $GLOBALS['DB']->exec("INSERT INTO brands_stores (br_id, st_id) VALUES ({$this->getBrandId()}, {$store->getStoreId()});");
        }

        function getStoresSelling()
        {
            $return_stores = $GLOBALS['DB']->query("SELECT stores.* FROM brands JOIN brands_stores ON (brands.brand_id = brands_stores.br_id) JOIN stores ON (brands_stores.st_id = stores.store_id) WHERE brands.brand_id = {$this->getBrandId()};");

            $stores = array();

            foreach ($return_stores as $store) {
                $store_name = $store['store_name'];
                $store_phone = $store['store_phone'];
                $store_address = $store['store_address'];
                $store_id = $store['store_id'];
                $new_store = new Store($store_name, $store_phone, $store_address, $store_id);
                array_push($stores, $new_store);
            }
            return $stores;
        }
        /////     end METHODS     /////


        /////     begin Static METHODS     /////
        static function getAll()
        {
            $returned_brands = $GLOBALS['DB']->query("SELECT * FROM brands ORDER BY brand_name ASC;");
            $all_brands = array();
            foreach($returned_brands as $brand) {
                $brand_name = $brand['brand_name'];
                $brand_id = $brand['brand_id'];
                $new_brand = new Brand($brand_name, $brand_id);
                array_push($all_brands, $new_brand);
            }
            return $all_brands;
        }

        static function deleteAll()
        {
          $GLOBALS['DB']->exec("DELETE FROM brands;");
        }
        /////     end Static METHODS     /////
    }
?>
