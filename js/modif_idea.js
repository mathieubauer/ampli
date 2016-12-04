$('.card_idea .edit').click(function() {
    
    var id_button = $(this).parent().parent().attr("id");                 // récupère un id de type titre_00
    //var id_split = id_button.split("_");                // coupe la chaîne à "_" ; le chiffre est la seconde valeur de l'array
    //var id = id_split[1];                               // récupère le nombre
    var id = id_button
        
    //var id_idea = $(#).attr('id');
    //var selecteur = '#' + id_idea + ' div div h4';
    //var selecteur = '#' + id_idea + ' h4'
    
    var contenu = $('#titre_' + id).html();
    //var contenuNew = prompt('Modifier le titre (titre actuel : ' + contenu + ')', contenu);
    var contenuNew = prompt('Modification du titre', contenu);
    
    var url = 'controleur/modif_idea.php?titre=' + contenuNew + '&id=' + id;
    
    $.ajax({
        
        url: url,
        success: function(data) {   
            $('#titre_' + id).html(data);
        },
        error: function () {
            alert('La requete na pas abouti');
        }
        
    });
    
        
});


$('.card_idea .suppr').click(function() {
    
    var id_button = $(this).parent().parent().attr("id");
    var id = id_button
    var contenu = $('#titre_' + id).html();
    
    var confirmerSuppression = confirm('Êtes-vous sûr de vouloir supprimer l\'idée : ' + contenu);
    
    if(confirmerSuppression) {
        
        var url = 'controleur/suppression_idea_user.php?id=' + id;
        
        $.ajax({
            url: url,
            success: function() {  },
            error: function () {  }
        });
                
    } 

});