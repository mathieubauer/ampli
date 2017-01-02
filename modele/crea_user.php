<?php

// Insère les données récupérées dans la table

$requete = $bdd->prepare('
INSERT INTO ampli_users(username, password, permissions, email, id_team1, id_team2, score, likes, id_project_default, date_creation) 
VALUES(:username, :password, :permissions, :email, :id_team1, :id_team2, :score, :likes, :id_project_default, NOW())
');

$requete->execute(array(
    'username' => $username,
    'password' => $pass_hache,
    'permissions' => $permissions,
    'email' => $email,
    'id_team1' => $id_team1,
    'id_team2' => $id_team2,
    'score' => $score,
    'likes' => $likes,
    'id_project_default' => $id_project_default));
