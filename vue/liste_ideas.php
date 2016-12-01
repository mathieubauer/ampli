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

    <div class="card card_idea" id="<?php echo htmlspecialchars($donnees['id']); ?>" data-toggle="modal" data-target="#modif_idea">
    
        <div class="card-header"><?php echo htmlspecialchars($donnees['category']); ?></div>

        <?php if ($donnees['ideaimg'] != "") { ?>    
        <img src="<?php echo $donnees['ideaimg']; ?>" alt="Card image" width="100%" height="100%">
        <?php } ?> 

        <div class="card-block">
        <h4 class="card-title" id="titre_<?php echo $donnees['id']; ?>"><?php echo htmlspecialchars($donnees['ideaname']); ?></h4>
        <p class="card-text"><?php echo htmlspecialchars($donnees['ideatext']); ?></p>
        <!-- <a href="index.php?section=like_idea&idea=<?php // echo $donnees['id']; ?>" class="btn btn-primary">J'aime</a> -->
        <button id="like_<?php echo $donnees['id']; ?>" class="btn btn-primary like"><?php echo $tl ?></button>
        </div>

        <div class="card-footer text-muted">
        Auteur : <?php echo $donnees['username']; ?></br>
        <cite id="nblike_<?php echo $donnees['id']; ?>">Likes : <?php echo $donnees['likes']; ?></cite>
        </div>

    </div>

</div>
 

<?php   
}
$requete->closeCursor();
?>  


                  
</div>


<!-- Modal --
<div class="modal fade" id="modif_idea" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Modifier une idée</h4>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>