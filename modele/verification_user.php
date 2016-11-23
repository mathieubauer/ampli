<?php

// Va vérifier les identifiants dans la bdd
// Renvoie l'id et l'id du groupe

$requete = $bdd->prepare('SELECT id, permissions FROM ampli_users WHERE username = :username AND password = :password');
$requete->execute(array(
    'username' => $username,
    'password' => $password_hache));

$resultat = $requete->fetch();                                      


// On vérifie si il y en a avec if (!$resultat)
