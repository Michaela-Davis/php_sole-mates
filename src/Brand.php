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

        /////     end METHODS     /////


        /////     begin Static METHODS     /////

        /////     end Static METHODS     /////
    }
?>
