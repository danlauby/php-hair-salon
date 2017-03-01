<?php
    date_default_timezone_set('America/Los_Angeles');
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Stylist.php";
    require_once __DIR__."/../src/Client.php";

    use Symfony\Component\HttpFoundation\Request;
    Request::enableHttpMethodParameterOverride();

    $server = 'mysql:host=localhost:8889;dbname=hair_salon';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    $app = new Silex\Application();
    $app['debug']= true;

    $app->register(new Silex\Provider\TwigServiceProvider(), array(
        'twig.path' => __DIR__.'/../views'
    ));

    $app->get('/', function() use($app) {
        return $app['twig']->render('index.html.twig', array('stylists' => Stylist::getAll()));
    });

    $app->post("/stylist", function() use ($app) {
        $stylist = new Stylist($_POST['stylist_name']);
        $stylist->save();
        return $app['twig']->render('index.html.twig', array('stylists' => Stylist::getAll()));
    });

    $app->get('/stylists/{id}', function($id) use($app){
        $stylist = Stylist::find($id);
        return $app['twig']->render('stylists.html.twig', array('stylist' => $stylist, 'clients'=> $stylist->getClients()));
    });

    $app->get('/stylist/{id}/update', function($id) use($app) {
        $stylist = Stylist::find($id);
        return $app['twig']->render('stylist_update.html.twig', array('stylist' => $stylist));
    });

    $app->patch('/stylist/{id}', function($id) use($app) {
        $stylist_name = $_POST['stylist_name'];
        $stylist= Stylist::find($id);
        $stylist->updateStylist($stylist_name);
        return $app['twig']->render('index.html.twig', array('stylists'=>Stylist::getAll(), 'clients' => $stylist->getClients()));
    });

    $app->delete('/stylist/{id}', function($id) use($app) {
        $stylist = Stylist::find($id);
        $stylist->deleteStylist();
        return $app['twig']->render('index.html.twig', array('stylists' =>Stylist::getAll(), 'clients' => $stylist->getClients()));
    });

    $app->post("/clients", function() use($app){
        $client_name = $_POST['client_name'];
        $stylist_id = $_POST['stylist_id'];
        $client = new Client($client_name, $stylist_id);
        $client->save();
        $stylist = Stylist::find($stylist_id);
        return $app['twig']->render('stylists.html.twig', array('stylist'=> $stylist, 'clients' => $stylist->getClients()));
    });

    $app->delete("/clients/{id}", function($id) use($app){
        $client = Client::find($id);
        $stylist = Stylist::find($client->getStylistId());
        $client->deleteClient();
        return $app->redirect("/stylists/{$stylist->getId()}");
    });

    $app->get('/client/{id}/update', function($id) use($app) {
        $client = Client::find($id);
        return $app['twig']->render('client_update.html.twig', array('client' => $client));
    });

    $app->patch('/client/{id}', function($id) use($app) {
        $client_name = $_POST['client_name'];
        $client= Client::find($id);
        $client->updateClient($client_name);
        return $app->redirect("/stylists/{$client->getStylistId()}");
    });

    $app->delete('/client/{id}', function($id) use($app) {
        $client = Client::find($id);
        $client->deleteClient();
        return $app->redirect("/stylists/{$client->getStylistId()}");
    });
    return $app;
?>
