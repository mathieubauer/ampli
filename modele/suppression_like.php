<?php

// supprime le like dans la table de correspondance

$requete = $bdd->prepare('DELETE FROM ampli_likes WHERE id_user = :id_user AND id_idea = :id_idea');
$requete->execute(array(
    'id_idea' => $id_idea,
    'id_user' => $id_user));
