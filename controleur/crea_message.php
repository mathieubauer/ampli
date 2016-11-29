<?php

// O. Vérifier qu'on est administrateur (faire le test et ajouter la fonctionnalité s'il y a lieu)

// 1. Vérifier l'existence des données du formulaire
// 2. Passer les données en variables
// 3. Inclure les données dans la base
// 4. Renvoyer vers le contrôleur global


// Vérifie l'existance des données du formulaire
if (!empty($_POST['message'])) { 
        
    // Passe les données en variables
    $id_user = 1;
    $message = $_POST['message'];

    // Inclut les données dans la base
    include_once('modele/crea_message.php'); 
    header('Location: index.php');        
 

    
// Sinon renvoie le formulaire avec une page d'erreur
} else {                                                   
                                               
    $info = "<p>Au moins un des champs est vide. Merci de recommencer.</p>";
    include_once('vue/alerte.php');
    
    include_once('vue/header.php');
    include_once('vue/inscription.php');
    include_once('vue/footer.php');
}

