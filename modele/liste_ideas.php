<?php

// récupère toutes les idées
    
//$requete = $bdd->query('SELECT * FROM ampli_ideas ORDER BY id ASC LIMIT 0, 999');


$requete = $bdd->query('
SELECT i.id id, i.ideaname ideaname, i.ideatext ideatext, i.ideaimg ideaimg, i.category category, i.likes likes, u.username username
FROM ampli_users u
INNER JOIN ampli_ideas i
ON i.id_user = u.id
ORDER BY i.likes
DESC LIMIT 0, 999
');