<?php

// récupère quelques les messages de chat
    
$requete0 = $bdd->query('SELECT COUNT(*) FROM chat_messages ORDER BY id ASC LIMIT 0, 15');
$donnees0 = $requete0->fetch();

$fin = $donnees0[0];
$debut = $fin - 15;

$requete = $bdd->query('SELECT * FROM chat_messages ORDER BY id ASC LIMIT ' . $debut . ', ' . $fin);