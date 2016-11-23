<?php

// supprime le membre id_suppr

$requete = $bdd->prepare('DELETE FROM ampli_users WHERE id = ?');
$requete->execute(array($id_suppr));


// A FAIRE
// Devrait s'appeler suppression_membre
