<?php
// session_start();

include_once('../modele/connexion_sql.php');  

// VERIFIER LE PROBLEME GET / POST

if(!empty($_GET['id']) && !empty($_GET['titre']) && !empty($_GET['texte'])) {
    
    $id_idea = $_GET['id'];
    $ideaname = $_GET['titre'];
    $ideatext = $_GET['texte'];
    
    $requete = $bdd->prepare('UPDATE ampli_ideas SET ideaname = :ideaname, ideatext = :ideatext WHERE id = :id_idea');
    $requete->execute(array(
        'ideaname' => $ideaname,
        'ideatext' => $ideatext,
        'id_idea' => $id_idea));
    
    $retour = array('ideaname' => $ideaname, 'ideatext' => $ideatext);
    $retourJson = json_encode($retour);
    echo $retourJson;
        
};