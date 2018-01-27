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
              <a href="" class="dropdown-toggle" data-toggle="dropdown">Login
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
			<?php
$sql="SELECT * FROM etudiant WHERE id=".$_SESSION['variable'];
		$res=mysqli_query($link,$sql);
		$data=mysqli_fetch_array($res);
		echo 'Bienvenue' ;
		echo $data['nom'].' '.$data['prenoms'].'<br>';




			?>
			<h1 style="text-align: center;">Bienvenue sur le menu des etudiants</h1>
			

    						<?php 
							$n=1;
							$list=" SELECT 
										stage.email,
										image,
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
						   
						<div class="row" style="margin-top: 40px; background-color: #e5e4f9;">
		
								<div class="col-sm-4" >
		  				
						 	<img src="upload/<?php echo $data['image'];  ?>" width="300px" height="250px" alt="">

							</div>
								<div class="col-sm-4" style="padding-top: 50px;">
									<h2><?php echo $data['nom'].' '.$data['prenoms']; ?></h2>
							<section>
								<p><b>Lieu de stage: </b><?php echo $data['denomination']; ?>  </p>
								<p><b>date de debut du stage:</b><?php echo $data['ddebut']; ?></p>
								<p><b>Date de fin de stage:</b><?php echo $data['dfin']; ?></p>
								</section>		 	
							
								</div>
							<div class="col-sm-4" style="padding-top: 200px;">

								<p><b>Nom du maitre de stage:</b><?php echo $data['noms'].' '.$data['prenom']; ?> </p>
						</div>
				
					</div>


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