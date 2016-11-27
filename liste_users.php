<h1>Utilisateurs</h1>

<table class="table table-sm">
    
    <tr>
        <th>Identifiant</th>
        <th>Email</th>
        <th>Permissions</th>
        <th>Equipe</th>
        <th>Région</th>
        <th>Score</th>
        <th>Likes</th>
        <th>Supprimer</th>
      </tr>
    
        
    <?php
    while ($donnees = $requete->fetch()) {
    ?>
        
    <tr>
        <td><?php echo htmlspecialchars($donnees['username']); ?></td>
        <td><?php echo htmlspecialchars($donnees['email']); ?></td>
        <td><?php echo $donnees['permissions']; ?></td>
        <td><?php echo $donnees['id_team1']; ?></td>
        <td><?php echo $donnees['id_team2']; ?></td>
        <td><?php echo $donnees['score']; ?></td>
        <td><?php echo $donnees['likes']; ?></td>
        <td><a href="index.php?section=suppression_user&user=<?php echo $donnees['id']; ?>">X</a></td>
    </tr>
    
    <?php
    }
    $requete->closeCursor();
    ?>
        
    
</table> 

<br>


