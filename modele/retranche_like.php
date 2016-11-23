<?php

// retranche un like à l'utilisateur

$requete = $bdd->prepare('UPDATE ampli_users SET likes = likes-1 WHERE id = :id_user');
$requete->execute(array(
    'id_user' => $id_user));