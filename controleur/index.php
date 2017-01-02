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
                
        include('modele/liste_projects.php');
        include_once('vue/contenu_admin.php');
        //include_once('vue/contenu_user.php');
        
        $id_project = $_SESSION['project'];
        $requete = $bdd->prepare('SELECT categories FROM ampli_projects WHERE id = :id_project');
        $requete->execute(array('id_project' => $id_project));
        $resultat = $requete->fetch();
        $categories = $resultat['categories'];
        
        //include('modele/liste_projects.php');
        include_once('vue/form_idea.php');
        include_once('vue/form_idea_modif.php');
        
       
        include_once('modele/liste_ideas.php');
        include_once('vue/liste_ideas.php');
        
        include_once('vue/module_chat.php');
            
        // include_once('modele/liste_posts.php');
        // include_once('vue/liste_posts.php');
             
    }
    
    // Contenu utilisateur
    if ($_SESSION['permissions'] == 'user') {
        
        $requete = $bdd->prepare('SELECT count(id) AS nb_ideas FROM ampli_ideas WHERE id_user = :id_user');
        $requete->execute(array(
            'id_user' => $_SESSION['id']));
        $resultat = $requete->fetch();
        $nb_ideas = $resultat['nb_ideas'];
        
        if ($nb_ideas == 0 && !isset($_SESSION['calltoidea'])) {
            
            $_SESSION['calltoidea'] = 1;
            include_once('vue/call_to_idea.php');
            
        } else {
                
            include_once('vue/form_idea.php');
            include_once('vue/form_idea_modif.php');

            $id_project = $_SESSION['project'];
            
            /*
            $requete = $bdd->prepare('SELECT count(id) AS nb_ideas FROM ampli_ideas WHERE id_user = :id_user');
            $requete->execute(array('id_user' => $_SESSION['id']));
            $resultat = $requete->fetch();
            $nb_ideas = $resultat['nb_ideas'];
            */
            
            include_once('modele/liste_ideas.php');
            include_once('vue/liste_ideas.php');

            // Module fonctionnel mais masqué
            // include_once('vue/module_chat.php');
            
        }
                     
    }
    
    

// Sinon affiche le formulaire de connexion    
} else {                                                        
    include_once('vue/header.php');
    include_once('vue/connexion.php');    
}


include_once('vue/footer.php');


