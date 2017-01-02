<div class="row">
<div class="col-md-6 offset-md-3">
<div class="card">
<div class="card-block">

    <form method="post" action="index.php?section=crea_user" class="form-horizontal">

    <legend>Inscription</legend>

    <div class="input-group">
        <span class="input-group-addon"><span class="fa fa-user fa-lg"></span></span> 
    <input type="text" name="username" id="username" class="form-control" placeholder="Identifiant" />
    </div>
    <br>

    <div class="input-group">
    <span class="input-group-addon"><span class="fa fa-lock fa-lg"></span></span>
    <input type="password" name="password1" id="password1" class="form-control" placeholder="Mot de passe" />
    </div>
    <br>

    <div class="input-group">
    <span class="input-group-addon"><span class="fa fa-lock fa-lg"></span></span>
    <input type="password" name="password2" id="password2" class="form-control" placeholder="Confirmer le mot de passe" />
    </div>
    <br>
        
    <select class="form-control" name="id_project_default" id="id_project_default">
    <option value="" disabled selected>Catégorie</option>
    <?php while ($donnees = $requete->fetch()) { ?>
    <option value="<?php echo ($donnees['id']); ?>"><?php echo ($donnees['name']); ?></option>
    <?php } $requete->closeCursor(); ?>   
    </select><br>
        

    <input type="submit" value="Inscription" class="btn btn-primary center-block" />
    <br>

    <div class="row">
    <a href="index.php" class="btn btn-link pull-right disabled">J'ai déjà un compte</a>
    </div>

    </form>
    
</div>
</div>
</div>
</div>
