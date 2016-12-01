<?php
session_start();

include_once('../modele/connexion_sql.php');  

// VERIFIER LE PROBLEME GET / POST

if(isset($_GET['id_idea']) && isset($_GET['etat'])) {

    $id_idea = $_GET['id_idea'];             // virer les caractères spéciaux pour la sécurité
    $etat = $_GET['etat'];
    $id_user = $_SESSION['id'];

    
    if($etat == 0) {
        
        // include_once('../modele/verification_likes.php');
        // if (!$resultat) {                                       
            
            include_once('../modele/crea_like.php');            // répertorie le like dans ampli_likes

            //$points = 1;
            //include_once('../modele/ajoute_like.php');          // ajoute un like dans ampli_ideas
            
            $requete = $bdd->prepare('UPDATE ampli_ideas SET likes = likes+1 WHERE id = :id_idea');
            $requete->execute(array(
                'id_idea' => $id_idea));

                
            //include_once('../modele/liste_ideas.php'); 
            $requete = $bdd->query('SELECT likes FROM ampli_ideas WHERE id = ' . $id_idea);
            $requete->execute();
            $donnees = $requete->fetch();
            echo $donnees['likes'];
            //$requete->execute(array(
            //    'id_idea' => $id_idea));
        //
            //$donnees = $requete->fetch;
            //echo $donnees['likes'];
        
            
            
                       
        // }
        
    } else {
        
        //include_once('../modele/verification_likes.php');
        //if ($resultat) {
            
            //include_once('../modele/suppression_like.php');     // supprime le like dans ampli_likes (table correspondance)
            
            $requete = $bdd->prepare('DELETE FROM ampli_likes WHERE id_user = :id_user AND id_idea = :id_idea');
            $requete->execute(array(
                'id_user' => $id_user,
                'id_idea' => $id_idea));
        
            
            //$points = -1;
            //include_once('../modele/ajoute_like.php');          // retranche un like dans ampli_ideas
            $requete = $bdd->prepare('UPDATE ampli_ideas SET likes = likes-1 WHERE id = :id_idea');
            $requete->execute(array(
                'id_idea' => $id_idea));
            
            $requete = $bdd->query('SELECT likes FROM ampli_ideas WHERE id = ' . $id_idea);
            $requete->execute();
            $donnees = $requete->fetch();
            echo $donnees['likes']; 

                       
        //}
        
    }
    
    
}