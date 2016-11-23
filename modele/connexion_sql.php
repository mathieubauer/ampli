<?php

// connexion à la base de données

$bddserveur = 'mysql:host=localhost;dbname=ampli';
$bddbase = 'root';
$bddmdp = 'root';

try {
    $bdd = new PDO($bddserveur, $bddbase, $bddmdp, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
}

catch(Exception $e) {
    die('Erreur :' . $e->getMessage());
}