<?php
// session_start();

include_once('../modele/connexion_sql.php');  

// VERIFIER LE PROBLEME GET / POST

if(isset($_GET['titre']) && isset($_GET['id']) && !empty($_GET['titre'])) {
    
    $ideaname = $_GET['titre'];
    $id_idea = $_GET['id'];
    
    $requete = $bdd->prepare('UPDATE ampli_ideas SET ideaname = :ideaname WHERE id = :id_idea');
    $requete->execute(array(
        'ideaname' => $ideaname,
        'id_idea' => $id_idea));
    
    echo $ideaname;
    
};

echo 'Insérer un titre';