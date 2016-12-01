<?php

// Va vérifier la correspondance id_user / id (like) / id_idea dans la base
// Renvoie l'id du like (mais peu importe, c'est pour compter)

$requete = $bdd->prepare('SELECT id FROM ampli_likes WHERE id_user = :id_user AND id_idea = :id_idea');
$requete->execute(array(
    'id_user' => $id_user,
    'id_idea' => $id_idea));

$resultat = $requete->fetch();                                      


// On vérifie si il y en a avec if (!$resultat)
