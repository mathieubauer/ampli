<?php

// Récupère les posts depuis la table wordpress (publiés)

$requete = $bdd->query('
SELECT post_title, post_content 
FROM wpampli_posts 
WHERE post_status = "publish" AND post_type = "post" AND post_author < 999
ORDER BY post_date DESC LIMIT 0, 999
');
