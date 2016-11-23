<?php

// A FAIRE
// Créer également des cookies (pseudo + mdp haché)
// Voir systèmes de connexion tiers


// CREE DES VARIABLES DE SESSION
// ID du connecté
// USERNAME du connecté
// PERMISSIONS du connecté

// Récupère le pseudo et hache le mot de passe
$password_hache = sha1($_POST['password']);
$username = $_POST['username'];

//$password_hache = $_POST['password'];





// Appelle la base pour vérifier les correspondances
// Renvoie $resultat (fetch de la requête avec id et id_groupe)
include_once('modele/verification_user.php');


// Si pas de résultat, affiche une erreur
if (!$resultat) {
    header('Location: index.php?info=err_login');


// Sinon, autorise l'accès et crée les variables de session
} else {
    session_start();
    $_SESSION['id'] = $resultat['id'];
    $_SESSION['permissions'] = $resultat['permissions'];
    $_SESSION['username'] = $username;  
        
    header('Location: index.php');
}
