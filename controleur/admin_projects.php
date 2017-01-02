<?php
// PAGE SENSIBLE DONC VERIFICATIONS

if (isset($info)) {
    include_once('vue/alerte.php');
}

include_once('vue/header.php');

if ($_SESSION['permissions'] == 'admin' AND isset($_SESSION['id']) AND isset($_SESSION['username']) ) { 
    
    include_once('modele/liste_projects.php');
    include_once('vue/liste_projects.php');
    
    include_once('vue/form_crea_project.php');
    
} else {
    header('Location: index.php');
}

include_once('vue/footer.php');



// A FAIRE
// Renommer la page 