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

        // protected function tearDown()
        // {
        //     Brand::deleteAll();
        //     Store::deleteAll();
        // }

        function test_save()
        {
            ///   Arrange   ///
            $id = 1;
            $client_name = "Michaela";

            ///   Act   ///
            $result = Brand::getAll();

            ///   Assert   ///
            $this->assertEquals([$new_brand], $result);
        }


    }
?>
