<?php include('connection.php');
 $msg="";
	if (isset($_POST['btnValider'])){
		
			$sql= "INSERT INTO maitre (email,mdp,noms,prenom,poste,domaine) VALUES
			 ('".mysqli_real_escape_string ($link,$_POST['email'])."',
			 '".mysqli_real_escape_string ($link,$_POST['mdp'])."', 
			 '".mysqli_real_escape_string ($link,$_POST['noms'])."', 
			 '".mysqli_real_escape_string ($link,$_POST['prenom'])."', 
			 '".mysqli_real_escape_string ($link,$_POST['poste'])."', 
			 '".mysqli_real_escape_string ($link,$_POST['domaine'])."')"; 
			if (isset($_GET['id']))
			{
				$sql="UPDATE maitre SET 
				email='".$_POST['email']."', 
				mdp='".$_POST['mdp']."', 
				noms='".$_POST['noms']."', 
				prenom='".$_POST['prenom']."', 
				poste='".$_POST['poste']."', 
				domaine='".$_POST['domaine']."'
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
	$update="SELECT * FROM maitre WHERE id=".$_GET['id'];
	$res=mysqli_query($link, $update);
	$dataU=mysqli_fetch_array($res);
	}
	
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>maitre de stage</title>
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
						<legend>Formulaire maitre de stage</legend>
						<span> <?php echo $msg; ?> </span>
					
						<div class="form-group">
							<label for="">email</label>
							<input name="email" type="email" value="<?php if (isset ($_GET['id'])) echo $dataU['email']; ?>" class="form-control" id="" placeholder="exemple@exemple.com"   required>
						</div>   

						<div class="form-group">
							<label for="">mot de passe</label>
							<input name="mdp" type="password" value="<?php if (isset ($_GET['id'])) echo $dataU['mdp']; ?>"  class="form-control" id="" placeholder="entrer le mot de passe">
						</div>
						<div class="form-group">
							<label for="">nom</label>
							<input name="noms" type="text" value="<?php if (isset ($_GET['id'])) echo $dataU['noms']; ?>"  class="form-control" id="" placeholder="entrer le nom">
						</div>
						<div class="form-group">
							<label for="">prenom(s)</label>
							<input name="prenom" type="text" value="<?php if (isset ($_GET['id'])) echo $dataU['prenom']; ?>"  class="form-control" id="" placeholder="entrer le(s) prenom(s)">
						</div>
						<div class="form-group">
							<label for="">poste</label>
							<input name="poste" type="text" value="<?php if (isset ($_GET['id'])) echo $dataU['poste']; ?>"  class="form-control" id="" placeholder="entrer le poste">
						</div>
						<div class="form-group">
							<label for="">domaine</label>
							<input name="domaine" type="text" value="<?php if (isset ($_GET['id'])) echo $dataU['domaine']; ?>"  class="form-control" id="" placeholder="entrer le domaine d'activités">
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
							<th>Nom</th>
							<th>Prenoms</th>
							<th>Poste</th>
							<th>Domaine</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							$n=1;
							$list=" SELECT * FROM maitre ";

							$res= mysqli_query($link,$list);
	while ($data = mysqli_fetch_array($res))
		{						
							
						 ?>
						<tr>
							<td><?php echo $n; ?> </td>
							<td><?php echo $data['email']; ?></td>
							<td><?php echo $data['noms']; ?></td>
							<td><?php echo $data['prenom']; ?></td>
							<td><?php echo $data['poste']; ?></td>
							<td><?php echo $data['domaine']; ?></td>
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