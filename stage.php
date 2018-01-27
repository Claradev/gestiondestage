<?php include('connection.php');
 $msg="";
	if (isset($_POST['btnValider'])){
		
			$sql= "INSERT INTO stage (email,mdp,note,ddebut,dfin,id_etudiant,id_maitre,id_entreprise) VALUES
			 ('".mysqli_real_escape_string ($link,$_POST['email'])."',
			 '".mysqli_real_escape_string ($link,$_POST['mdp'])."',  
			 '".mysqli_real_escape_string ($link,$_POST['note'])."', 
			 '".mysqli_real_escape_string ($link,$_POST['ddebut'])."', 
			 '".mysqli_real_escape_string ($link,$_POST['dfin'])."', 
			 '".mysqli_real_escape_string ($link,$_POST['etudiant'])."', 
             '".mysqli_real_escape_string ($link,$_POST['maitre'])."',
			 '".mysqli_real_escape_string ($link,$_POST['entreprise'])."')";
			if (isset($_GET['id']))
			{
				$sql="UPDATE stage SET 
				email='".$_POST['email']."', 
				mdp='".$_POST['mdp']."', 
				note='".$_POST['note']."', 
				ddebut='".$_POST['ddebut']."', 
				dfin='".$_POST['dfin']."', 
				id_etudiant='".$_POST['etudiant']."', 
				id_maitre='".$_POST['maitre']."', 
				id_entreprise='".$_POST['entreprise']."' 
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
	$update="SELECT * FROM stage WHERE id=".$_GET['id'];
	$res=mysqli_query($link, $update);
	$dataU=mysqli_fetch_array($res);
	}
	
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Stage</title>
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
				<div class="col-md-8" style="background-color: #F1FDFE;margin-top: 30px;">

					<form action="" method="POST" role="form" enctype="multipart/form-data">
						<legend>Formulaire Stage</legend>
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
							<label for="">note</label>
							<input name="note" type="text" value="<?php if (isset ($_GET['id'])) echo $dataU['note']; ?>"  class="form-control" id="" placeholder="entrer la note">
						</div>
						<div class="form-group">
							<label for="">ddebut</label>
							<input name="ddebut" type="text" value="<?php if (isset ($_GET['id'])) echo $dataU['ddebut']; ?>"  class="form-control" id="" placeholder="entrer la date de debut">
						</div>
						<div class="form-group">
							<label for="">dfin</label>
							<input name="dfin" type="text" value="<?php if (isset ($_GET['id'])) echo $dataU['dfin']; ?>"  class="form-control" id="" placeholder="entrer la date de fin">
						</div>
						<div class="form-group">
							<label for="">etudiant</label>
							<select name="etudiant" class="form-control">
					<?php
					//recupere toutes les categories dans la bd
					$sqletudiant="SELECT * FROM etudiant";
					//execute la requete et on la stock dans $repcategorie
					$repetudiant=mysqli_query($link,$sqletudiant);
					//mysqli_fetch_array = permet de tran sformer le resultat $repcategorie en variable de type tableau $datacat
					// la boucle while nous permet de parcourir le tableau $datacat et de recuperer les valeurs de chaques elements du tableau $datacat
					while ($dataetu=mysqli_fetch_array($repetudiant)) {
						?>
						<option value="<?php echo $dataetu['id'];?>">
						<?php echo ($dataetu['nom'].' '.$dataetu['prenoms']);?>
							
						</option>

						<?php
					}
					?>
								
							</select>
						</div>
						<div class="form-group">
							<label for="">Maitre</label>
							<select name="maitre" class="form-control">
					<?php
					//recupere toutes les categories dans la bd
					$sqlmaitre="SELECT * FROM maitre";
					//execute la requete et on la stock dans $repcategorie
					$repmaitre=mysqli_query($link,$sqlmaitre);
					//mysqli_fetch_array = permet de tran sformer le resultat $repcategorie en variable de type tableau $datacat
					// la boucle while nous permet de parcourir le tableau $datacat et de recuperer les valeurs de chaques elements du tableau $datacat
					while ($datamaitre=mysqli_fetch_array($repmaitre)) {
						?>
						<option value="<?php echo $datamaitre['id'];?>">
						<?php echo $datamaitre['noms'].' '.$datamaitre['prenom'];?>
							
						</option>

						<?php
					}
					?>
								
							</select>
						
						</div>

						<div class="form-group">
							<label for="">Entreprise</label>
							<select name="entreprise" class="form-control">
					<?php
					//recupere toutes les categories dans la bd
					$sqlent="SELECT * FROM entreprise";
					//execute la requete et on la stock dans $repcategorie
					$repent=mysqli_query($link,$sqlent);
					//mysqli_fetch_array = permet de tran sformer le resultat $repcategorie en variable de type tableau $datacat
					// la boucle while nous permet de parcourir le tableau $datacat et de recuperer les valeurs de chaques elements du tableau $datacat
					while ($dataent=mysqli_fetch_array($repent)) {
						?>
						<option value="<?php echo $dataent['id'];?>">
						<?php echo $dataent['denomination'];?>
							
						</option>

						<?php
					}
					?>
								
							</select>
						
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
							<th>Note</th>
							<th>Ddebut</th>
							<th>Dfin</th>
							<th>Etudiant</th>
							<th>Maitre</th>
							<th>Entreprise</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							$n=1;
							$list=" SELECT 
										stage.email,
										note,
								        ddebut,
										dfin,
										noms,
										prenom,
										etudiant.nom,
										etudiant.prenoms,
										denomination,
										stage.id
									FROM stage
									INNER JOIN etudiant
									ON etudiant.id = stage.id_etudiant
									INNER JOIN maitre
									ON maitre.id = stage.id_maitre
									INNER JOIN entreprise
									ON entreprise.id = stage.id_entreprise
									";

							$res= mysqli_query($link,$list);
						//die($list); //on met un die ensuite on actualise sur la page ensuite on copie et on colle ds la bd partie sql et on execute pour voir l'erreur
	while ($data = mysqli_fetch_array($res))
		{						
							
						 ?>
						<tr>
							<td><?php echo $n; ?> </td>
							<td><?php echo $data['email']; ?></td>
							<td><?php echo $data['note']; ?></td>
							<td><?php echo $data['ddebut']; ?></td>
							<td><?php echo $data['dfin']; ?></td>
							<td><?php echo $data['nom'].' '.$data['prenoms']; ?></td>
							<td><?php echo $data['noms'].' '.$data['prenom']; ?></td>
							<td><?php echo $data['denomination']; ?></td>
							
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