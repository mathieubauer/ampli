<h1>Projets</h1>

<table class="table table-sm">
    
    <tr>
        <th>Identifiant</th>
        <th>Nom</th>
        <th>Supprimer</th>
      </tr>
    
        
    <?php
    while ($donnees = $requete->fetch()) {
    ?>
        
    <tr>
        <td><?php echo $donnees['id']; ?></td>
        <td><?php echo $donnees['name']; ?></td>
        <td><a href="#" class="disabled"><span class="fa fa-trash"></span></a></td>
    </tr>
    
    <?php
    }
    $requete->closeCursor();
    ?>
        
    
</table> 

<br>


