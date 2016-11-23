<h2>Articles issus du blog</h2>

<div class="row">    
    
<?php
while ($donnees = $requete->fetch()) {
?>

    
<div class="col-md-6">

<div class="card">
<div class="card-header">Post de blog</div>

<div class="card-block">
<h4 class="card-title"><?php echo ($donnees['post_title']); ?></h4>
<p class="card-text"><?php echo ($donnees['post_content']); ?></p>
</div>

<div class="card-footer text-muted">
<p>Auteur : <?php echo $donnees['username']; ?></p>
</div>

</div>

</div>
 

<?php   
}
$requete->closeCursor();
?>  

                  
</div>