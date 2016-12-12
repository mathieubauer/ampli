<?php
session_start();

include_once('../modele/connexion_sql.php');  

// VERIFIER LE PROBLEME GET / POST

if(isset($_GET['id_idea'])) {

    $id_idea = $_GET['id_idea'];                                                // virer les caractères spéciaux pour la sécurité
    $id_user = $_SESSION['id'];    
    
    // Crée le porteur
    $sql = 'UPDATE ampli_ideas SET id_porteur = :id_user WHERE id = :id_idea';
    $requete = $bdd->prepare($sql);
    $requete->execute(array(
        'id_idea' => $id_idea,
        'id_user' => $id_user));
    
    // renvoie le nom d'utilisateur
    $username = $_SESSION['username'];
    
    $retour = array('username' => $username);
    $retourJson = json_encode($retour);
    echo $retourJson;    
        
}