<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once "src/Brand.php";
    require_once "src/Store.php";

    $server = 'mysql:host=localhost:8889;dbname=shoes_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    class StoreTest extends PHPUnit_Framework_TestCase
    {
        protected function tearDown()
        {
            Brand::deleteAll();
            Store::deleteAll();
        }

        function test_getStoreName()
        {
            ///   Arrange   ///
            $store_name = "REI";
            $store_phone = "5032211938";
            $store_address = "1405 NW Johnson St. Portland, OR";
            $new_store = new Store($store_name, $store_phone, $store_address);
            $new_store->save();

            ///   Act   ///
            $result = $new_store->getStoreName($store_name);

            ///   Assert   ///
            $this->assertEquals($store_name, $result);
        }

        function test_setStoreName()
        {
            ///   Arrange   ///
            $store_name = "REI";
            $store_phone = "5032211938";
            $store_address = "1405 NW Johnson St. Portland, OR";

            $testGetStoreName = new Store($store_name, $store_phone, $store_address);

            ///   Act   ///
            $testGetStoreName->setStoreName("REI");
            $result = $testGetStoreName->getStoreName();

            ///   Assert   ///
            $this->assertEquals("REI", $result);
        }


        function test_getStorePhone()
        {
            ///   Arrange   ///
            $store_name = "REI";
            $store_phone = "5032211938";
            $store_address = "1405 NW Johnson St. Portland, OR";
            $new_store = new Store($store_name, $store_phone, $store_address);
            $new_store->save();

            ///   Act   ///
            $result = $new_store->getStorePhone($store_phone);

            ///   Assert   ///
            $this->assertEquals($store_phone, $result);
        }

        function test_setStorePhone()
        {
            ///   Arrange   ///
            $store_name = "REI";
            $store_phone = "5032211938";
            $store_address = "1405 NW Johnson St. Portland, OR";

            $testGetStorePhone = new Store($store_name, $store_phone, $store_address);

            ///   Act   ///
            $testGetStorePhone->setStorePhone("5032211938");
            $result = $testGetStorePhone->getStorePhone();

            ///   Assert   ///
            $this->assertEquals("5032211938", $result);
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
            $this->assertEquals("1405 NW Johnson St. Portland, OR", $result);
        }

        function test_setStoreAddress()
        {
            ///   Arrange   ///
            $store_name = "REI";
            $store_phone = "5032211938";
            $store_address = "St Portland OR";

            $testGetStoreAddress = new Store($store_name, $store_phone, $store_address);

            ///   Act   ///
            $testGetStoreAddress->setStoreAddress("5032211938");
            $result = $testGetStoreAddress->getStoreAddress();

            ///   Assert   ///
            $this->assertEquals("5032211938", $result);
        }


        function test_getStoreId()
        {
            ///   Arrange   ///
            $store_name = "REI";
            $store_phone = "5032211938";
            $store_address = "1405 NW Johnson St. Portland, OR";
            $store_id = 1;

            $testGetStoreId = new Store($store_name, $store_phone, $store_address, $store_id);

            ///   Act   ///
            $result = $testGetStoreId->getStoreId($store_id);

            ///   Assert   ///
            $this->assertEquals($store_id, $result);
        }

        function test_save()
        {
            ///   Arrange   ///
            $store_name = "REI";
            $store_phone = "5032211938";
            $store_address = "1405 NW Johnson St. Portland, OR";

            $new_store = new Store($store_name, $store_phone, $store_address);
            $new_store->save();

            ///   Act   ///
            $result = Store::getAll();

            ///   Assert   ///
            $this->assertEquals($new_store, $result[0]);
        }

        function testGetAll()
        {
            //Arrange
            $store_name = "REI";
            $store_phone = "5032211938";
            $store_address = "1405 NW Johnson St. Portland, OR";

            $testGetStoreName = new Store($store_name, $store_phone, $store_address);
            $testGetStoreName->save();

            $store_name2 = "Next Adventure";
            $store_phone2 = "5032330706";
            $store_address2 = "426 SE Grand Ave, Portland, OR 97214";

            $testGetStoreName2 = new Store($store_name, $store_phone, $store_address);
            $testGetStoreName2->save();

            //Act
            $result = Store::getAll();

            //Assert
            $this->assertEquals([$testGetStoreName, $testGetStoreName2], $result);
        }

        function testUpdate()
        {
            //Arrange
            $store_name = "REI";
            $store_phone = "5032211938";
            $store_address = "1405 NW Johnson St. Portland, OR";

            $testGetStoreName = new Store($store_name, $store_phone, $store_address);
            $testGetStoreName->save();

            $new_store_name = "Next Adventure";
            $new_store_phone = "5032330706";
            $new_store_address = "426 SE Grand Ave, Portland, OR 97214";

            //Act
            $testGetStoreName->update($new_store_name, $new_store_phone, $new_store_address);

            //Assert
            $this->assertEquals($new_store_name, $testGetStoreName->getStoreName());
        }

        function testDeleteStore()
        {
            //Arrange
            $store_name = "REI";
            $store_phone = "5032211938";
            $store_address = "1405 NW Johnson St. Portland, OR";

            $testGetStoreName = new Store($store_name, $store_phone, $store_address);
            $testGetStoreName->save();

            $store_name2 = "Next Adventure";
            $store_phone2 = "5032330706";
            $store_address2 = "426 SE Grand Ave, Portland, OR 97214";

            $testGetStoreName2 = new Store($store_name, $store_phone, $store_address);
            $testGetStoreName2->save();

            //Act
            $testGetStoreName->delete();

            //Assert
            $this->assertEquals([$testGetStoreName2], Store::getAll());
        }

        function testDeleteAll()
        {
            //Arrange
            $store_name = "REI";
            $store_phone = "5032211938";
            $store_address = "1405 NW Johnson St. Portland, OR";

            $testGetStoreName = new Store($store_name, $store_phone, $store_address);
            $testGetStoreName->save();

            $store_name2 = "Next Adventure";
            $store_phone2 = "5032330706";
            $store_address2 = "426 SE Grand Ave, Portland, OR 97214";

            $testGetStoreName2 = new Store($store_name, $store_phone, $store_address);
            $testGetStoreName2->save();

            //Act
            Store::deleteAll();

            //Assert
            $result = Store::getAll();
            $this->assertEquals([], $result);
        }
    }
?>
