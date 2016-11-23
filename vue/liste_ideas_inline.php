<h1>Idées</h1>

<table class="table table-sm">
    
    <tr>
        <th>Nom</th>
        <th>Intitulé de l'idée</th>
        <th>Image</th>
        <th>Catégorie</th>
        <th>Likes</th>
        <th>Username</th>
        <th>Supprimer</th>
      </tr>
    
        
    <?php
    while ($donnees = $requete->fetch()) {
    ?>
        
    <tr>
        <td><?php echo htmlspecialchars($donnees['ideaname']); ?></td>
        <td><?php echo $donnees['ideatext']; ?></td>
        <td><img src="<?php echo $donnees['ideaimg']; ?>" width="100%"/></td>
        <td><?php echo $donnees['category']; ?></td>
        <td><?php echo $donnees['likes']; ?></td>
        <td><?php echo $donnees['username']; ?></td>
        <td><a href="index.php?section=suppression_idea&idea=<?php echo $donnees['id']; ?>">X</a></td>
    </tr>
    
    <?php
    }
    $requete->closeCursor();
    ?>
        
    
</table> 

<br>


