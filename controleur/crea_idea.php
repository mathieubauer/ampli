<?php

// O. Vérifier qu'on est administrateur (faire le test et ajouter la fonctionnalité s'il y a lieu)

// 1. Vérifier l'existence des données du formulaire
// 2. Passer les données en variables
// 3. Inclure les données dans la base
// 4. Renvoyer vers le contrôleur global


if (!empty($_POST['ideaname']) && !empty($_POST['ideatext'])) {
    
    $ideaname = $_POST['ideaname'];
    $ideatext = $_POST['ideatext'];
    
    $category = $_POST['category'];;
    $id_user = $_SESSION['id'];
    $likes = 1; 
    
    include_once('modele/crea_idea.php');
    $id_user = $_SESSION['id'];
    $points = 100;
    include_once('modele/ajoute_points.php');
    header('Location: index.php'); 
    
} else {                                                                        // Sinon renvoie le formulaire avec une page d'erreur
    
    $info = "<p>Au moins un des champs est vide. Merci de recommencer.</p>";
    include_once('vue/alerte.php');
    
    include_once('vue/header.php');                                                 
    include_once('vue/form_idea.php');
    include_once('vue/footer.php');
}







