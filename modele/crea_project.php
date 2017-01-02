<?php

// Insère les données récupérées dans la table

$requete = $bdd->prepare('INSERT INTO ampli_projects(name) VALUES(:name)');
$requete->execute(array(
    'name' => $name));
