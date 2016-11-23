<?php

// Supprime l'idée dont l'id est passée en variable (id_suppr)

$requete = $bdd->prepare('DELETE FROM ampli_ideas WHERE id = ?');
$requete->execute(array($id_suppr));
