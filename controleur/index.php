<?php

// Contrôleur d'affichage principal

if (isset($info)) {
    include_once('vue/alerte.php');
}

// Vérifie si une session est ouverte
if (isset($_SESSION['id']) AND isset($_SESSION['username'])) { 
    
      
    // Récupère les information d'un utilisateur
    $username = $_SESSION['username'];
    include_once('modele/info_user.php');
    include_once('vue/header.php');
    
    
    // Contenu administrateur
    if ($_SESSION['permissions'] == 'admin') {
                
        include_once('vue/contenu_admin.php');
        include_once('vue/contenu_user.php');
        
        include_once('vue/form_idea.php');
        
        include_once('modele/liste_ideas.php');
        include_once('vue/liste_ideas.php');
             
    }
    
    // Contenu utilisateur
    if ($_SESSION['permissions'] == 'user') {
                
        include_once('vue/form_idea.php');
        
        include_once('modele/liste_ideas.php');
        include_once('vue/liste_ideas.php');
             
    }
    
    

// Sinon affiche le formulaire de connexion    
} else {                                                        
    include_once('vue/header.php');
    include_once('vue/connexion.php');    
}


include_once('vue/footer.php');


