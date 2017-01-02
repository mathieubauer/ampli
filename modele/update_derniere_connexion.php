<?php

// comme son nom l'indique ! 

$requete = $bdd->prepare('UPDATE ampli_users SET date_derniere_connexion = NOW() WHERE id = :id_user');
$requete->execute(array(
    'id_user' => $id_user));