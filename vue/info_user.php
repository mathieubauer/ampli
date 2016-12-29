<div class="row">
    
    <!-- Colonne gauche ###################### -->
    <div class="col-md-3">
        <a href="index.php" type="button" class="btn btn-secondary" style="width: 100%;">
            <span class="fa fa-arrow-circle-o-left fa-lg"></span>&nbsp;  Retour aux idées
        </a>
    </div>
    
    <!-- Colonne centre ###################### -->
    <div class="col-md-6">
        <div class="card">
    
            <?php
            while ($donnees = $requete->fetch()) {
            ?>

            <div class="card-header">
                <div class="col-md-4">
                    <img src="img/avatar_defaut.jpg" alt="avatar" class="img-thumbnail" />
                </div>
                <div class="col-md-8">
                <h2><?php echo ($donnees['username']); ?></h2>
                </div>
                
            </div>

            <!-- <p>Identifiant : <?php echo ($donnees['id']); ?></p> -->

            <!-- <p>Score : <?php echo ($donnees['score']); ?></p> -->
            <!-- <p>Likes : <?php echo ($donnees['likes']); ?></p> -->
            
            <div class="card-block">
                
                <?php echo $nb_ideas; ?> idées proposées<br>
                <?php echo $likes_donnes; ?> likes donnés<br>
                <?php echo $likes_obtenus; ?> likes obtenus<br>
                <?php echo $nb_contributions; ?> contributions aux idées<br>
            
            </div>

        <?php   
        }
        $requete->closeCursor();
        ?>  
        
            </div>
        
    </div>
    
    <!-- Colonne droite ###################### -->
    <div class="col-md-3">
        <div class="card">
            <div class="card-header">
                Dernières idées proposées
            </div>
            <?php
            while ($donnees2 = $requete2->fetch()) {
            ?>
                <a href="index.php?section=idea&idea=<?php echo ($donnees2['id']); ?>">
                <div class="card-block">
                <?php echo ($donnees2['ideaname']); ?>
                </div>
                    </a><hr class="hr_thin">
            
            <?php   
            }
            $requete->closeCursor();
            ?>

        </div>
    </div>


                  
</div>