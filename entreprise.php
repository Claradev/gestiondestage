<?php include('connection.php');
 $msg="";
	if (isset($_POST['btnValider'])){
		
			$sql= "INSERT INTO entreprise (email,mdp,denomination,lieu,secteur,nom,prenoms) VALUES
			 ('".mysqli_real_escape_string ($link,$_POST['email'])."',
			 '".mysqli_real_escape_string ($link,$_POST['mdp'])."', 
			 '".mysqli_real_escape_string ($link,$_POST['denomination'])."', 
			 '".mysqli_real_escape_string ($link,$_POST['lieu'])."', 
			 '".mysqli_real_escape_string ($link,$_POST['secteur'])."', 
			 '".mysqli_real_escape_string ($link,$_POST['nom'])."', 
			 '".mysqli_real_escape_string ($link,$_POST['prenoms'])."')"; 
			if (isset($_GET['id']))
			{
				$sql="UPDATE entreprise SET 
				email='".$_POST['email']."', 
				mdp='".$_POST['mdp']."', 
				denomination='".$_POST['denomination']."', 
				lieu='".$_POST['lieu']."', 
				secteur='".$_POST['secteur']."', 
				nom='".$_POST['nom']."', 
				prenoms='".$_POST['prenoms']."'
		         WHERE id=".$_GET['id']; 
 			} 
			$result=mysqli_query($link ,$sql);
			if ($result) {
				$msg='Insertion reussie';
			}else{
				$msg=mysqli_error($link);
			}
		}
		

	if (isset($_GET['id'])){
	$update="SELECT * FROM entreprise WHERE id=".$_GET['id'];
	$res=mysqli_query($link, $update);
	$dataU=mysqli_fetch_array($res);
	}
	
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Entreprise</title>
	<link rel="stylesheet" href="css/bootstrap.css" >
	<link rel="stylesheet" href="css/styles.css" >
</head>
<body>
<body style="background-color: white;">
		<div class="container-fluid">
     
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
		<div class="container">

			<div class="row">
				<div class="col-md-2"></div>
				<div class="col-md-8" style="background-color: #F1FDFE; margin-top: 30px;">

					<form action="" method="POST" role="form" enctype="multipart/form-data">
						<legend>Formulaire de l'entreprise</legend>
						<span> <?php echo $msg; ?> </span>
					
						<div class="form-group">
							<label for="">Email</label>
							<input name="email" type="email" value="<?php if (isset ($_GET['id'])) echo $dataU['email']; ?>" class="form-control" id="" placeholder="exemple@exemple.com"   required>
						</div>   

						<div class="form-group">
							<label for="">Mot de passe</label>
							<input name="mdp" type="password" value="<?php if (isset ($_GET['id'])) echo $dataU['mdp']; ?>"  class="form-control" id="" placeholder="entrer le mot de passe" required>
						</div>
						<div class="form-group">
							<label for="">Denomination</label>
							<input name="denomination" type="text" value="<?php if (isset ($_GET['id'])) echo $dataU['denomination']; ?>"  class="form-control" id="" placeholder="entrer la denomination">
						<div class="form-group">
							<label for="">Lieu</label>
							<input name="lieu" type="text" value="<?php if (isset ($_GET['id'])) echo $dataU['lieu']; ?>"  class="form-control" id="" placeholder="entrer la situation geographique">
						</div>
						<div class="form-group">
							<label for="">Secteur</label>
							<input name="secteur" type="text" value="<?php if (isset ($_GET['id'])) echo $dataU['secteur']; ?>"  class="form-control" id="" placeholder="entrer le secteur d'activités">
						</div>
						<div class="form-group">
							<label for="">Nom</label>
							<input name="nom" type="text" value="<?php if (isset ($_GET['id'])) echo $dataU['nom']; ?>"  class="form-control" id="" placeholder="entrer le nom ">
						</div>
						<div class="form-group">
							<label for="">Prenom(s)</label>
							<input name="prenoms" type="text" value="<?php if (isset ($_GET['id'])) echo $dataU['prenoms']; ?>"  class="form-control" id="" placeholder="entrer le(s) prenom(s) ">
						</div>
						
						
						</div>
						<div style="text-align: center;">
						<button name="btnValider" type="submit" class="btn btn-primary">Valider</button>
						</div>
					</form>
				</div>
			</div>
<br>
			<div class="row"> 
				<div class="col-md-2"></div>
				<div class="col-md-8" style="background-color: #F1FDFE;">
				<table class="table">
					<thead>
						<tr>
							<th>Numero</th>
							<th>Email</th>
							<th>Denomination</th>
							<th>Lieu</th>
							<th>Secteur</th>
							<th>Nom</th>
							<th>Prenoms</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							$n=1;
							$list=" SELECT * FROM entreprise ";

							$res= mysqli_query($link,$list);
	while ($data = mysqli_fetch_array($res))
		{						
							
						 ?>
						<tr>
							<td><?php echo $n; ?> </td>
							<td><?php echo $data['email']; ?></td>
							<td><?php echo $data['denomination']; ?></td>
							<td><?php echo $data['lieu']; ?></td>
							<td><?php echo $data['secteur']; ?></td>
							<td><?php echo $data['nom']; ?></td>:
							<td><?php echo $data['prenoms']; ?></td>
							<td>
								<a href="?id=<?php echo $data['id']; ?>">Modifier</a>
								<a href="?sup=<?php echo $data['id']; ?>">Supprimer</a>
							</td>
						</tr>
						<?php $n++;
						 } ?>
					</tbody>
				</table>
				</div>
			</div>

		</div>
		

		<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
		<script type="text/javascript" src="js/control.js"></script>
	</body>
</body>
</html>