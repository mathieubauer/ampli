<?php
// PAGE SENSIBLE DONC VERIFICATIONS


if ($_SESSION['permissions'] == 'admin' AND isset($_SESSION['id']) AND isset($_SESSION['username']) ) {
        
    if ((isset($_GET['user']) && !empty($_GET['user']))) {        
        $id_suppr = $_GET['user'];        
        include_once('modele/suppression_user.php');
        header('Location: index.php?section=admin_users&info=suppr_user');
    }
    
} else {
    header('Location: index.php');
}


// Créer un popup de vérification avant suppression





