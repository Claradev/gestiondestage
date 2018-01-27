<?php include('connection.php');

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>menu etudiant</title>
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
              <a href="" class="dropdown-toggle" data-toggle="dropdown">User
              <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="index.php">Se deconnecter</a></li>
                
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
			
			<h1 style="text-align: center;">Bienvenue sur le menu des maitres de stage</h1>
			<strong>
			<?php

      $sql="SELECT * FROM maitre WHERE id=".$_SESSION['variable'];
		$res=mysqli_query($link,$sql);
		$data=mysqli_fetch_array($res);
		echo 'Bienvenue' .''. '<br>';
		echo $data['noms'].' '.$data['prenom'].'<br>';

			?>   </strong>
			
			<table>
				<div class="row"> 
				<div class="col-md-2"></div>
				<div class="col-md-8" style="background-color: #F1FDFE;">
				<table class="table">
					<thead>
						<tr>
							<th>Nom</th>
							<th>Prenoms</th>
							<th>Poste</th>
							<th>Domaine</th>
							<th></th>
							
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






