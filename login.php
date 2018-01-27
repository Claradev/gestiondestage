<?php 
include('connection.php');
$msg=""; 
if (isset($_POST['btnValider']) ){

								$sql="SELECT * FROM etudiant WHERE 
								email='".mysqli_real_escape_string($link,$_POST['email'])."' AND mdp='".mysqli_real_escape_string($link,($_POST['mdp']))."' LIMIT 0,1";
								//die($sql);
								$req= mysqli_query($link,$sql);
								if (mysqli_num_rows($req)>0) {
									$data= mysqli_fetch_array($req);
									$_SESSION['variable']=$data['id'];
									header('location:menu_etudiant.php');
								}else{
									echo "identifiants incorrects";
								}
						$sql="SELECT * FROM maitre WHERE 
								email='".mysqli_real_escape_string($link,$_POST['email'])."' AND mdp='".mysqli_real_escape_string($link,($_POST['mdp']))."' LIMIT 0,1";
								//die($sql);
								$req= mysqli_query($link,$sql);
								if (mysqli_num_rows($req)>0) {
									$data= mysqli_fetch_array($req);
									$_SESSION['variable']=$data['id'];
									header('location:menu_ms.php');
								}else{
									echo "identifiants incorrects";
								}

						$sql="SELECT * FROM entreprise WHERE 
								email='".mysqli_real_escape_string($link,$_POST['email'])."' AND mdp='".mysqli_real_escape_string($link,($_POST['mdp']))."' LIMIT 0,1";
								//die($sql);
								$req= mysqli_query($link,$sql);
								if (mysqli_num_rows($req)>0) {
									$data= mysqli_fetch_array($req);
									$_SESSION['variable']=$data['id'];
									header('location:menu_entreprise.php');
								}else{
									echo "identifiants incorrects";
								}






						} 


						?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/bootstrap.css" >
	<link rel="stylesheet" href="css/styles.css" >


	<title></title>
</head>
<body>
<div class="container">
	<div class="row">
		<div class="row"><!-- Menu -->

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
            <li><a href="index.php">
              A propos
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
			</div>
		<div class="col-md-4"></div>
        <div class="col-md-4" style="margin-top: 30px;">
        	<form action="" method="POST" role="form">
						
						<div class="form-group">						
							<label for="">Email</label>
							<input name="email" value="" type="email" class="form-control" id="" placeholder="exemple@email.com" required><!--required signifie rendre le champ requis ie obligatoire!-->
						</div>
						<div class="form-group">						
							<label for="">Mot de passe</label>
							<input name="mdp" value="" type="password" class="form-control" id="" placeholder="Entrer le mot de passe" required>
						</div>
						<div style="text-align: center;">
						<button name="btnValider" type="submit" class="btn btn-primary" id="">Valider</button>
						
					    </div>
			</form>

                       
</div>
</div>
		<!-- jQuery -->
		<script src="//code.jquery.com/jquery.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
 		<script src="Hello World"></script>
	</body>
</html>