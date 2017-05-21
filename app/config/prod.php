<?php

// Doctrine (db)
// C'est tout simplement le paramétrage de connexion à la base.
$app['db.options'] = array(
    'driver'   => 'pdo_mysql',
    'charset'  => 'utf8',
    'host'     => 'localhost',
    'port'     => '3306',
    'dbname'   => 'mybooks',
    'user'     => 'mybooks_user',
    'password' => 'secret',
);
