<?php

    date_default_timezone_set('America/Los_Angeles');
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Stylist.php";

    use Symfony\Component\HttpFoundation\Request;
    Request::enableHttpMethodParameterOverride();

    $server = 'mysql:host=localhost:3306;dbname=hair_salon';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    use Symfony\Component\Debug\Debug;
    Debug::enable();

    $app = new Silex\Application();

    $app['debug'] = true;

    $app->register(
       new Silex\Provider\TwigServiceProvider(),
       array('twig.path' => __DIR__.'/../views')
    );

    $app->get("/", function() use ($app){
        return $app['twig']->render('index.html.twig', ['stylists' => Stylist::getAll()]);
    });

    $app->post("/stylist", function() use ($app) {
        $stylist = new Stylist(filter_var($_POST['stylist'],FILTER_SANITIZE_MAGIC_QUOTES));
        $stylist->save();
        return $app['twig']->render('index.html.twig', ['stylists' => Stylist::getAll()]);
    });

    $app->get('/edit-stylist/{id}', function($id) use ($app) {
        $edit_stylist = Stylist::find($id);
        return $app['twig']->render('edit-stylist.html.twig', ['editstylist' => $edit_stylist]);
    });

   //  $app->patch("/updatestylist/{id}", function($id) use ($app) {
   //     $stylist = Stylist::find($id);
   //     $stylist_id = $stylist->getId();
   //     $update_stylist = $_POST['update'];
   //     $stylist->update($update_stylist);
   //     return $app['twig']->render('index.html.twig', ['stylists' => Stylist::getAll(), 'stylist' => $stylist, 'stylist_id' => $stylist->getId()]);
   // });

   // $app->get('/deleterestaurant/{id}', function($id) use ($app) {
   //     $find_stylist = Stylist::find($id);
   //     $stylist_id = $find_stylist->getId();
   //     $find_stylist->delete();
   //     return $app['twig']->render('index.html.twig', array('stylists' => Stylist::getMatch($stylist_id), 'stylist_id'=> $stylist_id, 'stylist' => Stylist::getStylistName($stylist_id)));
   //
   // });

    $app->get('/delete-all', function() use ($app) {
        Stylist::deleteAll();
        return $app['twig']->render('index.html.twig', ['stylists' => Stylist::getAll()]);
    });
    return $app;
 ?>
