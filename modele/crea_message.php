<?php

// Insère les données récupérées dans la table

$requete = $bdd->prepare('INSERT INTO chat_messages(id_user, message) VALUES(:id_user, :message)');
$requete->execute(array(
    'id_user' => $id_user,
    'message' => $message));
