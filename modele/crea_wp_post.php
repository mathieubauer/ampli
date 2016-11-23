<?php

// Insère les données récupérées dans la table wordpress

$requete = $bdd->prepare('INSERT INTO wpampli_posts(post_author, post_content, post_title) VALUES(999, :ideatext, :ideaname)');
$requete->execute(array(
    'ideatext' => $ideatext,
    'ideaname' => $ideaname));
