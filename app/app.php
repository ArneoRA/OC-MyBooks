<?php

use Symfony\Component\Debug\ErrorHandler;
use Symfony\Component\Debug\ExceptionHandler;

// Register global error and exception handlers
// Enregistrement des erreurs globales et des gestionnaires d'exception
ErrorHandler::register();
ExceptionHandler::register();

// Register service providers.
// Enregistrez les fournisseurs de services.
$app->register(new Silex\Provider\DoctrineServiceProvider());
$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/../views',
  // Ici, Twig est configuré pour que le répertoire dans lequel nous stockerons nos templates soit le répertoire "views" du projet.‌
));
$app->register(new Silex\Provider\AssetServiceProvider(), array(
    'assets.version' => 'v1'
  // Ce service fournit un moyen de gérer la production d'URL et la gestions des feuilles de styles CSS, JavaScript et images
));

// Register services.
// Enregistre le service article
$app['dao.book'] = function ($app) {
    return new OCMyBooks\DAO\BookDAO($app['db']);
  // retourne un service du Namespace "OCMyBooks\DAO" de la class "BookDAO" le service $app['db']
};

//Enregistrement du service Commentaire
$app['dao.author'] = function ($app) {
    $authorDAO = new OCMyBooks\DAO\AuthorDAO($app['db']);
    //C'est ici que la dépendance envers la classe BookDAO est injectée à l'instance de CommentDAO grâce au mutateur setBook DAO
    $authorDAO->setBookDAO($app['dao.book']);
    return $authorDAO;
};
