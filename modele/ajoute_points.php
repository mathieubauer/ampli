<?php

// ajoute les points passés en variable à l'utilisateur

$requete = $bdd->prepare('UPDATE ampli_users SET score = score+:points WHERE id = :id_user');
$requete->execute(array(
    'points' => $points,
    'id_user' => $id_user));