<?php

// Insère les données récupérées dans la table

$requete = $bdd->prepare('INSERT INTO ampli_likes(id_user, id_idea) VALUES(:id_user, :id_idea)');
$requete->execute(array(
    'id_user' => $id_user,
    'id_idea' => $id_idea));
