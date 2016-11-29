<?php
session_start();

if(isset($_GET['message'])) {
    
    $nom = $_SESSION['username'];
    $message = $_GET['message'];
    
    include_once('../modele/connexion_sql.php');
    include_once('../modele/chat_add.php');
    
} 