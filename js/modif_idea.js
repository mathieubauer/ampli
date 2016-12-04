$('.card_idea .edit').click(function() {
    
    var id_button = $(this).parent().parent().attr("id"); 
    var id = id_button
    
    var contenu_titre = $('#titre_' + id).html();               // .val() serait peut-être plus opportun ?
    var contenu_texte = $('#texte_' + id).html();
        
    // Modification du formulaire / modal
    $('#ideaname_modif').attr('value', contenu_titre);
    $('#ideatext_modif').html(contenu_texte);
    
    // Apparition du formulaire / modal
    $('#form_idea_modif').modal('show');
    
    // A la validation de la modification
    $('#form_idea_modif_envoi').click(function() {
             
        var nouveauTitre = $('#ideaname_modif').val();
        var nouveauTexte = $('#ideatext_modif').val();
              
        var url = 'controleur/modif_idea.php?titre=' + nouveauTitre + '&texte=' + nouveauTexte + '&id=' + id;
                
        $.ajax({
            url: url,
            dataType: 'json',
            success: function(json) {
                $('#titre_' + id).html(json.ideaname);
                $('#texte_' + id).html(json.ideatext); 
                $('#form_idea_modif').modal('hide');
            },
            error: function() {
                alert('La requete n\'a pas abouti');
            }
        });
        
    });
        
});



$('.card_idea .suppr').click(function() {
    
    var id_button = $(this).parent().parent().attr("id");
    var id = id_button
    var contenu = $('#titre_' + id).html();
    
    $('#ideaname_suppr').html(contenu);
    
    $('#form_idea_suppr').modal('show');
    
    // A la validation de la suppression
    $('#form_idea_suppr_envoi').click(function() {
        
        var url = 'controleur/suppression_idea_user.php?id=' + id;
        
        $.ajax({
            url: url,
            success: function() { 
                $('#form_idea_suppr').modal('hide');
                //$('#carte_' + id).remove();
                var $grid = $('.grid').packery({
                itemSelector: '.grid-item'
                });
                $grid.packery('remove', $('#carte_' + id)).packery('shiftLayout');
            },
            error: function () {  }
        });
        
    });
    
});