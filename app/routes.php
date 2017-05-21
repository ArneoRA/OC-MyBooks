<?php

  // Home page défini ici par le /
  $app->get('/', function () use($app) {
      $books = $app['dao.book']->findAll();

      return $app['twig']->render('index.html.twig', array ('books' => $books));
    //Ici, on demande au service Twig ($app['twig'] ) de générer le template index.html.twig en lui passant ses données dynamiques en paramètre. Ici, la seule donnée dynamique est une variable nommée books qui contient le tableau d'objets de la classe Book renvoyé par la partie Modèle.
})->bind('home'); // La fonction bind() permet de renommer la route ici : home

// Détail du book avec l'author
$app->get('/book/{id}', function ($id) use ($app) {
    $book = $app['dao.book']->find($id);
    $authors = $app['dao.author']->findAllByBook($bookId);
    return $app['twig']->render('book.html.twig', array('book' => $book, 'authors' => $authors));
})->bind('book'); // La fonction bind() permet de renommer la route ici : book
