<?php
// session_start();

include_once('../modele/connexion_sql.php');  

// VERIFIER LE PROBLEME GET / POST

if($_GET['titre'] == 'null') {
    
    $id_idea = $_GET['id'];
    
    $requete = $bdd->query('SELECT ideaname FROM ampli_ideas WHERE id = ' . $id_idea);
    $requete->execute();
    $donnees = $requete->fetch();
    echo $donnees['ideaname'];    
    
    
} else if(isset($_GET['titre']) && isset($_GET['id']) && !empty($_GET['titre'])) {
    
    $ideaname = $_GET['titre'];
    $id_idea = $_GET['id'];
    
    $requete = $bdd->prepare('UPDATE ampli_ideas SET ideaname = :ideaname WHERE id = :id_idea');
    $requete->execute(array(
        'ideaname' => $ideaname,
        'id_idea' => $id_idea));
    
    echo $ideaname;
    
} else {
    
    echo 'Insérer un titre';
    
};


