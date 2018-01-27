<?php
  include('connection.php')
  //Obtenir la date UTC 
  //date_default_timezone_set('UTC');

  //Obtenir la date de Los Angeles USA
  /*date_default_timezone_set('America/Los_Angeles');*/

  ?>

 


<html>
  <head>
    <meta charset="utf-8">
    <title>Index</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,700|Raleway:300,400,500,700|Varela+Round:400" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  </head>

  <body>
      <nav class="navbar navbar-default navbar-fixed-top navbar-transparent" role="navigation">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
          <span class="sr-only">Menu</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.php">GESTAGE</a>
      </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="stage.php">
              Admin
            </a></li>
            <li class="dropdown">
              <a href="" class="dropdown-toggle" data-toggle="dropdown">Login
              <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="login.php">Se connecter</a></li>
                <li><a href="etudiant.php">S'inscrire</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
    <div class="banner" style="background-image: linear-gradient(-225deg, rgba(0,101,168,0.2) 0%, rgba(0,36,61,0.2) 50%),  url('img/img2.jpg');">
      <div class="banner-content">
        <h1 style="color:#FDF2EE
        ">BIENVENUE</h1>
        <marquee>dans le systeme de gestion de stages</marquee>
      </div>
    </div>

    <div class="container">
      <h2 class="text-center"></h2>
      <div class="cards">
        <div class="card">
          <div class="card-body" style="background-image: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.4)), url('img/img6.jpg');">
            <span class="card-category"></span>
            <div class="card-description">
              <h2 style="color: white">Etudiants, inscrivez vous ici</h2>
              
            </div>
            <img class="card-user avatar avatar-large" src="img/jad.png">
            <a class="card-link" href="etudiant.php" ></a>
          </div>
         
        </div>
        <div class="card">
          <div class="card-body" style="background-image: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.4)), url('img/img4.jpg');">
            <span class="card-category"></span>
            <div class="card-description">
             <h2 style="color: white">Entreprises, inscrivez vous ici</h2>
            </div>
            <img class="card-user avatar avatar-large" src="img/gab.png">
            <a class="card-link" href="entreprise.php" ></a>
          </div>
          
        </div>
        <div class="card">
          <div class="card-body" style="background-image: linear-gradient(rgba(0,0,0,0.2), rgba(0,0,0,0.2)), url('img/img5.jpg');">
            <span class="card-category"></span>
            <div class="card-description">
              <h2 style="color: white">Encadreurs, inscrivez vous ici</h2>
              
            </div>
            <img class="card-user avatar avatar-large" src="img/cecile.png">
            <a class="card-link" href="maitre.php" ></a>
          </div>
          
          
        </div>
      </div>
    </div>


  <div id="footer">

    <div class="container">
      <div class="row">
        <div class="col-lg-3">
          <ul class="list-inline social text-center">
            <li><a href=""><i class="fa fa-twitter"></i></a></li>
            <li><a href=""><i class="fa fa-facebook"></i></a></li>
            <li><a href=""><i class="fa fa-instagram"></i></a></li>
            <li><a href=""><i class="fa fa-youtube"></i></a></li>
          </ul>
        </div>

        <div class="col-lg-9">
          <div class="text-center">
            GESTAGE est une application de gestion de stage
          </div>
        </div>
      </div>
    </div>
  </div>






<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>


</body>
</html>
  