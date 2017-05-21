<?php

// Ce fichier correspond au paramétrage de connexion à la BDD au niveau DEV
// On fait appel au fichier prod.php contenant le paramétrage à la base :
require __DIR__.'/prod.php';

// Et on y active la gestion des bugs afin d'avoir des messages plus "clairs"
// enable the debug mode
$app['debug'] = true;
