<h1>Utilisateurs</h1>

<table class="table table-sm table_users">
    
    <tr>
        <th>Identifiant</th>
        <th>Email</th>
        <th>Permissions</th>
        <th>Projet</th>
        <th>Dernière connexion</th>
        <!-- <th>Région</th> -->
        <!-- <th>Score</th> -->
        <!-- <th>Likes</th> -->
        <th>Supprimer</th>
      </tr>
    
        
    <?php
    while ($donnees = $requete->fetch()) {
    ?>
        
    <tr>
        <td><a href="index.php?section=user&user=<?php echo $donnees['username']; ?>"><?php echo htmlspecialchars($donnees['username']); ?></a></td>
        <td><?php echo htmlspecialchars($donnees['email']); ?></td>
        <td><?php echo $donnees['permissions']; ?></td>
        <td><?php echo $donnees['id_project_default']; ?></td>
        <td><?php echo $donnees['date_derniere_connexion']; ?></td>
        <!-- <td><?php echo $donnees['id_team2']; ?></td> -->
        <!-- <td><?php echo $donnees['score']; ?></td> -->
        <!-- <td><?php echo $donnees['likes']; ?></td> -->
        <td><a href="index.php?section=suppression_user&user=<?php echo $donnees['id']; ?>">X</a></td>
    </tr>
    
    <?php
    }
    $requete->closeCursor();
    ?>
        
    
</table> 

<br>


