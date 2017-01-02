<?php
// PAGE SENSIBLE DONC VERIFICATIONS

if (isset($info)) {
    include_once('vue/alerte.php');
}

include_once('vue/header.php');

if ($_SESSION['permissions'] == 'admin' AND isset($_SESSION['id']) AND isset($_SESSION['username']) ) { 
    
    include_once('modele/liste_users.php');
    include_once('vue/liste_users.php');
    
    include_once('modele/liste_projects.php');
    
    // $id_project = $_SESSION['project']; // non sélections tous les projet
    // $requete = $bdd->prepare('SELECT categories FROM ampli_projects WHERE id = :id_project');
    // $requete->execute(array('id_project' => $id_project));
    // $resultat = $requete->fetch();
    // $categories = $resultat['categories'];
    include_once('vue/form_inscription.php');

    
} else {
    header('Location: index.php');
}

include_once('vue/footer.php');



// A FAIRE
// Renommer la page 