<?php
    date_default_timezone_set('America/Los_Angeles');
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Brand.php";
    require_once __DIR__."/../src/Store.php";

    $app = new Silex\Application();

    $server = 'mysql:host=localhost:8889;dbname=shoes';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    $app->register(new Silex\Provider\TwigServiceProvider(), array('twig.path' => __DIR__.'/../views'
    ));

    $app['debug'] = true;

    use Symfony\Component\HttpFoundation\Request;
    Request::enableHttpMethodParameterOverride();


    $app->get("/", function() use ($app) {
        $blank_form = array();
        return $app['twig']->render('stores.html.twig', array('stores'=> Store::getAll(), 'blank_form' => $blank_form));
    });

    ///////////      begin BRAND Routes      ///////////

    $app->get("/brands", function() use ($app) {
        $blank_form = array();
        return $app['twig']->render('brands.html.twig', array('brands'=> Brand::getAll(), 'blank_form' => $blank_form));
    });

    $app->post("/add-brand", function() use ($app) {
        $new_brand_name = $_POST['brand_name'];
        $new_brand_name = str_replace("'", "", $new_brand_name);
        $blank_form = array();
        if (!$new_brand_name) {
            array_push($blank_form, "empty");
        } else {
            $new_brand = new Brand($new_brand_name);
            $new_brand->save();
        }

        return $app['twig']->render('brands.html.twig', array('brands'=> Brand::getAll(), 'blank_form' => $blank_form));
    });

    $app->post("/add-store-to-brand/{brand_id}", function($brand_id) use ($app) {
        $store = Store::findStore($_POST['store_to_add']);
        $brand = Brand::findBrand($brand_id);
        $blank_form = array();

        $brand->addStore($store);

        return $app['twig']->render('brands.html.twig', array('brands'=> Brand::getAll(), 'blank_form' => $blank_form));
    });

    $app->get("/brands/{brand_id}", function($brand_id) use ($app) {

        $search_brand = Brand::findBrand($brand_id);
        $blank_form = array();

        return $app['twig']->render('brand.html.twig', array('brand' => $search_brand, 'stores_that_sell_brand' => $search_brand->getStoresSelling(), 'all_stores' => Store::getAll(), 'blank_form' => $blank_form));
    });

    $app->delete("/brands/{brand_id}", function($brand_id) use ($app) {
        $brand = Brand::findBrand($brand_id);
        $brand->delete();
        $blank_form = array();
        return $app['twig']->render('brands.html.twig', array('brands' => Brand::getAll(), 'blank_form' => $blank_form));
    });

    ///////////      end BRAND Routes      ///////////



    ///////////      begin STORE Routes      ///////////

    $app->post("/add-store", function() use ($app) {
        $new_store_name = $_POST['store_name'];
        $new_store_phone = $_POST['store_phone'];
        $new_store_address = $_POST['store_address'];
        $new_store_name = str_replace("'", "", $new_store_name);
        $new_store_address = str_replace("'", "", $new_store_address);
        $blank_form = array();
        if (!$new_store_name) {
            array_push($blank_form, "empty");
        } else {
            $new_store = new Store($new_store_name, $new_store_phone, $new_store_address);
            $new_store->save();
        }

        return $app['twig']->render('stores.html.twig', array('stores'=> Store::getAll(), 'blank_form' => $blank_form));
    });

    $app->get("/stores/{store_id}", function($store_id) use ($app) {

        $search_store = Store::findStore($store_id);
        $blank_form = array();

        return $app['twig']->render('store.html.twig', array('store' => $search_store, 'store_brands' => $search_store->getBrandsSold(), 'all_brands' => Brand::getAll(), 'blank_form' => $blank_form));
    });

    $app->post("/add-brand-to-store/{store_id}", function($store_id) use ($app) {

        $store = Store::findStore($store_id);
        $brand = Brand::findBrand($_POST['brand_to_add']);
        $blank_form = array();
        $brand->addStore($store);

        // go back to store page at `/stores/{store_id}`
        return $app->redirect("/stores/" . $store_id);
    });

    $app->delete("/stores/{store_id}", function($store_id) use ($app) {
        $store = Store::findStore($store_id);
        $store->delete();
        $blank_form = array();
        return $app['twig']->render('stores.html.twig', array('stores' => Store::getAll(), 'blank_form' => $blank_form));
    });

    $app->post("/delete-all-stores", function() use ($app) {
        Store::deleteAll();
        $blank_form = array();
        return $app['twig']->render('stores.html.twig', array('stores' => Store::getAll(), 'blank_form' => $blank_form));
    });

    $app->patch("/edit-store-info/{store_id}", function($store_id) use ($app) {

        $this_store = Store::findStore($store_id);
        $store_name = $_POST['store_name'];
        $store_phone = $_POST['store_phone'];
        $store_address = $_POST['store_address'];
        $this_store->update($store_name, $store_phone, $store_address);
        $blank_form = array();
        return $app['twig']->render('store.html.twig', array('store' => $this_store, 'store_brands' => $this_store->getBrandsSold(), 'all_brands' => Brand::getAll(), 'blank_form' => $blank_form));
    });

    ///////////      end STORE Routes      ///////////


    return $app;
?>
