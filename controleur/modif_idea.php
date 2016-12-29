<?php
// session_start();

include_once('../modele/connexion_sql.php');  

if(!empty($_POST['id']) && !empty($_POST['titre']) && !empty($_POST['texte'])) {
    
    $id_idea = $_POST['id'];
    $ideaname = $_POST['titre'];
    $ideatext = $_POST['texte'];
    $ideatext = nl2br($ideatext);                             // crée des <br> pour aller à la ligne
    
    $requete = $bdd->prepare('UPDATE ampli_ideas SET ideaname = :ideaname, ideatext = :ideatext WHERE id = :id_idea');
    $requete->execute(array(
        'ideaname' => $ideaname,
        'ideatext' => $ideatext,
        'id_idea' => $id_idea));
    
    $retour = array('ideaname' => $ideaname, 'ideatext' => $ideatext);
    $retourJson = json_encode($retour);
    echo $retourJson;
        
};