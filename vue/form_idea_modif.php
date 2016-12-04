<!-- Modal Modification -->

<div class="modal fade" id="form_idea_modif" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
    
    <!--<form method="post" enctype="multipart/form-data"> <!-- L'enctype à utiliser est multipart/form-data -->
        
        <div class="modal-content">
            
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title" id="form_idea_modif_label">Modifier votre idée</h4>
            </div>
            
            <div class="modal-body">

                <label for="ideaname">Titre</label>
                <input type="text" name="ideaname" id="ideaname_modif" class="form-control" /><br>

                <label for="ideatext">Description</label>
                <textarea class="form-control" rows="4" name="ideatext" id="ideatext_modif"></textarea><br>

                <!--
                <label for="category">Catégorie</label>
                <select class="form-control" name="category" id="category">
                <option>Rêve</option>
                <option>Mise en oeuvre</option>
                <option>Projet</option>
                </select><br>

                <label for="ideaimg">Illustration (facultatif)</label>
                <input type="file" name="ideaimg" id="ideaimg" class="form-control" /> <!-- Upload de fichier --
                <input type="hidden" name="MAX_FILE_SIZE" value="10485760" /> <!-- 10 Mo --
                -->
                
            </div>
            
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
            <button type="submit" class="btn btn-primary" id="form_idea_modif_envoi">Envoyer</button>
            </div>
            
        </div>
        
    <!--</form>-->
    
</div>
</div>

<!-- Modal Suppression -->

<div class="modal fade text-xs-center" id="form_idea_suppr">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title">Voulez-vous supprimer cette idée ?</h4>
        </div>
      
        <div class="modal-body">
        <p id="ideaname_suppr"></p>
        </div>
      
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
        <button type="button" class="btn btn-primary" id="form_idea_suppr_envoi">Supprimer</button>
        </div>
        
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->