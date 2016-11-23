<?php

// ajoute un like à l'idée dont l'idée est en variable

$requete = $bdd->prepare('UPDATE ampli_ideas SET likes = likes+1 WHERE id = ?');
$requete->execute(array($id_like));
