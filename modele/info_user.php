<?php

// récupère les informations sur un membre
    
$requete = $bdd->prepare('SELECT * FROM ampli_users WHERE username = ?');
$requete->execute(array($username));

$resultat = $requete->fetch();