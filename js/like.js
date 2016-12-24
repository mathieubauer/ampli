/*

$('.like').click(function() {
    
    var id_button = $(this).attr("id");                 // récupère un id de type like_00
    var id_split = id_button.split("_");                // coupe la chaîne à "_" ; le chiffre est la seconde valeur de l'array
    var id = id_split[1];                               // récupère le nombre
        
    var contenu_all = $(this).html();
    var contenu_split = contenu_all.split("</span> ");
    var contenu = contenu_split[1];
    
    
    if (contenu == 'J\'aime') {
        var etat = 0;                                   // pas encore liké
    } else {
        var etat = 1;                                   // déjà liké
    }
    
    var url = 'controleur/like.php';
    var dataString = 'id_idea=' + id + '&etat=' + etat;
       
    $.ajax({
        
        //type: "POST",
        url: 'controleur/like.php?id_idea=' + id + '&etat=' + etat,
        
        // type: "POST",
        // url: url,
        // data: dataString,
        // cache: false,
        success: function(data) {
            
            if(etat == 0) {  
                $('#' + id_button).html('<span class="fa fa-heart-o"></span> Je n\'aime plus');
                $('#nblike_' + id).html(data + ' <span class="fa fa-heart"></span>');
            } else {            
                $('#' + id_button).html('<span class="fa fa-heart"></span> J\'aime');
                $('#nblike_' + id).html(data + ' <span class="fa fa-heart"></span>');
            }      
            
        },
        
        error: function () {
            alert('La requete na pas abouti');
        }
        
    });
      
});

*/


// LIKE AVEC DES CLASSES DIFFERENTES ####################

$(document).on('click', '.unliked', function() {
    
    var id_button = $(this).attr("id");                 // récupère un id de type like_00
    var id_split = id_button.split("_");                // coupe la chaîne à "_" ; le chiffre est la seconde valeur de l'array
    var id = id_split[1];                               // récupère le nombre
    
    var etat = 0;
    
    var url = 'controleur/like.php?id_idea=' + id + '&etat=' + etat;
       
    $.ajax({
        
        url: url,
        success: function(data) {
            
            $('#nblikes_' + id).html(data);
            $('#' + id_button).addClass('liked');
            $('#' + id_button).removeClass('unliked');
            $('#' + id_button).html('<span class="fa fa-heart"></span>');
            
        },
        
        error: function () {
            alert('La requete na pas abouti');
        }
        
    });
      
});

$(document).on('click', '.liked', function() {
    
    var id_button = $(this).attr("id");                 // récupère un id de type like_00
    var id_split = id_button.split("_");                // coupe la chaîne à "_" ; le chiffre est la seconde valeur de l'array
    var id = id_split[1];                               // récupère le nombre
    
    var etat = 1;
    
    var url = 'controleur/like.php?id_idea=' + id + '&etat=' + etat;
       
    $.ajax({
        
        url: url,
        success: function(data) {
            
            $('#' + id_button).html('<span class="fa fa-heart-o"></span>');
            $('#nblikes_' + id).html(data);
            $('#' + id_button).removeClass("liked");
            $('#' + id_button).addClass('unliked');
              
        },
        
        error: function () {
            alert('La requete na pas abouti');
        }
        
    });
      
});