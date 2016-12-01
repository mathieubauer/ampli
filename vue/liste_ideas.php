<div class="row">    
    
<?php  
    
    $id_user = $_SESSION['id'];                             // id de l'utilisateur connecté   
   
    function texte_like($id_user, $id_idea) {
    
        include('modele/connexion_sql.php');  
        include('modele/verification_likes.php');

        if (!$resultat) {
            $texte_bouton_like = 'J\'aime';
        } else {
            $texte_bouton_like = 'Je n\'aime plus';
        }
        
        return $texte_bouton_like;
        
    }
    
    
while ($donnees = $requete->fetch()) {
        
    $id_idea = $donnees['id'];                              // id de l'idée    
    $tl = texte_like($id_user, $id_idea);                   // appelle la fonction -> 
    
?>

    
<div class="col-md-3">

    <div class="card" id="<?php echo htmlspecialchars($donnees['id']); ?>">
    
        <div class="card-header"><?php echo htmlspecialchars($donnees['category']); ?></div>

        <?php if ($donnees['ideaimg'] != "") { ?>    
        <img src="<?php echo $donnees['ideaimg']; ?>" alt="Card image" width="100%" height="100%">
        <?php } ?> 

        <div class="card-block">
        <h4 class="card-title"><?php echo htmlspecialchars($donnees['ideaname']); ?></h4>
        <p class="card-text"><?php echo htmlspecialchars($donnees['ideatext']); ?></p>
        <!-- <a href="index.php?section=like_idea&idea=<?php // echo $donnees['id']; ?>" class="btn btn-primary">J'aime</a> -->
        <button id="like_<?php echo $donnees['id']; ?>" class="btn btn-primary like"><?php echo $tl ?></button>
        </div>

        <div class="card-footer text-muted">
        <p>Auteur : <?php echo $donnees['username']; ?></p>
        <cite id="nblike_<?php echo $donnees['id']; ?>">Likes : <?php echo $donnees['likes']; ?></cite>
        </div>

    </div>

</div>
 

<?php   
}
$requete->closeCursor();
?>  

                  
</div>