<?php

  $app->get('/', function () use($app) {
      $books = $app['dao.book']->findAll();

      return $app['twig']->render('index.html.twig', array ('books' => $books));

})->bind('home'); // The bind () function renames the route, here : home


$app->get('/book/{id}', function ($id) use ($app) {
    $book = $app['dao.book']->find($id);
    $authors = $app['dao.author']->findBook($id);
    return $app['twig']->render('book.html.twig', array('book' => $book, 'authors' => $authors));
})->bind('book'); // The bind() function renames the route, here  : book
