<?php

// Insère les données récupérées dans la table

$requete = $bdd->prepare('INSERT INTO ampli_ideas(ideaname, ideatext, ideaimg, category, id_user, likes, id_project) VALUES(:ideaname, :ideatext, :ideaimg, :category, :id_user, :likes, :id_project)');
$requete->execute(array(
    'ideaname' => $ideaname,
    'ideatext' => $ideatext,
    'ideaimg' => $ideaimg,
    'category' => $category,
    'id_user' => $id_user,
    'likes' => $likes,
    'id_project' => $id_project));
