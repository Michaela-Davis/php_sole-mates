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

        return $app['twig']->render('store.html.twig', array('store' => $search_store, 'brands' => $search_store->getBrandsSold(), 'blank_form' => $blank_form));
    });

    // Not needed
    // // Gets the form to display
    // $app->get("/stores/{store_id}/edit", function($store_id) use ($app) {
    //     $store = Store::findStore($store_id);
    //     return $app['twig']->render('storeEdit.html.twig', array('store' => $store));
    // });
    //
    // // Edits the form data in the DB
    // $app->post("/stores/{store_id}/edit", function($store_id) use ($app) {
    //     $this_store = Store::findStore($store_id);
    //     $name = $_POST['store_name'];
    //     $phone = $_POST['store_phone'];
    //     $address = $_POST['store_address'];
    //     var_dump($this_store);
    //     $this_store->update($name, $phone, $address);
    //     var_dump($this_store);
    //
    //     return $app['twig']->render('storeEdit.html.twig', array('store' => $this_store));
    // });

    $app->patch("/stores/{store_id}", function($store_id) use ($app) {
        $name = $_POST['store_name'];
        $this_store = Store::findStore($store_id);
        $this_store->update($store_name);
        $blank_form = array();
        return $app['twig']->render('stores.html.twig', array('store' => $this_store, 'stores' => Store::getAll(), 'blank_form' => $blank_form));
    });

    $app->delete("/stores/{store_id}", function($store_id) use ($app) {
        $store = Store::findStore($store_id);
        $store->delete();
        $blank_form = array();
        return $app['twig']->render('stores.html.twig', array('stores' => Store::getAll(), 'blank_form' => $blank_form));
    });


    ///////////      end STORE Routes      ///////////


    return $app;
?>
