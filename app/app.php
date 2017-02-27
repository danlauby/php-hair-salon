<?php

    date_default_timezone_set('America/Los_Angeles');
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Stylist.php";
    require_once __DIR__."/../src/Client.php";


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
       return $app['twig']->render('index.html.twig', ["stylists" => Stylist::getAll()]);
   });

   $app->post("/", function() use ($app) {
       $stylist = new Stylist(filter_var($_POST['stylist'], FILTER_SANITIZE_MAGIC_QUOTES));
       $stylist->save();
       return $app['twig']->render('index.html.twig', ["stylists" => Stylist::getAll()]);
   });
  //
  //  $app->get("/stylist/{stylist}-{id}/edit", function($stylist, $id) use ($app) {
  //   $stylist = Stylist::find($id);
  //   return $app['twig']->render('edit-stylist.html.twig', array('stylist' => $stylist));
  // });
  // //INDEX-PATCH EDIT PAGE (for STYLIST)
  // $app->patch("/stylist/{stylist}-{id}/edit", function($stylist, $id) use ($app) {
  //   $change_stylist_name = $_POST['change_stylist_name'];
  //   $stylist = Stylist::find($id);
  //   $stylist->update($change_stylist_name);
  //   return $app['twig']->render('index.html.twig', array("stylists" => Stylist::getAll()));
  // });
  //
  //
  //   //INDEX_GET DELETE PAGE (for STYLIST)
  //   $app->get("/stylist/{stylist}-{id}/deleted", function($stylist, $id) use ($app) {
  //       $stylist = Stylist::find($id);
  //       $stylist->delete();
  //       return $app['twig']->render('index.html.twig', array("stylists" => Stylist::getAll()));
  //   });
  //
  //   //INDEX-GET DELETEALL PAGE 2nd click (FOR SURE)
  //   $app->get("/delete", function() use ($app) {
  //       Stylist::deleteAll();
  //       return $app['twig']->render('index.html.twig', array("stylists" => Stylist::getAll()));
  //   });
  //   //STYLIST-GET PAGE
  //   $app->get("/stylist/{stylist}-{id}", function($stylist, $id) use ($app) {
  //       $stylist = Stylist::find($id);
  //       return $app['twig']->render('stylists.html.twig', array('stylist' => $stylist, 'clients' => $stylist->getClients()));
  //   });
  //   //STYLIST PAGE (Client added)
  //   $app->post("/stylist/{stylist}-{id}", function($stylist, $id) use ($app) {
  //       $stylist = Stylist::find($id);
  //       $new_client = new Client(filter_var($_POST['client_name'], FILTER_SANITIZE_MAGIC_QUOTES), $stylist->getId());
  //       $new_client->save();
  //       return $app['twig']->render('stylists.html.twig', array('stylist' => $stylist, 'clients' => $stylist->getClients()));
  //   });
  //   //STYLIST-GET EDIT PAGE (for Client)
  //   $app->get("/stylist/{stylist}-{stylist_id}/client/{client}-{id}/edit", function($stylist, $stylist_id, $client, $id) use ($app) {
  //     $stylist = Stylist::find($stylist_id);
  //     $client = Client::find($id);
  //     return $app['twig']->render('edit-client.html.twig', array("stylist"=> $stylist, 'client' => $client));
  //   });
  //   //STYLIST-PATCH EDIT PAGE (for Client)
  //   $app->patch("/stylist/{stylist}-{stylist_id}/client/{client}-{id}/edit", function($stylist, $stylist_id, $client, $id) use ($app) {
  //     $stylist = Stylist::find($stylist_id);
  //     $change_client_name = $_POST['change_client_name'];
  //     $client = Client::find($id);
  //     $client->update($change_client_name);
  //     return $app['twig']->render('stylists.html.twig', array("stylist" => $stylist, "clients"=> $stylist->getClients()));
  //   });
  //   //STYLIST_GET DELETE PAGE (for Client)
  //   $app->get("/stylist/{stylist}-{stylist_id}/client/{client}-{id}/deleted", function($stylist, $stylist_id, $client, $id) use ($app) {
  //       $stylist = Stylist::find($stylist_id);
  //       $client = Client::find($id);
  //       $client->delete();
  //       return $app['twig']->render('stylists.html.twig', array("stylist" => $stylist, "clients"=> $stylist->getClients()));
  //     });
    return $app;







    // $app->post("/stylist", function() use ($app) {
    //         $stylist = new Stylist(filter_var($_POST['stylist'],FILTER_SANITIZE_MAGIC_QUOTES));
    //         $stylist->save();
    //         return $app['twig']->render('index.html.twig', array('stylists' => Stylist::getAll()));
    //     });
    //
    //     $app->get("/clients/{stylist}/{id}", function($stylist, $id) use ($app) {
    //         $stylist_id = $id;
    //         return $app['twig']->render('client.html.twig', array('clients' => Client::getMatch($id), 'stylist' => Stylist::getStylist($stylist_id), 'stylist_id'=> $stylist_id));
    //     });
    //
    // $app->post("/edit-client", function() use ($app) {
    //     $client = new Client(filter_var($_POST['client'],FILTER_SANITIZE_MAGIC_QUOTES));
    //     $client->save();
    //     return $app['twig']->render('edit-client.html.twig', ['clients' => Client::getAll()]);
    // });

   //
   //  $app->get("/editstylist/{id}", function($id) use ($app) {
   //         $find_stylist = Stylist::find($id);
   //         return $app['twig']->render('edit-stylist.html.twig', array('editstylist' => $find_stylist));
   //     });
   //
   //  $app->patch("/updatestylist/{id}", function($id) use ($app) {
   //     $stylist = Stylist::find($id);
   //     $stylist_id = $stylist->getId();
   //     $update_stylist = $_POST['update'];
   //     $stylist->update($update_stylist);
   //     var_dump($stylist);
   //     return $app['twig']->render('index.html.twig', ['stylists' => Stylist::getAll(), 'stylist' => $stylist, 'stylist_id' => $stylist->getId()]);
   // });
   //
   // $app->get('/deletestylist/{id}', function($id) use ($app) {
   //     $find_stylist = Stylist::find($id);
   //  //    $stylist_id = $find_stylist->getId();
   //     $find_stylist->delete();
   //     var_dump($find_stylist);
   //     return $app['twig']->render('index.html.twig', ['stylists' => Stylist::getAll()]);
   //
   // });
   //
   //  $app->get('/delete-all', function() use ($app) {
   //      Stylist::deleteAll();
   //      return $app['twig']->render('index.html.twig', ['stylists' => Stylist::getAll()]);
   //  });

 ?>
