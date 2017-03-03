<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    // require_once "src/Brand.php";
    require_once "src/Store.php";

    $server = 'mysql:host=localhost:8889;dbname=shoes_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    class StoreTest extends PHPUnit_Framework_TestCase
    {

        // protected function tearDown()
        // {
        //     Brand::deleteAll();
        //     Store::deleteAll();
        // }

        function test_save()
        {
            ///   Arrange   ///
            $store_name = "REI";
            $store_phone = "5032211938";
            $store_address = "1405 NW Johnson St. Portland, OR";
            $store_id = 1;

            ///   Act   ///
            $result = Store::getAll();

            ///   Assert   ///
            $this->assertEquals([$new_store], $result);
        }


    }
?>
