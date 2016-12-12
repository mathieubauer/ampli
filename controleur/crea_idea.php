<?php

// O. Vérifier qu'on est administrateur (faire le test et ajouter la fonctionnalité s'il y a lieu)

// 1. Vérifier l'existence des données du formulaire
// 2. Passer les données en variables
// 3. Inclure les données dans la base
// 4. Renvoyer vers le contrôleur global

// A faire : ne pas générer $target_file quand l'image n'est pas uploadée


if (!empty($_POST['ideaname']) && !empty($_POST['ideatext'])) {
    

    // ################################################# UPLOAD IMAGE
    
    if (is_uploaded_file($_FILES['ideaimg']['tmp_name'])) {
    
        $target_dir = "uploads/";
        $melange = md5(uniqid(rand(), true));
        $target_file = $target_dir . $melange .  basename($_FILES["ideaimg"]["name"]);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["ideaimg"]["tmp_name"]);
            if($check !== false) {
            $info = "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
            } else {
            $info = "Désolé, votre fichier n'est pas une image.";
            $uploadOk = 0;
            }
        }

        // Check if file already exists
        if (file_exists($target_file)) {
        $info = "Sorry, file already exists.";
        $uploadOk = 0;
        }

        // Check file size
        if ($_FILES["ideaimg"]["size"] > 10485760) {
        $info = "Désolé, votre fichier est trop volumineux.";
        $uploadOk = 0;
        }

        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
        $info = "Désolé, seuls les fichiers JPG, JPEG, PNG & GIF sont autorisés.";
        $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            $info = "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["ideaimg"]["tmp_name"], $target_file)) {
            // $info = "The file ". basename( $_FILES["ideaimg"]["name"]). " has been uploaded."; Pas d'affichage si ça fonctionne
            } else {
            $info = "Sorry, there was an error uploading your file.";
            }
        }
        
        echo $info;
        
    };
    
    
   
    // INSERTION BDD #################################################    
    
    $ideaname = $_POST['ideaname'];
    $ideatext = $_POST['ideatext'];
    
    if(isset($target_file)) { 
        $ideaimg = $target_file; 
    } else {
        $ideaimg = "";
    }
    
    $category = $_POST['category'];;
    $id_user = $_SESSION['id'];
    $likes = 0; 
    $id_project = $_SESSION['project'];
    
    include_once('modele/crea_idea.php');
    //include_once('modele/crea_wp_post.php');
    //$id_user = $_SESSION['id'];
    //$points = 100;
    //include_once('modele/ajoute_points.php');
    header('Location: index.php'); 
    
} else {                                                                        // Sinon renvoie le formulaire avec une page d'erreur
    
    $info = "Au moins un des champs est vide. Merci de recommencer.";
    include_once('vue/alerte.php');
    
    include_once('vue/header.php');                                                 
    include_once('vue/form_idea.php');
    include_once('vue/footer.php');
}







