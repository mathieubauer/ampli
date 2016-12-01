<?php

// Va vérifier la correspondance id_user / id (like) / id_idea dans la base
// Renvoie l'id du like (mais peu importe, c'est pour compter)

$requete = $bdd->prepare('SELECT id FROM ampli_ideas WHERE id = :id_idea AND id_user = :id_user');
$requete->execute(array(
    'id_idea' => $id_idea,
    'id_user' => $id_user));

$resultat = $requete->fetch();                                      


// On vérifie si il y en a avec if (!$resultat)
