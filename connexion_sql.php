<?php

// connexion à la base de données

$bddserveur = 'mysql:host=mysql55-58.perso;dbname=lecubeiompmbr';
$bddbase = 'lecubeiompmbr';
$bddmdp = 'dRZ2rsn7rcUM';

try {
    $bdd = new PDO($bddserveur, $bddbase, $bddmdp, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
}

catch(Exception $e) {
    die('Erreur :' . $e->getMessage());
}