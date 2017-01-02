<?php

// récupère tous les membres
    
$requete = $bdd->query('SELECT * FROM ampli_projects ORDER BY id ASC LIMIT 0, 999');    