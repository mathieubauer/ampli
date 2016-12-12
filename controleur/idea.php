<?php

// Définit si les boutons d'amplification sont affichés
// Compte les contributions
// Renvoie les données sur l'idée


if (isset($info)) {
    include_once('vue/alerte.php');
}

// Vérifie si une session est ouverte
// if (isset($_SESSION['id']) AND isset($_SESSION['username'])) { 
    
      
    // Récupère les information d'un utilisateur
    $username = $_SESSION['username'];
    include_once('modele/info_user.php');
    include_once('vue/header.php');
    
    
    // Contenu
    if (isset($_GET['idea'])) {
        
        $id_idea = $_GET['idea'];
        
        if (!isset($_SESSION['id'])) {
            
            $button_like = 0; 
            $button_contribute = 0;
            $button_portage = 0;
            
        } else {
            
            $id_user = $_SESSION['id'];
            
            $requete = $bdd->prepare('SELECT id FROM ampli_likes WHERE id_user = :id_user AND id_idea = :id_idea');
            $requete->execute(array(
                'id_user' => $id_user,
                'id_idea' => $id_idea));
            $resultat = $requete->fetch(); 
            if ($resultat) { $button_like = 1; }
            else { $button_like = 0; }
            // if ($resultat) { $button_like = CreaButton('fa-heart-o', 'Je n\'aime plus'); }
            // else { $button_like = CreaButton('fa-heart', 'J\'aime !'); }
                        
            $requete = $bdd->prepare('SELECT id FROM ampli_contributions WHERE id_user = :id_user AND id_idea = :id_idea');
            $requete->execute(array(
                'id_user' => $id_user,
                'id_idea' => $id_idea));
            $resultat = $requete->fetch(); 
            if ($resultat) { $button_contribute = 0; }
            else { $button_contribute = 0; }                                                    // on peut contribuer plusieurs fois
            // if ($resultat) { $button_contribute = ''; }
            // else { $button_contribute = CreaButton('fa-users', 'Je contribue !'); }
            
            $requete = $bdd->prepare('SELECT id_porteur FROM ampli_ideas WHERE id = :id_idea');
            $requete->execute(array(
                'id_idea' => $id_idea));
            $resultat = $requete->fetch(); 
            if ($resultat['id_porteur'] != 0) { $button_portage = 1; }
            else { $button_portage = 0; }
                
        }
        
        $requete = $bdd->prepare('SELECT count(id) AS nbContributions FROM ampli_contributions WHERE id_idea = :id_idea');
        $requete->execute(array(
            'id_idea' => $id_idea));
        $resultat = $requete->fetch();
        $nbContributions = $resultat['nbContributions'];
                
        //        INNER JOIN ampli_users v
        //ON i.id_porteur = v.id
        //, v.username porteur
      
        
        $sql = '
        SELECT i.id id, i.ideaname ideaname, i.ideatext ideatext, i.ideaimg ideaimg, i.category category, i.likes likes, u.username author
        FROM ampli_ideas i
        INNER JOIN ampli_users u
        ON i.id_user = u.id
        WHERE i.id = :id_idea
        ';
        
        $requete = $bdd->prepare($sql);
        $requete->execute(array('id_idea' => $id_idea));
        $donnees = $requete->fetch();
        
        
        $sql = 'SELECT id_porteur FROM ampli_ideas WHERE id = :id_idea';
        $requete = $bdd->prepare($sql);
        $requete->execute(array('id_idea' => $id_idea));
        $id_porteur = $requete->fetch();
        if ($id_porteur[0] == 0) { $porteur = 'personne'; }
        else {
            $sql = 'SELECT username FROM ampli_users WHERE id = :id_user';
            $requete = $bdd->prepare($sql);
            $requete->execute(array('id_user' => $id_porteur[0]));
            $arrayporteur = $requete->fetch();
            $porteur = $arrayporteur['username'];
        }
        
        
        
        $sql = '
        SELECT c.id id, c.contribution contribution, u.username author
        FROM ampli_contributions c
        INNER JOIN ampli_users u
        ON c.id_user = u.id
        WHERE c.id_idea = :id_idea
        ';
        
        $requete = $bdd->prepare($sql);
        $requete->execute(array(
            'id_idea' => $id_idea
        ));
                
        // doit être la dernière requète avant appel de la vue (on veut $requete)
        
        // $contributions = $requete->fetch();
        // while ($donnees = $requete->fetch()) {
                                                                  
        include_once('vue/info_idea.php');
                     
    } else {
        echo 'L\'idée n\'existe pas';
    }
      

// Sinon affiche le formulaire de connexion    
// } else {                                                        
//     include_once('vue/header.php');
//     include_once('vue/connexion.php');    
// }


include_once('vue/footer.php');


