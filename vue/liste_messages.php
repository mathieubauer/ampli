<h2>Messages</h2>

<div id="chat">


</div>








<div class="row">    
    
<?php
while ($donnees = $requete->fetch()) {
?>

    
<div class="col-md-4">

<div class="card">

<div class="card-block">
<p class="card-text"><?php echo ($donnees['message']); ?></p>
</div>

<div class="card-footer text-muted">
Auteur : <?php echo $donnees['id_user']; ?>
</div>

</div>

</div>
 

<?php   
}
$requete->closeCursor();
?>  

                  
</div>