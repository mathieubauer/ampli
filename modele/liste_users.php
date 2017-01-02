<?php

// récupère tous les membres
    
$requete = $bdd->query('SELECT * FROM ampli_users ORDER BY id DESC LIMIT 0, 999');    