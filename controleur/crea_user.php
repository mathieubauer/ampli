<?php

// RESTE A FAIRE
// vérifie la validité des informations saisies
    // mots de passe identiques ? 
    // adresse mail forme valide ? expreg
// ajouter un prefixe à pass_hache $pass_hache = sha1('gz' . $_POST['pass']);
// captcha
// confirmation par email 



// Vérifie l'existance des données du formulaire
if (!empty($_POST['username']) && !empty($_POST['password1']) && !empty($_POST['password2'])) { 
    
    // Vérifie l'exactitude du mot de passe
    if ($_POST['password1'] == $_POST['password2']) {
        
        // Passe les données en variables
        $username = $_POST['username'];
        $pass_hache = sha1($_POST['password1']);
        
        $permissions = 'user';
        $email = '';
        $id_team1 = $_POST['id_team1'];
        $id_team2 = 0;
        $score = 1000;
        $likes = 10;
                

        // Vérifie les doublons
        include_once('modele/compte_users.php');
        
        // Si pas de doublons, on crée l'utilisateur
        if ($nbLogins == 0) {
            include_once('modele/crea_user.php'); 
            header('Location: index.php?section=admin_users&info=login_ok');
            
        } else {
            
            $info = "<p>Cet utilisateur existe déjà.</p>";
            include_once('vue/alerte.php');
        
            include_once('vue/header.php');
            include_once('vue/inscription.php');
            include_once('vue/footer.php');
            
        }
        
    } else {
        
        $info = "<p>Les mots de passe ne sont pas identiques. Merci de recommencer.</p>";
        include_once('vue/alerte.php');
        
        include_once('vue/header.php');
        include_once('vue/inscription.php');
        include_once('vue/footer.php');
        
    }   

    
// Sinon renvoie le formulaire avec une page d'erreur
} else {                                                   
                                               
    $info = "<p>Au moins un des champs est vide. Merci de recommencer.</p>";
    include_once('vue/alerte.php');
    
    include_once('vue/header.php');
    include_once('vue/inscription.php');
    include_once('vue/footer.php');
}

