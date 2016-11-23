<?php

// 1. Vérifier l'existence des données du formulaire
// 2. Passer les données en variables
// 3. Inclure les données dans la base
// 4. Renvoyer vers le contrôleur global


$username = $_SESSION['username'];
include_once('modele/info_user.php');
if ($resultat['likes'] > 0) {

if ((isset($_GET['idea']) && !empty($_GET['idea']))) { 

    $id_like = $_GET['idea'];  
    include_once('modele/like_idea.php');
    $id_user = $_SESSION['id'];
    $points = 10;
    include_once('modele/ajoute_points.php');
    include_once('modele/retranche_like.php');
    header('Location: index.php');

}
    
} else {
    header('Location: index.php?info=nomorelikes');
}



// 0. Vérifier qu'on est administrateur

// 1. Vérifier l'existence des données du formulaire
// 2. Passer les données en variables
// 3. Inclure les données dans la base
// 4. Renvoyer vers le contrôleur global


/*

if (!empty($_POST['nom']) && !empty($_POST['description'])) {
    
    $nom = $_POST['nom'];
    $description = $_POST['description'];
    
    include_once('modele/todo_add.php');
    header('Location: index.php?section=todo'); 
    
} else {                                                                        // Sinon renvoie le formulaire avec une page d'erreur
    
    $info = "<p>Au moins un des champs est vide. Merci de recommencer.</p>";
    include_once('vue/alerte.php');
    
    include_once('vue/header.php');                                                 
    include_once('vue/formulaire_todo.php');
    include_once('vue/footer.php');
}









