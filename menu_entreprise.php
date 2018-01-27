<?php include('connection.php')
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
              <a href="" class="dropdown-toggle" data-toggle="dropdown">Login
              <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="index.php">Se connecter</a></li>
                
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
			<h1 style="text-align: center;">Bienvenue sur le menu des entreprises</h1>
			<p>Veuillez trouver la liste des entreprises et les periodes de stage</p>
			<table>
				<div class="row"> 
				<div class="col-md-2"></div>
				<div class="col-md-8" style="background-color: #F1FDFE;">
				<table class="table">
					<thead>
						<tr>
							<th>Numero</th>
							<th>Nom et prenoms</th>
							<th>Denomination</th>
							<th>Ddebut</th>
							<th>Dfin</th>
							
							
							
						</tr>
					</thead>
					<tbody>

<?php 
							$n=1;
							$list=" SELECT 
										
								        ddebut,
										dfin,
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
							//die($list); on met un die ensuite on actualise sur la page ensuite on copie et on colle ds la bd partie sql et on execute pour voir l'erreur
	while ($data = mysqli_fetch_array($res))
		{						
							
						 ?>
						<tr>
							<td><?php echo $n; ?> </td>
							
							<td><?php echo $data['nom'].' '.$data['prenoms']; ?></td>
							<td><?php echo $data['denomination']; ?></td>
							<td><?php echo $data['ddebut']; ?></td>
							<td><?php echo $data['dfin']; ?></td>
							
							
							
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