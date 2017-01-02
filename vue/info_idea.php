<div class="row idee_page">

<!-- Partie gauche ######################################## -->  
    
    <div class="col-lg-4">

    <?php if ($donnees['ideaimg'] != "") { ?>    
    <img src="<?php echo str_replace('_modified_', '_original_', $donnees['ideaimg']) ; ?>" alt="Card image" width="100%" height="">
    <?php } ?>

        <div class="my-3 mx-auto" style="width: 200px;">
        <a href="index.php" type="button" class="btn btn-secondary" style="width: 200px;">
            <span class="fa fa-arrow-circle-o-left fa-lg"></span>&nbsp;  Toutes les idées
        </a>
        </div>

        <div class="row">
            <div class="col-lg-12"><h3>Amplifier cette idée ?</h3><hr></div>
            
            <?php if (!isset($_SESSION['id'])) { ?>
            
                <div class="col-lg-12"><p>Pour amplifier cette idée, veuillez vous connecter</p></div>
                
                <div class="col-lg-12">
                <a href="index.php" class="btn btn-primary" style="width: 100%;" ><span class="fa fa-sign-in"></span> Connexion</a>
                </div>
            
                <div class="col-lg-12">
                <button class="btn btn-primary disabled" style="width: 100%;" ><span class="fa fa-heart"></span> J'aime</button>
                </div>
            
                <div class="col-lg-12">
                <button class="btn btn-primary disabled" style="width: 100%;" ><span class="fa fa-users"></span> Je contribue</button>
                </div>
            
            <?php } else { ?>

            <?php if ($button_like == 0) { ?>
                <div class="col-lg-12">
                <button id="like_<?php echo ($donnees['id']); ?>" class="btn btn-primary unliked" style="width: 100%;" >
                <span class="fa fa-heart"></span> J'aime !
                </button>
                </div>
            <?php } else { ?>
                <div class="col-lg-12">
                <button id="like_<?php echo ($donnees['id']); ?>" class="btn btn-primary liked" style="width: 100%;" >
                <span class="fa fa-heart-o"></span> Je n'aime plus
                </button>
                </div>
            <?php } ?>

            <?php if ($button_contribute == 0) { ?>
                <div class="col-lg-12">
                <button id="contribute_<?php echo ($donnees['id']); ?>" class="btn btn-primary disabled" data-toggle="modalXXX" data-target="#modalContribution" style="width: 100%;" >
                <span class="fa fa-users"></span> Je contribue !
                </button>
                </div> 
            <?php } ?>

            <?php if ($button_portage == 0) { ?>
                <div class="col-lg-12">
                <button class="btn btn-primary disabled" id="bouton_portage" data-toggle="modalXXX" data-target="#modalPortage" style="width: 100%;" >
                <span class="fa fa-hand-pointer-o"></span> Je porte !
                </button>
                </div>
            <?php } ?>
            
            <?php } ?>

            <div class="col-lg-12"><p>Pour partager cette idée, copiez et envoyez l'url !</p></div>
        </div>

    </div>
    
    
                    
<!-- Partie droite ######################################## -->
    
    <div class="col-lg-8">
        <div class="card">

            <div class="card-header">
            <div class="col-lg-12"><h2><?php echo ($donnees['ideaname']); ?></h2></div>
            </div>
            <div class="card-block">
            <div class="col-lg-12"><strong class="block_category"><?php echo ($donnees['category']); ?></strong></div>
            </div>
            <hr class="hr_thin">


            <div class="card-block">
                <div class="col-lg-12"><p><?php echo ($donnees['ideatext']); ?></p></div>
            </div>  

            <div class="card-footer">
            <div class="col-lg-4">proposée par <a href="index.php?section=user&user=<?php echo ($donnees['author']); ?>"><?php echo ($donnees['author']); ?></a> </div>
            <div class="col-lg-4">portée par <span id="porteur"><?php echo $porteur; ?></span></div>
            <div class="col-lg-2"><span id="nblikes_<?php echo ($donnees['id']); ?>"><?php echo ($donnees['likes']); ?></span> <span class="fa fa-heart"></span></div>
            <div class="col-lg-2"><span id="nbcontributions_<?php echo ($donnees['id']); ?>"><?php echo $nbContributions; ?></span> <span class="fa fa-users"></span></div>

            </div>

        </div>
        <br>

        <div class="card">
<div id="container_contributions">
            <div class="card-header">
                <h3 class="col-lg-12">Contributions</h3>
            </div>   

            <?php 
            while ($contributions = $requete->fetch()) {
            ?>
            <div class="card-block card_block_thin">
                <div class="col-lg-3"><span class="fa fa-user"></span>&nbsp;<strong><?php echo ($contributions['author']); ?></strong></div>
                <div class="col-lg-7"><?php echo ($contributions['contribution']); ?></div>
            </div><hr class="hr_thin">
            <?php } ?>
            
            
                    
</div>
        
        <div class="card-footer">

            <div class="col-md-8">  
            <div class="input-group">
            <!-- <textarea class="form-control" rows="4" name="contribution" id="contribution"></textarea> -->
            <input type="text" name="contribution" id="contribution" class="form-control" placeholder="Votre contribution" />
            </div>
            </div>

            <div class="col-md-4">
            <button type="submit" id="contribution_<?php echo ($donnees['id']); ?>" class="btn btn-primary contribution">Envoyer</button>
            </div>            

        </div>
        </div>

    </div>
    


    
    
<!-- Modal pour les contributions -->
    
    <div class="modal fade col-lg-4" id="modalContribution" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
            <div class="modal-content">

                <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Une contribution ?</h4>
                </div>

                <div class="modal-body">
                    <label for="contribution">Je souhaite contribuer en...</label>
                    <textarea class="form-control" rows="4" name="contribution" id="contribution"></textarea><br>
                </div>

                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                <button type="submit" id="contribution_<?php echo ($donnees['id']); ?>" class="btn btn-primary contribution">Envoyer</button>
                </div>

            </div>
    </div>
    </div>
    
<!-- Modal pour confirmer portage -->
    
    <div class="modal fade" id="modalPortage" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
            <div class="modal-content">

                <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Voulez-vous porter cette idée ?</h4>
                </div>

                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Oups, non...</button>
                <button type="submit" id="portage_<?php echo ($donnees['id']); ?>" class="btn btn-primary portage">Allons-y !</button>
                </div>

            </div>
    </div>
    </div>
                  
</div>

