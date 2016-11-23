<?php

// Récupère les caractéristiques des idées + l'username correspondant


$requete = $bdd->query('
SELECT i.id id, i.ideaname ideaname, i.ideatext ideatext, i.ideaimg ideaimg, i.category category, i.likes likes, u.username username
FROM ampli_users u
INNER JOIN ampli_ideas i
ON i.id_user = u.id
ORDER BY i.likes
DESC LIMIT 0, 999
');