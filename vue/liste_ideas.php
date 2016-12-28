<div class="row gutter-10">  
<div class="grid"> 
        
<?php  
    
    $id_user = $_SESSION['id'];                             // id de l'utilisateur connecté   
   
    // Fonction qui identifie les idées likées / non likées par l'utilisateur
    function texte_like($id_user, $id_idea) {
    
        include('modele/connexion_sql.php');  
        include('modele/verification_likes.php');

        if (!$resultat) { $texte_bouton_like = ' class="unliked btn-link" ><span class="fa fa-heart-o"></span>';
        } else { $texte_bouton_like = ' class="liked btn-link" ><span class="fa fa-heart"></span>';
        }
                
        return $texte_bouton_like;
        
    }
    
    // Fonction qui identifie les idées de l'utilisateur
    function user_ideas($id_user, $id_idea) {
        
        include('modele/connexion_sql.php');  
        include('modele/verification_idea.php');
        
        if (!$resultat) { $edit_auteur = '';
        } else { 
            $edit_auteur = '
            <button class="btn btn-link edit"><span class="fa fa-pencil"></button>
            <button class="btn btn-link suppr"><span class="fa fa-trash"></span></button>';
        }
        
        return $edit_auteur;
        
    }
    
    
while ($donnees = $requete->fetch()) {
        
    $id_idea = $donnees['id'];                              // id de l'idée    
    $tl = texte_like($id_user, $id_idea);                   // appelle la fonction -> 
    
    $edit = user_ideas($id_user, $id_idea);
    
?>

 
<div class="col-md-3 grid-item" id="carte_<?php echo htmlspecialchars($donnees['id']); ?>">
<div class="grid-item-content">

    <div class="card card_idea" id="<?php echo htmlspecialchars($donnees['id']); ?>" >
        
        <!-- TITRE CARTE --
        <div class="card-header"><?php echo htmlspecialchars($donnees['category']); ?></div>
        -->

        <!-- IMAGE CARTE -->
        <?php if ($donnees['ideaimg'] != "") { ?>    
        <img src="<?php echo $donnees['ideaimg']; ?>" alt="Card image" width="100%" height="100%" class="card-img-top">
        <?php } else if (!empty($donnees['category'])) { ?> 
        <img src="img/placeholder/<?php echo $donnees['id_project'] . '_' . $donnees['category']; ?>.png" alt="Card image" width="100%" height="100%" class="card-img-top">
        <?php } else { ?> 
        <img src="img/placeholder/default.png" alt="Card image" width="100%" height="100%" class="card-img-top">
        <?php } ?>

        <!-- TEXTE CARTE -->
        <div class="card-block">
            <h3 class="card-title <?php echo $ca ?>" id="titre_<?php echo $donnees['id']; ?>"><?php echo htmlspecialchars($donnees['ideaname']); ?></h3>
            <p class="card-text" id="texte_<?php echo $donnees['id']; ?>"><?php echo ($donnees['ideatext']); ?></p>
            <!-- <a href="index.php?section=like_idea&idea=<?php // echo $donnees['id']; ?>" class="btn btn-primary">J'aime</a> -->
            
            <!-- <button id="like_<?php // echo $donnees['id']; ?>" class="btn btn-primary like btn-sm"><?php // echo $tl ?></button> -->
            
        </div>

        <!-- FOOTER CARTE -->
        <div class="card-footer text-muted">
            
            <div class="col-md-6">
                <a href="index.php?section=user&user=<?php echo $donnees['username']; ?>" class="author_link">
                    <span class="fa fa-user"></span>
                    <span><?php echo $donnees['username']; ?></span>
                </a>
            </div>
            
            <div class="col-md-3">
                <span class="bouton_ampli">
                    <a href="index.php?section=idea&idea=<?php echo htmlspecialchars($donnees['id']); ?>">
                    <img src="img/favicon.png" alt="ampli" width="22px">
                    </a>
                </span>
            </div>
            
            <div class="col-md-3 card_likes">
                <span id="nblikes_<?php echo $donnees['id']; ?>" class="like_count">
                    <?php echo $donnees['likes']; ?>
                </span>
                    
                <button id="like_<?php echo $donnees['id']; ?>" <?php echo $tl ?></button>  
            </div>
            
            
            
            
            
            
        </div>
        
        <?php if($edit != '') { ?>
            
            <div class="card-footer footer_edit"><?php echo $edit ?></div>
        <?php } ?>
        
        
        
        

    </div>

</div>
</div>
 

<?php   
}
$requete->closeCursor();
?>  

</div>                   
</div>