<?php

if (isset($_GET['project'])) {
        
    $_SESSION['project'] = $_GET['project'];
    
    $id_project = $_SESSION['project'];
    $sql = 'SELECT * FROM ampli_projects WHERE id = ?';
    $requete = $bdd->prepare($sql);
    $requete->execute(array($id_project));
    $resultat = $requete->fetch();
    $_SESSION['project_name'] = $resultat['name'];  
    
    header('Location: index.php');

} else {
    echo 'Ce projet n\existe pas';
}

        
