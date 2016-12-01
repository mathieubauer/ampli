<?php

// ajoute un like à l'idée passée en variable

$requete = $bdd->prepare('UPDATE ampli_ideas SET likes = likes+:points WHERE id = :id_idea');
$requete->execute(array(
    'points' => $points,
    'id_idea' => $id_idea));