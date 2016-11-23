<?php

// récupère tous les membres
    
$requete = $bdd->query('SELECT * FROM ampli_users ORDER BY id DESC LIMIT 0, 999');




//   $reponse = $bdd->query('SELECT * FROM ' . $tableusers . ' ORDER BY ID DESC LIMIT 0, ' . $nbEntrees);
    