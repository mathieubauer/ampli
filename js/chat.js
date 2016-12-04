setInterval(function() {
    $("#container_chat_messages").load("controleur/chat_load.php", function() {});  
}, 1000);

$("#submit").click(function() {
    var message = $("#chat_message").val();
    $("#chat_message").val("");

    $.ajax({
    async: false,
    type: 'GET',                                                            // type de donné envoyé
    url: 'controleur/chat_add.php?message=' + message            // url
    });

});


// Appui avec entrée

$('#chat_message').keyup(function(touche) {
    
    var appui = touche.which || touche.keyCode; // le code est compatible tous navigateurs grâce à ces deux propriétés
    if(appui == 13) {
        
        var message = $("#chat_message").val();
        $("#chat_message").val("");

        $.ajax({
        async: false,
        type: 'GET',                                                            // type de donné envoyé
        url: 'controleur/chat_add.php?message=' + message            // url
        });
        
    };
    
});