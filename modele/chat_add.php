<?php

// Insère les données récupérées dans la table

$requete = $bdd->prepare('INSERT INTO chat_messages(nom, message) VALUES(:nom, :message)');
$requete->execute(array(
    'nom' => $nom,
    'message' => $message));