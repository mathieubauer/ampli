<?php

if (isset($info)) {
    include_once('vue/alerte.php');
}

// Vérifie si une session est ouverte
if (isset($_SESSION['id']) AND isset($_SESSION['username'])) { 
    
      
    // Récupère les information d'un utilisateur
    $username = $_SESSION['username'];
    include_once('modele/info_user.php');
    include_once('vue/header.php');
    
    
    // Contenu
    if (isset($_GET['user'])) {
        
        $username = $_GET['user'];
        
        $requete = $bdd->prepare('SELECT id FROM ampli_users WHERE username = ?');
        $requete->execute(array($username));
        $donnees = $requete->fetch();
        $id_user = $donnees['id'];
                
        $requete = $bdd->prepare('SELECT COUNT(*) FROM ampli_ideas WHERE id_user = ?');
        $requete->execute(array($id_user));
        $donnees = $requete->fetch();
        $nb_ideas = $donnees[0];
        
        $requete = $bdd->prepare('SELECT COUNT(*) FROM ampli_likes WHERE id_user = ?');
        $requete->execute(array($id_user));
        $donnees = $requete->fetch();
        $likes_donnes = $donnees[0];
        
        $requete = $bdd->prepare('SELECT SUM(likes) FROM ampli_ideas WHERE id_user = ?');
        $requete->execute(array($id_user));
        $donnees = $requete->fetch();
        $likes_obtenus = $donnees[0];
        
        $requete = $bdd->prepare('SELECT COUNT(*) FROM ampli_contributions WHERE id_user = ?');
        $requete->execute(array($id_user));
        $donnees = $requete->fetch();
        $nb_contributions = $donnees[0];
        
                
        $requete = $bdd->prepare('SELECT * FROM ampli_users WHERE username = ?');
        $requete->execute(array($username));
        
        $requete0 = $bdd->query('SELECT COUNT(*) FROM chat_messages ORDER BY id ASC LIMIT 0, 15');
$donnees0 = $requete0->fetch();

        $fin = $nb_ideas;
        $debut = $fin - 5;
        $requete2 = $bdd->prepare('SELECT * FROM ampli_ideas WHERE id_user = ? ORDER BY id ASC LIMIT ' . $debut . ', ' . $fin);
        $requete2->execute(array($id_user));
                                
        include_once('vue/info_user.php');
             
    } else {
        echo 'L\'utilisateur n\'existe pas';
    }
      

// Sinon affiche le formulaire de connexion    
} else {                                                        
    include_once('vue/header.php');
    include_once('vue/connexion.php');    
}


include_once('vue/footer.php');


