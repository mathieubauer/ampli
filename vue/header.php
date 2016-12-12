<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        
        <title>L'ampli</title>
        <!-- <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> 
        <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/css/bootstrap.min.css" integrity="sha384-AysaV+vQoT3kOAXZkl02PThvDr8HYKPZhNT5h/CXfBThSRXQ6jW5DO2ekP5ViFdi" crossorigin="anonymous">

--> 
        <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
        
        
        <link rel="stylesheet" type="text/css" href="css/style.css" />
        <!--<link rel="stylesheet" type="text/css" href="stylecard.css"> -->
        
        <link rel="icon" type="image/png" href="img/favicon.png" />
        
        <!-- A remettre quand travail en ligne
        <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" /> 
        -->

        
        <!-- <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet"> --> 


        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        
        <link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css" />
        
        <meta property="og:url"                content="http://ampli.mathieubauer.fr" />
        <meta property="og:type"               content="article" />
        <meta property="og:title"              content="L'ampli" />
        <meta property="og:description"        content="Amplifiez vos idées !" />
        <meta property="og:image"              content="http://ampli.mathieubauer.fr/img/ampli.png" />

        
        
    </head>
    <body>
    <div class="container">    
        
        <header>
            
            <nav class="navbar navbar-light bg-faded navbar-fixed-top">
            <button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"></button>
            <div class="collapse navbar-toggleable-md" id="navbarResponsive">
                <a class="navbar-brand" href="#">
                    <img src="img/favicon_gris.png" width="30" height="30" class="d-inline-block align-top" alt="">
                    L'ampli by D-Sides
                </a>
                <ul class="nav navbar-nav">
                    <li class="nav-item active">
                    <a href="index.php" class="nav-link" href="index.php">Accueil <span class="sr-only">(current)</span></a>
                    </li>
                    
                    <?php if (isset($_SESSION['username'])) { ?>
                    <li class="nav-item">
                    <a class="nav-link" href="#">Bienvenue <?php echo $_SESSION['username']; ?></a>
                    </li>
                    <?php } ?>
                    
                    <?php if (isset($_SESSION['project_name'])) { ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="responsiveNavbarDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['project_name']; ?></a>
                        <div class="dropdown-menu" aria-labelledby="responsiveNavbarDropdown">
                            <a class="dropdown-item" href="index.php?section=project&project=1">Bêta</a>
                            <a class="dropdown-item" href="index.php?section=project&project=2">Séminaire Interface</a>
                        </div>
                    </li> 
                    <?php } ?>
                    
                    <?php if (isset($_SESSION['id'])) { ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="responsiveNavbarDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Mon compte</a>
                        <div class="dropdown-menu" aria-labelledby="responsiveNavbarDropdown">
                            <a class="dropdown-item" href="#">Score : <?php echo $resultat['score']; ?></a>
                            <!-- <a class="dropdown-item" href="#"><?php // echo $resultat['likes']; ?> like(s) à distribuer</a> -->
                            <!-- <a class="dropdown-item" href="#">Equipe : <?php // echo $resultat['id_team1']; ?></a> -->
                            <a class="dropdown-item" href="index.php?section=deconnexion">Se déconnecter</a>
                        </div>
                    </li>
                    <?php } ?>
                </ul>

            </div>
            </nav>
                          
            

        </header>
        
        <section>