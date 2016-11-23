<?php

// connexion à la base de données

$bddserveur = 'mysql:host=mysql51-91.perso;dbname=mathieubyxbdd';
$bddbase = 'mathieubyxbdd';
$bddmdp = '8ZLb7D5f';

try {
    $bdd = new PDO($bddserveur, $bddbase, $bddmdp, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
}

catch(Exception $e) {
    die('Erreur :' . $e->getMessage());
}