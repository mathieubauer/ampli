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
        
        $requete = $bdd->prepare('SELECT * FROM ampli_users WHERE username = ?');
        $requete->execute(array($username));
                                
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


