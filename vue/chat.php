<div id="body">

    <h1>Prototype de chat en Ajax avec PHP et jQuery</h1>
    
    <div class="row">
    
    <div id="chat_aff" class="col-md-6">
        <!-- Contiendra les messages -->
    </div>
    
    <div class="col-md-6">
    <div class="card">
    <div class="card-block">
        
        <div class="row">
            <div class="col-md-8">  
                <div class="input-group">
                <span class="input-group-addon">?</span>
                <input type="text" name="message" id="message" class="form-control" placeholder="Votre message" />
                </div>
            </div>
            
            <div class="col-md-4">
                <button id="submit" class="btn btn-primary center-block">Envoyer</button>
            </div>            
        </div>

    </div>
    </div>
    </div>
    </div>
    
</div>



<script src="bootstrap/js/jquery.min.js"></script>

<script>

    setInterval(function() {
        $("#chat_aff").load("controleur/chat_load.php", function() {});  
    }, 1000);
    
    $("#submit").click(function() {
        var message = $("#message").val();
        $("#message").val("");
                        
        $.ajax({
        async: false,
        type: 'GET',                                                            // type de donné envoyé
        url: 'controleur/chat_add.php?message=' + message            // url
        });
        
    });
    
    
</script>