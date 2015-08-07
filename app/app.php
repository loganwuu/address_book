<?php
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Contact.php";

    session_start();

    if(empty($_SESSION['list_of_contacts'])) {
        $_SESSION['list_of_contacts'] = array();
    }

    $app = new Silex\Application();
    $app['debug'] = true;

    $app->register(new Silex\Provider\TwigServiceProvider(), array('twig.path' => __DIR__.'/../views'
    ));

    // home page //
    $app->get("/", function() use ($app) {
        return $app['twig']->render('main_page.html.twig', array('all_contacts' => Contact::getAll()));
    });

    // create contact confirmation page //
    $app->post("/create_contact", function() use ($app) {
        $newContact = new Contact($_POST['name'], $_POST['phone_num'], $_POST['address']);
        $newContact->save();
        return $app['twig']->render('create_contact.html.twig', array('newContact' => $newContact));
    });

    // delete all contacts page //
    $app->post("/delete_contacts", function() use ($app) {
        Contact::deleteAll();
        return $app['twig']->render('delete_contacts.html.twig');
    });

    return $app;
?>
