<?php

// récupère tous les messages de chat
    
$requete = $bdd->query('SELECT * FROM chat_messages ORDER BY id DESC LIMIT 0, 999');

    