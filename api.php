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

// $requete = $bdd->prepare('INSERT INTO chat_messages(id_user, message) VALUES(:id_user, :message)');
// $requete->execute(array(
//     'id_user' => $id_user,
//     'message' => $message));


$requete = $bdd->query('SELECT * FROM chat_messages ORDER BY id DESC LIMIT 0, 999');

$array = mysql_fetch_row($requete);

echo json_encode($array);