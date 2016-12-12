// Contribution ################################################

$(".contribution").click(function() {
    
    var id_button = $(this).attr("id");                 // récupère un id de type contribution_00
    var id_split = id_button.split("_");                // coupe la chaîne à "_" ; le chiffre est la seconde valeur de l'array
    var id = id_split[1];                               // récupère le nombre
    
    var contribution = $("#contribution").val();
    $("#contribution").val("");
    
    var url = 'controleur/contribution.php?id_idea=' + id + '&contribution=' + contribution;
    
    $.ajax({
        
        url: url,
        dataType: 'json',
        success: function(json) {
            
            var contributionForme = '<div class="col-lg-3 offset-lg-1"><span class="fa fa-user"></span> ' + json.username + '</div><div class="col-lg-7">' + contribution + '</div>';
            
            $('#container_contributions').append(contributionForme);
            $('#nbcontributions_' + id).html(json.nbContributions);
            $('#modalContribution').modal('hide');
              
        },
        
    });

});


// Portage ################################################

$(".portage").click(function() {
    
    var id_button = $(this).attr("id");                 // récupère un id de type contribution_00
    var id_split = id_button.split("_");                // coupe la chaîne à "_" ; le chiffre est la seconde valeur de l'array
    var id = id_split[1];                               // récupère le nombre
        
    var url = 'controleur/portage.php?id_idea=' + id;
    
    $.ajax({
        
        url: url,
        dataType: 'json',
        success: function(json) {
            
            $('#porteur').html(json.username);
            $('#modalPortage').modal('hide');
            $('#bouton_portage').hide();
              
        },
        
    });

});
