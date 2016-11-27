<div class="row grid " data-packery='{ "itemSelector": ".grid-item", "gutter": 10 }'>    
    
<?php
while ($donnees = $requete->fetch()) {
?>



<div class="grid-item card">
<div class="card-header"><?php echo htmlspecialchars($donnees['category']); ?></div>
    
    
<?php if ($donnees['ideaimg'] != "") { ?>    
<img src="<?php echo $donnees['ideaimg']; ?>" alt="Card image" width="100%" height="100%">
<?php } ?> 

<div class="card-block">
<h4 class="card-title"><?php echo htmlspecialchars($donnees['ideaname']); ?></h4>
<p class="card-text"><?php echo htmlspecialchars($donnees['ideatext']); ?></p>
<a href="index.php?section=like_idea&idea=<?php echo $donnees['id']; ?>" class="btn btn-primary">J'aime</a>
</div>

<div class="card-footer text-muted">
<p>Auteur : <?php echo $donnees['username']; ?></p>
<cite>Likes : <?php echo $donnees['likes']; ?></cite>
</div>

</div>



<?php   
}
$requete->closeCursor();
?>  

        </div>           
