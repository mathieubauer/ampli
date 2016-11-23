<div class="row">
<div class="col-md-12">
    <div class="my-3 mx-auto" style="width: 200px;">

        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal" style="width: 200px;">
        Proposer une idée
        </button>

    </div>
</div>
</div>




<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
      <form method="post" action="index.php?section=crea_idea" >
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Une idée ?</h4>
      </div>
      <div class="modal-body">
        

                    <label for="ideaname">Titre</label>
                    <input type="text" name="ideaname" id="ideaname" class="form-control" /><br>

                    <label for="ideatext">Description</label>
                    <textarea class="form-control" rows="4" name="ideatext" id="ideatext"></textarea><br>
          
                    <label for="category">Catégorie</label>
                    <select class="form-control" name="category" id="category">
                      <option>Rêve</option>
                      <option>Mise en oeuvre</option>
                      <option>Projet</option>
                    </select>

                
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
        <button type="submit" class="btn btn-primary">Envoyer</button>
      </div>
    </div>
          </form>
  </div>
</div>