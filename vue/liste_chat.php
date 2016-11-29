<div class="row">    
        
<?php
while ($donnees = $requete->fetch()) {
?>

    
<div class="col-md-12">
    <div class="col-md-4">
        <?php echo $donnees['nom']; ?> :
    </div>
    
    <div class="col-md-8">
        <?php echo $donnees['message']; ?>
    </div>
    
</div>
 

<?php   
}
$requete->closeCursor();
?>  
    
</div>
