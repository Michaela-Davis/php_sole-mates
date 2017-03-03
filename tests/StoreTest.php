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


        function test_getStoreName()
        {
            ///   Arrange   ///
            $store_name = "REI";
            $store_phone = "5032211938";
            $store_address = "St Portland OR";
            $new_store = new Store($store_name, $store_phone, $store_address);
            $new_store->save();

            ///   Act   ///
            $result = $new_store->getStoreName($store_name);

            ///   Assert   ///
            $this->assertEquals($store_name, $result);
        }


        function test_getStorePhone()
        {
            ///   Arrange   ///
            $store_name = "REI";
            $store_phone = "5032211938";
            $store_address = "St Portland OR";
            $new_store = new Store($store_name, $store_phone, $store_address);
            $new_store->save();

            ///   Act   ///
            $result = $new_store->getStorePhone($store_phone);

            ///   Assert   ///
            $this->assertEquals($store_phone, $result);
        }

        function test_getStoreAddress()
        {
            ///   Arrange   ///
            $store_name = "REI";
            $store_phone = "5032211938";
            $store_address = "1405 NW Johnson St. Portland, OR";
            $new_store = new Store($store_name, $store_phone, $store_address);
            $new_store->save();

            ///   Act   ///
            $result = $new_store->getStoreAddress($store_address);

            ///   Assert   ///
            $this->assertEquals($store_address, $result);
        }

        function test_getStoreId()
        {
            ///   Arrange   ///
            $store_name = "REI";
            $store_phone = "5032211938";
            $store_address = "1405 NW Johnson St. Portland, OR";
            $store_id = null;
            $new_store = new Store($store_name, $store_phone, $store_address);
            $new_store->save();

            ///   Act   ///
            $result = $new_store->getStoreId($store_id);

            ///   Assert   ///
            $this->assertEquals($store_id, $result);
        }

        // function test_save()
        // {
        //     ///   Arrange   ///
        //     $store_name = "REI";
        //     $store_phone = "5032211938";
        //     $store_address = "St Portland OR";
        //
        //     $new_store = new Store($store_name, $store_phone, $store_address);
        //     $new_store->save();
        //
        //     ///   Act   ///
        //     $result = Store::getAll();
        //
        //     ///   Assert   ///
        //     $this->assertEquals([$new_store], $result);
        // }


    }
?>
