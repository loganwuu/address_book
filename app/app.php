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

    // home page showing all contacts with the create contact form //
    $app->get("/", function() use ($app) {
        return $app['twig']->render('main_page.html.twig', array('all_contacts' => Contact::getAll()));
    });

    // create-contact confirmation page with 'home' button //
    $app->post("/create_contact", function() use ($app) {
        $new_contact = new Contact($_POST['contact_name'], $_POST['contact_phone_num'], $_POST['contact_address']);
        $new_contact->save();
        return $app['twig']->render('create_contact.html.twig', array('new_contact' => $new_contact));
    });

    // delete all contacts page with 'home' button //
    $app->post("/delete_contacts", function() use ($app) {
        Contact::deleteAll();
        return $app['twig']->render('delete_contacts.html.twig');
    });

    return $app;
?>
