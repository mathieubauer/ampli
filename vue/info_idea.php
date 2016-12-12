<div class="row idee_page">

<!-- Partie gauche ######################################## -->  
    
    <div class="col-lg-4">

    <?php if ($donnees['ideaimg'] != "") { ?>    
    <img src="<?php echo $donnees['ideaimg']; ?>" alt="Card image" width="100%" height="">
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
                <button id="contribute_<?php echo ($donnees['id']); ?>" class="btn btn-primary" data-toggle="modal" data-target="#modalContribution" style="width: 100%;" >
                <span class="fa fa-users"></span> Je contribue !
                </button>
                </div> 
            <?php } ?>

            <?php if ($button_portage == 0) { ?>
                <div class="col-lg-12">
                <button class="btn btn-primary" id="bouton_portage" data-toggle="modal" data-target="#modalPortage" style="width: 100%;" >
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
            <div class="col-lg-8"><h2><?php echo ($donnees['ideaname']); ?></h2></div>
            <div class="col-lg-4"><p>Catégorie : <?php echo ($donnees['category']); ?></p></div>
            </div>


            <div class="card-block">

            <p><?php echo ($donnees['ideatext']); ?></p>

            </div>  

            <div class="card-footer">
            <div class="col-lg-4">proposée par <?php echo ($donnees['author']); ?></div>
            <div class="col-lg-4">portée par <span id="porteur"><?php echo $porteur; ?></span></div>
            <div class="col-lg-2"><span id="nblikes_<?php echo ($donnees['id']); ?>"><?php echo ($donnees['likes']); ?></span> <span class="fa fa-heart"></span></div>
            <div class="col-lg-2"><span id="nbcontributions_<?php echo ($donnees['id']); ?>"><?php echo $nbContributions; ?></span> <span class="fa fa-users"></span></div>

            </div>

        </div>
        <br>

        <div class="row" id="container_contributions">
            <div class="col-lg-10 offset-lg-1"><h3>Contributions</h3><hr></div>

            <?php 
            while ($contributions = $requete->fetch()) {
            ?>
                <div class="col-lg-3 offset-lg-1"><span class="fa fa-user"></span> <?php echo ($contributions['author']); ?></div>
                <div class="col-lg-7"><?php echo ($contributions['contribution']); ?></div>
            <?php } ?>

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

