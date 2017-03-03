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

    class BrandTest extends PHPUnit_Framework_TestCase
    {
        protected function tearDown()
        {
            Brand::deleteAll();
            Store::deleteAll();
        }

        function test_getBrandName()
        {
            ///   Arrange   ///
            $brand_name = "Vibram FiveFingers";
            $new_brand = new Brand($brand_name);
            $new_brand->save();

            ///   Act   ///
            $result = $new_brand->getBrandName($brand_name);

            ///   Assert   ///
            $this->assertEquals($brand_name, $result);
        }

        function test_setBrandName()
        {
            ///   Arrange   ///
            $brand_name = "Vibram FiveFingers";
            $new_brand = new Brand($brand_name);

            $testGetBrandName = new Brand($brand_name);

            ///   Act   ///
            $testGetBrandName->setBrandName("Chacos");
            $result = $testGetBrandName->getBrandName();

            ///   Assert   ///
            $this->assertEquals("Chacos", $result);
        }

        function test_getBrandId()
        {
            ///   Arrange   ///
            $brand_name = "Vibram FiveFingers";
            $brand_id = 1;

            $testGetBrandId = new Brand($brand_name, $brand_id);

            ///   Act   ///
            $result = $testGetBrandId->getBrandId($brand_id);

            ///   Assert   ///
            $this->assertEquals($brand_id, $result);
        }

        // function test_save()
        // {
        //     ///   Arrange   ///
        //     $store_name = "REI";
        //     $store_phone = "5032211938";
        //     $store_address = "1405 NW Johnson St. Portland, OR";
        //
        //     $new_store = new Store($store_name, $store_phone, $store_address);
        //     $new_store->save();
        //
        //     ///   Act   ///
        //     $result = Store::getAll();
        //
        //     ///   Assert   ///
        //     $this->assertEquals($new_store, $result[0]);
        // }
        //
        // function testGetAll()
        // {
        //     //Arrange
        //     $store_name = "REI";
        //     $store_phone = "5032211938";
        //     $store_address = "1405 NW Johnson St. Portland, OR";
        //
        //     $testGetStoreName = new Store($store_name, $store_phone, $store_address);
        //     $testGetStoreName->save();
        //
        //     $store_name2 = "Next Adventure";
        //     $store_phone2 = "5032330706";
        //     $store_address2 = "426 SE Grand Ave, Portland, OR 97214";
        //
        //     $testGetStoreName2 = new Store($store_name, $store_phone, $store_address);
        //     $testGetStoreName2->save();
        //
        //     //Act
        //     $result = Store::getAll();
        //
        //     //Assert
        //     $this->assertEquals([$testGetStoreName, $testGetStoreName2], $result);
        // }
        //
        // function testUpdate()
        // {
        //     //Arrange
        //     $store_name = "REI";
        //     $store_phone = "5032211938";
        //     $store_address = "1405 NW Johnson St. Portland, OR";
        //
        //     $testGetStoreName = new Store($store_name, $store_phone, $store_address);
        //     $testGetStoreName->save();
        //
        //     $new_store_name = "Next Adventure";
        //     $new_store_phone = "5032330706";
        //     $new_store_address = "426 SE Grand Ave, Portland, OR 97214";
        //
        //     //Act
        //     $testGetStoreName->update($new_store_name, $new_store_phone, $new_store_address);
        //
        //     //Assert
        //     $this->assertEquals($new_store_name, $testGetStoreName->getStoreName());
        // }
        //
        // function testDeleteStore()
        // {
        //     //Arrange
        //     $store_name = "REI";
        //     $store_phone = "5032211938";
        //     $store_address = "1405 NW Johnson St. Portland, OR";
        //
        //     $testGetStoreName = new Store($store_name, $store_phone, $store_address);
        //     $testGetStoreName->save();
        //
        //     $store_name2 = "Next Adventure";
        //     $store_phone2 = "5032330706";
        //     $store_address2 = "426 SE Grand Ave, Portland, OR 97214";
        //
        //     $testGetStoreName2 = new Store($store_name, $store_phone, $store_address);
        //     $testGetStoreName2->save();
        //
        //     //Act
        //     $testGetStoreName->delete();
        //
        //     //Assert
        //     $this->assertEquals([$testGetStoreName2], Store::getAll());
        // }
        //
        // function testDeleteAll()
        // {
        //     //Arrange
        //     $store_name = "REI";
        //     $store_phone = "5032211938";
        //     $store_address = "1405 NW Johnson St. Portland, OR";
        //
        //     $testGetStoreName = new Store($store_name, $store_phone, $store_address);
        //     $testGetStoreName->save();
        //
        //     $store_name2 = "Next Adventure";
        //     $store_phone2 = "5032330706";
        //     $store_address2 = "426 SE Grand Ave, Portland, OR 97214";
        //
        //     $testGetStoreName2 = new Store($store_name, $store_phone, $store_address);
        //     $testGetStoreName2->save();
        //
        //     //Act
        //     Store::deleteAll();
        //
        //     //Assert
        //     $result = Store::getAll();
        //     $this->assertEquals([], $result);
        // }
    }
?>
