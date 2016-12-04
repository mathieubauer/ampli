<?php
// A FAIRE
// vérifier qu'on ne puisse pas entrer des url qui suppriment des idées type : controleur/suppression_idea_user.php?id=42

include_once('../modele/connexion_sql.php');

if(isset($_GET['id'])) {
    
    $id_suppr = $_GET['id'];    
    include_once('../modele/suppression_idea.php'); 
     
};