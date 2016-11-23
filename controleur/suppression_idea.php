<?php
// PAGE SENSIBLE DONC VERIFICATIONS


if ($_SESSION['permissions'] == 'admin' AND isset($_SESSION['id']) AND isset($_SESSION['username']) ) {
        
    if ((isset($_GET['idea']) && !empty($_GET['idea']))) {        
        $id_suppr = $_GET['idea'];        
        include_once('modele/suppression_idea.php');
        header('Location: index.php?section=admin_ideas&info=suppr_idea');
    }
    
} else {
    header('Location: index.php');
}


// Créer un popup de vérification avant suppression





