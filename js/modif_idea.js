$('.edit').on('click', function() {
    
    var id_button = $(this).parent().parent().attr("id"); 
    var id = id_button
    
    var contenu_titre = $('#titre_' + id).html();               // .val() serait peut-être plus opportun ?
    var contenu_texte = $('#texte_' + id).text();
            
    // Modification du formulaire / modal
    $('#ideaname_modif').attr('value', contenu_titre);
    $('#ideatext_modif').html(contenu_texte);
    
    // Apparition du formulaire / modal
    $('#form_idea_modif').modal('show');
    
    // A la validation de la modification
    $('#form_idea_modif_envoi').one('click', function() {       // one ! sinon agit plusieurs fois (je ne sais pas pourquoi)
                     
        var nouveauTitre = $('#ideaname_modif').val();
        var nouveauTexte = $('#ideatext_modif').val();
        var nouveauTexteEncode = encodeURIComponent(nouveauTexte);
                      
        // var url = 'controleur/modif_idea.php?titre=' + nouveauTitre + '&texte=' + nouveauTexte + '&id=' + id;
        var url = 'controleur/modif_idea.php';
                
        $.ajax({
            url: url,
            type: 'POST',
            data: 'titre=' + nouveauTitre + '&texte=' + nouveauTexteEncode + '&id=' + id,
            dataType: 'json',
            success: function(json) {
                $('#titre_' + id).html(json.ideaname);
                $('#texte_' + id).html(json.ideatext); 
                $('#form_idea_modif').modal('hide');
                var $grid = $('.grid').packery({
                itemSelector: '.grid-item'
                });
                $grid.packery('shiftLayout');
            },
            error: function() {
                alert('La requete n\'a pas abouti');
            }
        });
        
    });
    
    /*
    $('#ideaname_modif').removeAttr('value');
    $('#ideatext_modif').val('');
    delete contenu_texte; */

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
                var $grid = $('.grid').packery({
                itemSelector: '.grid-item'
                });
                $grid.packery('remove', $('#carte_' + id)).packery('shiftLayout');
            },
            error: function () {  }
        });
        
    });
    
});