<?php include('connection.php');
 $msg="";
	if (isset($_POST['btnValider'])){
		/*echo '<pre>';
		print_r ($_FILES['image']);die();*/
		if (move_uploaded_file($_FILES['image']['tmp_name'], 'upload/'.$_FILES['image']['name'])) 
		{
			$sql= "INSERT INTO etudiant (email,mdp,nom,prenoms,classe,diplome,image,motivation) VALUES
			 ('".mysqli_real_escape_string ($link,$_POST['email'])."',
			 '".mysqli_real_escape_string ($link,$_POST['mdp'])."', 
			 '".mysqli_real_escape_string ($link,$_POST['nom'])."', 
			 '".mysqli_real_escape_string ($link,$_POST['prenoms'])."', 
			 '".mysqli_real_escape_string ($link,$_POST['classe'])."', 
			 '".mysqli_real_escape_string ($link,$_POST['diplome'])."', 
             '".$_FILES['image']['name']."', 
			'".mysqli_real_escape_string ($link,$_POST['motivation'])."')";
			if (isset($_GET['id']))
			{
				$sql="UPDATE etudiant SET 
				email='".$_POST['email']."', 
				mdp='".$_POST['mdp']."', 
				nom='".$_POST['nom']."', 
				prenoms='".$_POST['prenoms']."', 
				classe='".$_POST['classe']."', 
				diplome='".$_POST['diplome']."', 
				image='".$_FILES['image']['name']."', 
				motivation='".$_POST['motivation']."' 
				 WHERE id=".$_GET['id']; 
 			} 
			$result=mysqli_query($link ,$sql);
			if ($result) {
				$msg='Insertion reussie';
			}else{
				$msg=mysqli_error($link);
			}
		}
		
}
	if (isset($_GET['id'])){
	$update="SELECT * FROM etudiant WHERE id=".$_GET['id'];
	$res=mysqli_query($link, $update);
	$dataU=mysqli_fetch_array($res);
	}
	
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Etudiant</title>
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
        <a  class="navbar-brand" href="index.php">GESTAGE</a>
      </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="">
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
				<div class="col-md-8" style="background-color: #F1FDFE;margin-top: 30px;">

					<form action="" method="POST" role="form" enctype="multipart/form-data">
						<legend>Formulaire Des Etudiants</legend>
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
							<input name="nom" type="text" value="<?php if (isset ($_GET['id'])) echo $dataU['nom']; ?>"  class="form-control" id="" placeholder="entrer le nom">
						</div>
						<div class="form-group">
							<label for="">prenom(s)</label>
							<input name="prenoms" type="text" value="<?php if (isset ($_GET['id'])) echo $dataU['prenoms']; ?>"  class="form-control" id="" placeholder="entrer le(s) prenom(s)">
						</div>
						<div class="form-group">
							<label for="">niveau d'etudes</label>
							 <select name="classe" id="" class="form-control">
                               <option value="1">licence 1</option>
                               <option value="2">licence 2</option>
                               <option value="3">licence 3</option>
                               <option value="3">master 1</option>
                               <option value="3">master 2</option>
                             </select>
							
						</div>
						<div class="form-group">
							<label for="">diplome precedant</label>
							<select name="diplome" id="" class="form-control">
                               <option value="1">baccalaureat</option>
                               <option value="2">licence 1</option>
                               <option value="3">licence 2</option>
                               <option value="3">bts</option>
                               <option value="3">licence 3</option>
                               <option value="3">master 1</option>
                               </select>
						</div>

						
                            <div class="form-group">
							<label for="">image</label>
							<input name="image" type="file" value="<?php if (isset ($_GET['id'])) echo $dataU['libelle']; ?>"class="form-control" id="" placeholder=" Choisissez une image">
						</div>
						<div class="form-group">
							<label for="">motivation</label>
							<input name="motivation" type="text" value="<?php if (isset ($_GET['id'])) echo $dataU['motivation']; ?>"  class="form-control" id="" placeholder="entrer votre lettre de motivation">
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
							<th>Niveau d'étude</th>
							<th>Diplome</th>
							<th>Image</th>
							<th>Motivation</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							$n=1;
							$list=" SELECT * FROM etudiant ";

							$res= mysqli_query($link,$list);
	while ($data = mysqli_fetch_array($res))
		{						
							
						 ?>
						<tr>
							<td><?php echo $n; ?> </td>
							<td><?php echo $data['email']; ?></td>
							<td><?php echo $data['nom']; ?></td>
							<td><?php echo $data['prenoms']; ?></td>
							<td><?php echo $data['classe']; ?></td>
							<td><?php echo $data['diplome']; ?></td>
							<td><img src="upload/<?php echo $data['image'];  ?>" width="30px" height="30px" alt=""></td>
							<td><?php echo $data['motivation']; ?></td>
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