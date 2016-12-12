<?php

// Récupère les caractéristiques des idées + l'username correspondant

$sql = '
SELECT i.id id, i.ideaname ideaname, i.ideatext ideatext, i.ideaimg ideaimg, i.category category, i.likes likes, u.username username
FROM ampli_users u
INNER JOIN ampli_ideas i
ON i.id_user = u.id
WHERE i.id_project = :id_project
ORDER BY i.likes
DESC LIMIT 0, 999
';

$requete = $bdd->prepare($sql);
$requete->execute(array(
    'id_project' => $id_project
));