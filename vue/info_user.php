<div class="row">  
    
    <h2>Info utilisateur</h2>
    
    <?php
    while ($donnees = $requete->fetch()) {
    ?>
    
    <p>Nom d'utilisateur : <?php echo ($donnees['username']); ?></p>
    <p>Identifiant : <?php echo ($donnees['id']); ?></p>
    <p>Score : <?php echo ($donnees['score']); ?></p>
    <p>Likes : <?php echo ($donnees['likes']); ?></p>


    <?php   
    }
    $requete->closeCursor();
    ?>  

                  
</div>