<?php

require_once __DIR__.'/../vendor/autoload.php';

// On crée une instance de l'objet Silex dans $app
$app = new Silex\Application();

//On inclut la définition des routes de l'application 'routes.php'
require __DIR__.'/../app/config/dev.php';
require __DIR__.'/../app/app.php';
require __DIR__.'/../app/routes.php';

$app->run();


