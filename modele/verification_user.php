<?php

// Va vérifier les identifiants dans la bdd
// Renvoie l'id et l'id du groupe

$sql = '
SELECT u.id id, u.permissions permissions, u.id_project_default id_project_default, p.name name_project_default
FROM ampli_users u
INNER JOIN ampli_projects p
ON u.id_project_default = p.id
WHERE username = :username AND password = :password
';

$requete = $bdd->prepare($sql);
$requete->execute(array(
    'username' => $username,
    'password' => $password_hache));

$resultat = $requete->fetch();                                      


// On vérifie si il y en a avec if (!$resultat)
