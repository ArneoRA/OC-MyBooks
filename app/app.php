<?php

use Symfony\Component\Debug\ErrorHandler;
use Symfony\Component\Debug\ExceptionHandler;

// Register global error and exception handlers
ErrorHandler::register();
ExceptionHandler::register();

// Register service providers.
$app->register(new Silex\Provider\DoctrineServiceProvider());
$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/../views',
));

$app->register(new Silex\Provider\AssetServiceProvider(), array(
    'assets.version' => 'v1'
));

// Register Book service
$app['dao.book'] = function ($app) {
    return new OCMyBooks\DAO\BookDAO($app['db']);
};

//Register Author service
$app['dao.author'] = function ($app) {
    $authorDAO = new OCMyBooks\DAO\AuthorDAO($app['db']);
    $authorDAO->setBookDAO($app['dao.book']);
    return $authorDAO;
};
