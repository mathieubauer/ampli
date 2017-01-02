    <div id="wrapper" class="toggled">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand"><a href="#">Gestion</a></li>
                <li><a href="index.php?section=admin_users">Gestion utilisateurs</a></li>
                <li><a href="index.php?section=admin_ideas">Gestion idées</a></li>
                <li><a href="index.php?section=admin_projects">Gestion projets</a></li>
                <li class="sidebar-brand"><a href="#">Projets</a></li>
                
                <?php
                while ($donnees = $requete->fetch()) {
                ?>
                
                <li><a href="index.php?section=project&project=<?php echo $donnees['id']; ?>"><?php echo $donnees['name']; ?></a></li>
                
                <?php
                }
                $requete->closeCursor();
                ?>
                
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">             <!-- Toute la page devrait être là dedans... modif header ? -->
            <div class="container-fluid">
                
                <!-- 
                <div class="row">
                    <div class="col-md-8 offset-md-2">

                    <h1>Contenu Administrateur</h1>

                        <a class="btn btn-secondary" href="index.php?section=admin_users">Gestion utilisateurs</a>
                        <a class="btn btn-secondary" href="index.php?section=admin_ideas">Gestion idées</a>
                        <a class="btn btn-secondary" href="index.php?section=admin_projects">Gestion projets</a>
                        <a class="btn btn-secondary disabled" href="index.php?section=admin_groupes">Gestion équipes</a>
                        <br>

                        <a class="btn btn-primary" href="index.php?section=project&project=1">Bêta</a>
                        <a class="btn btn-primary" href="index.php?section=project&project=2">Séminaire Interface</a>
                        <a class="btn btn-primary" href="index.php?section=project&project=3">Projet club</a>

                    </div>
                </div>
                -->
                
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->






