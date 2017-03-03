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
