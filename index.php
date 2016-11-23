<?php
session_start();

// CONTROLEUR GLOBAL


include_once('modele/connexion_sql.php'); 


if (isset($_SESSION['username'])) {
    $menu_personnalise = '
    <li class="nav-item"><a class="nav-link" href="#">Bienvenue ' .  $_SESSION['username']  . '</a></li>
    <li class="nav-item"><a class="nav-link" href="index.php?section=deconnexion">Se déconnecter</a></li>
    ' ; 
}




// Affiche des informations complémentaires ou alertes
if ($_GET['info'] == 'login_ok') {
    $info = "<p>L'utilisateur a été crée avec succès. Vous pouvez maintenant vous connecter.</p>";
}

if ($_GET['info'] == 'todo_ok') {
    $info = "<p>La tâche a été crée avec succès.</p>";
    include_once('controleur/index.php');
}

if ($_GET['info'] == 'raz_score') {
    $info = "<p>Les résultats ont été remis à zéro.</p>";
}

if ($_GET['info'] == 'err_login') {
    $info = "<p>Le login et/ou le mot de passe est erronné.</p>";
}

if ($_GET['info'] == 'err_crea') {
    $info = "<p>Une erreur est survenue, merci de recommencer.</p>";
}

if ($_GET['info'] == 'suppr_user') {
    $info = "<p>L'utilisateur a été supprimé.</p>";
}

if ($_GET['info'] == 'nomorelikes') {
    $info = "Vous n'avez plus de likes à distribuer. Vous en receverez 10 dès lundi !";
}



// Traite les pages sans méthode GET (dervrait venir en premier ?)
if (!isset($_GET['section']) OR $_GET['section'] == 'index') { // page d'accueil par défaut (voir si OK d'envoyer des vues)
    include_once('controleur/index.php');
}




if ($_GET['section'] == 'inscription') {
    include_once('controleur/inscription.php'); // vers le formulaire d'inscription
}

if ($_GET['section'] == 'crea_user') {
    include_once('controleur/crea_user.php'); // vers la procédure de création qui renvoie à la page d'accueil (voir si nécessaire de repasser ici)
}

if ($_GET['section'] == 'verification_user') {
    include_once('controleur/verification_user.php');
}

if ($_GET['section'] == 'deconnexion') {
    include_once('controleur/deconnexion.php');
}


if ($_GET['section'] == 'start_diag') {
    include_once('controleur/start_diag.php');
}

if ($_GET['section'] == 'diag') {
    include_once('controleur/diag.php');
}

if ($_GET['section'] == 'test_raz') {
    include_once('controleur/test_raz.php');
}

if ($_GET['section'] == 'test_suiv') {
    include_once('controleur/test_suiv.php');
}


if ($_GET['section'] == 'start_form') {
    include_once('controleur/start_form.php');
}

if ($_GET['section'] == 'form') {
    include_once('controleur/form.php');
}

if ($_GET['section'] == 'form_add') {
    include_once('controleur/form_add.php');
}


if ($_GET['section'] == 'module') {                     // module de contenu statique
    include_once('controleur/module.php');
}




// Pages administration ###################################################

if ($_GET['section'] == 'admin_users') {
    include_once('controleur/admin_users.php');
}

if ($_GET['section'] == 'suppression_user') {
    include_once('controleur/suppression_user.php');
}

if ($_GET['section'] == 'admin_groupes') {
    include_once('controleur/admin_groupes.php');
}

if ($_GET['section'] == 'edit_groupe') {
    include_once('controleur/edit_groupe.php');
}

// Idées ####################################################################

//if ($_GET['section'] == 'todo') {
//    include_once('controleur/todo.php');
//}

if ($_GET['section'] == 'crea_idea') {
    include_once('controleur/crea_idea.php');
}

if ($_GET['section'] == 'like_idea') {
    include_once('controleur/like_idea.php');
}

if ($_GET['section'] == 'todo_suppr') {
    include_once('controleur/todo_suppr.php');
}

// ###########################################################################





// Erreur 404 gérée ici ?
