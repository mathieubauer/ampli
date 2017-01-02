<?php

// O. Vérifier qu'on est administrateur (faire le test et ajouter la fonctionnalité s'il y a lieu)

// 1. Vérifier l'existence des données du formulaire
// 2. Passer les données en variables
// 3. Inclure les données dans la base
// 4. Renvoyer vers le contrôleur global

// A faire : ne pas générer $target_file quand l'image n'est pas uploadée

// NOTES
// basename — Retourne le nom de la composante finale d'un chemin
// pathinfo — Retourne des informations sur un chemin système
// getimagesize — Retourne la taille d'une image
// file_exists — Vérifie si un fichier ou un dossier existe
// $_FILES['userfile']['name'] Le nom original du fichier, tel que sur la machine du client web.
// $_FILES['userfile']['tmp_name'] Le nom temporaire du fichier qui sera chargé sur la machine serveur.


if (!empty($_POST['ideaname']) && !empty($_POST['ideatext'])) {
    

    // ################################################# UPLOAD IMAGE
    
    if (is_uploaded_file($_FILES['ideaimg']['tmp_name'])) {
    
        $target_dir = "uploads/";
        $melange = md5(uniqid(rand(), true));
        $target_nomfichier = basename($_FILES["ideaimg"]["name"]);
        $target_file = $target_dir . $melange . $target_nomfichier;
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);         // jpg, png, etc.

        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["ideaimg"]["tmp_name"]);              // Si une erreur survient, FALSE est retourné.
            if($check !== false) {
            $info = "File is an image - " . $check["mime"] . ".";           // mime correspond au type MIME d'une image (s'affiche ?)
            $uploadOk = 1;
            } else {
            $info = "Désolé, votre fichier n'est pas une image.";
            $uploadOk = 0;
            }
        }

        // Check if file already exists
        if (file_exists($target_file)) {                                    // Vérifie que le fichier de destination n'existe pas déjà 
        $info = "Sorry, file already exists.";
        $uploadOk = 0;
        }

        // Check file size
        if ($_FILES["ideaimg"]["size"] > 10485760) {                        // 10 Mo
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
            $info = "Désolé, votre fichier n'a pas été chargé.";
        // if everything is ok, try to upload file
        } else {
            
            // Redimensionne le fichier ##################################################
            
            function image_resize($src, $dst, $width, $height, $crop=0) {

                if(!list($w, $h) = getimagesize($src)) return "Unsupported picture type!";
                // list — Assigne des variables comme si elles étaient un tableau

                $type = strtolower(substr(strrchr($src,"."),1)); 
                // strrchr — Trouve la dernière occurrence d'un caractère dans une chaîne
                // substr — Retourne un segment de chaîne
                if($type == 'jpeg') $type = 'jpg';
                switch($type){
                case 'bmp': $img = imagecreatefromwbmp($src); break;
                case 'gif': $img = imagecreatefromgif($src); break;
                case 'jpg': $img = imagecreatefromjpeg($src); break;
                case 'png': $img = imagecreatefrompng($src); break;
                default : return "Unsupported picture type!";
                }
                
                // crop dans tous les cas si image 2,5x plus haute que large
                if (($h / $w) > 2) {
                    $crop = 1 ;
                }

                // resize
                if($crop) {
                    if($w > $width or $h > $height) {
                        $ratio = max($width/$w, $height/$h);
                        $h = $height / $ratio;
                        $x = ($w - $width / $ratio) / 2;
                        $w = $width / $ratio;
                    } else {
                        $width = $w;
                        $height = $h;
                    }
                } else {
                    if($w > $width or $h > $height) {
                        $ratio = min($width/$w, $height/$h);
                        $width = $w * $ratio;
                        $height = $h * $ratio;
                        $x = 0;
                    } else {
                        $width = $w;
                        $height = $h;
                    }
                }
                
                /*
                if($crop) {
                    if($w < $width or $h < $height) return "Votre image est trop petite";
                    // Si appelée depuis une fonction, la commande return termine immédiatement la fonction, et retourne l'argument qui lui est passé.
                    $ratio = max($width/$w, $height/$h);
                    $h = $height / $ratio;
                    $x = ($w - $width / $ratio) / 2;
                    $w = $width / $ratio;
                } else {
                    if($w < $width and $h < $height) return "Votre image est trop petite";
                    $ratio = min($width/$w, $height/$h);
                    $width = $w * $ratio;
                    $height = $h * $ratio;
                    $x = 0;
                }
                */

                $new = imagecreatetruecolor($width, $height);
                // imagecreatetruecolor — Crée une nouvelle image en couleurs vraies

                // preserve transparency
                if($type == "gif" or $type == "png") {
                    imagecolortransparent($new, imagecolorallocatealpha($new, 0, 0, 0, 127));
                    // imagecolortransparent — Définit la couleur transparente
                    // imagecolorallocatealpha — Alloue une couleur à une image
                    imagealphablending($new, false);
                    // imagealphablending — Modifie le mode de blending d'une image
                    imagesavealpha($new, true);
                    // imagesavealpha — Configure l'enregistrement des informations complètes du canal alpha lors de sauvegardes d'images PNG
                }

                imagecopyresampled($new, $img, 0, 0, $x, 0, $width, $height, $w, $h);
                // imagecopyresampled — Copie, redimensionne, rééchantillonne une image

                switch($type) {
                    case 'bmp': imagewbmp($new, $dst); break;
                    case 'gif': imagegif($new, $dst); break;
                    case 'jpg': imagejpeg($new, $dst); break;
                    case 'png': imagepng($new, $dst); break;
                    // imagepng — Envoie une image PNG vers un navigateur ou un fichier
                }
                return true;
                
            }
            
            // FIN DE LA FONCTION
            // ENREGISTREMENT DES IMAGES
            
            $picture = $_FILES["ideaimg"];

            $pic_type = strtolower(strrchr($picture['name'],"."));
            $pic_name_original = $target_dir . time() . '_original_' . $target_nomfichier;
            $pic_name_modified = $target_dir . time() . '_modified_' . $target_nomfichier;
            // $pic_name = "uploads/original$pic_type";
            move_uploaded_file($picture['tmp_name'], $pic_name_original);
            if (true !== ($pic_error = @image_resize($pic_name_original, $pic_name_modified, 800, 600, 0))) {
            // PHP supporte un opérateur de contrôle d'erreur : c'est @. Lorsque cet opérateur est ajouté en préfixe d'une expression PHP, les messages d'erreur qui peuvent être générés par cette expression seront ignorés.
                echo $pic_error;
                unlink($pic_name);
            }

        }
        
        echo $info;
        
    };
   
    // INSERTION BDD #################################################    
    
    $ideaname = $_POST['ideaname']; 
    
    $ideatext = $_POST['ideatext']; 
    $ideatext = nl2br($ideatext);
    
    if(isset($_POST['category'])) {
        $category = $_POST['category'];
    } else {
        $category = 'Default';
    }
    
    if(isset($target_file)) { 
        $ideaimg = $pic_name_modified; 
    } else if(isset($_POST['category'])) {
        $ideaimg = 'img/placeholder/' . $_SESSION['project'] . '_' . $category . '.png';
    } else {
        $ideaimg = 'img/placeholder/default.png';
    }
    
    $id_user = $_SESSION['id'];
    $likes = 0; 
    $id_project = $_SESSION['project'];
    
    /*
    echo $ideaname;
    echo $ideatext;
    echo $ideaimg;
    echo $category;
    echo $id_user;
    echo $likes;
    echo $id_project;
    */
    
    
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







