<?php

// Insère les données récupérées dans la table

$requete = $bdd->prepare('INSERT INTO ampli_ideas(ideaname, ideatext, category, id_user, likes) VALUES(:ideaname, :ideatext, :category, :id_user, :likes)');
$requete->execute(array(
    'ideaname' => $ideaname,
    'ideatext' => $ideatext,
    'category' => $category,
    'id_user' => $id_user,
    'likes' => $likes));
