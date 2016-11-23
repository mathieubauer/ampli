<h1>Utilisateurs</h1>

<table class="table table-condensed table-hover">
    
    <tr class="active">
        <th class="col-md-2">Identifiant</th>
        <th class="col-md-2">Email</th>
        <th class="col-md-1">Permissions</th>
        <th class="col-md-1">Equipe</th>
        <th class="col-md-1">Région</th>
        <th class="col-md-1">Score</th>
        <th class="col-md-1">Likes</th>
        <th class="col-md-1">Supprimer</th>
      </tr>
    
    <tr>
    
    <?php

    while ($donnees = $requete->fetch()) {
        echo 
        '<tr><td>'		
        . htmlspecialchars($donnees['username'])

        . '</td><td>'		
        . htmlspecialchars($donnees['email'])
            
        . '</td><td>'		
        . $donnees['permissions']

        . '</td><td>'		
        . $donnees['id_team1']

        . '</td><td>'		
        . $donnees['id_team2']

        . '</td><td>'		
        . $donnees['score']
            
        . '</td><td>'		
        . $donnees['likes']
            
        . '</td><td><a href="index.php?section=suppression_user&user=' . $donnees['id'] . '">X</a>'		
        . '</td>'

        ;
    }
    
    $requete->closeCursor();
    ?>
    

    </tr>
    </table> 

    <br>


