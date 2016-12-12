<?php
session_start();

include_once('../modele/connexion_sql.php');  

// VERIFIER LE PROBLEME GET / POST

if(isset($_GET['id_idea']) && isset($_GET['contribution'])) {

    $id_idea = $_GET['id_idea'];                                                // virer les caractères spéciaux pour la sécurité
    $id_user = $_SESSION['id'];
    $contribution = $_GET['contribution'];
    
    
    // Crée la contribution
    $sql = 'INSERT INTO ampli_contributions(id_idea, id_user, contribution) VALUES(:id_idea, :id_user, :contribution)';
    $requete = $bdd->prepare($sql);
    $requete->execute(array(
        'id_idea' => $id_idea,
        'id_user' => $id_user,
        'contribution' => $contribution));
    
    // compte renvoie le nombre de contributions pour l'idée
    $sql = 'SELECT count(id) AS nbContributions FROM ampli_contributions WHERE id_idea = :id_idea';
    $requete = $bdd->prepare($sql);
    $requete->execute(array(
        'id_idea' => $id_idea));
    $resultat = $requete->fetch();
    $nbContributions = $resultat['nbContributions'];
    
    // renvoie le nom d'utilisateur
    $username = $_SESSION['username'];
    
    
    $retour = array('nbContributions' => $nbContributions, 'username' => $username);
    $retourJson = json_encode($retour);
    echo $retourJson;
        
}