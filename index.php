<?php
	include_once "php/conexion.php";	
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<title>Repositorio de Boletas</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">      
	<meta charset="UTF-8">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="css/materialize.min.css">
	<link rel="stylesheet" href="css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Fira+Mono" rel="stylesheet">
</head>
<body>

	<div class="row">
		<div class="col s12 m8 l6 offset-l3 offset-m2">
			<div class="card z-depth-5">
				<div class="card-content">
					<h1 class="brand-logo center" style="font-family: 'Ubuntu', sans-serif;">Boletas</h1>
				</div>
				<div class="card-tabs ">
					<ul class="tabs tabs-fixed-width z-depth-1">
						<li class="tab"><a class="active" href="#acceder">Iniciar Sesión</a></li>
						<li class="tab"><a href="#registro">Crear Usuario</a></li>
					</ul>
				</div>
				<div class="card-content">
					<div id="acceder">
						<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
							<div class="input-field">
								<i class="material-icons prefix">keyboard</i>
								<input id="controlA" type="number" data-length="13" 
								required="required" name="controlA"
								<?php 
									if(isset($_POST['controlA']))
									{
										$var=$_POST['controlA'];
										echo "value='$var'";
									}?>>
								<label for="controlA">No. Control</label>
							</div>
							<br>

							<div class="input-field ">
								<i class="material-icons prefix">lock</i>
								<input id="passA" type="password" required="required" 
								name="passA">
								<label for="passA">Contraceña</label>
							</div>
							<br>
							
							<div class="input-field">
								<button id="enviar" 
								class="waves-effect waves-light btn-large disabled" 
								type="submit" name="enviar">Acceder</button>
							</div>
							<br>
						</form>
					</div>
					<div id="registro">
						<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
							<div class="input-field">
								<i class="material-icons prefix">account_circle</i>
								<input id="nombre" type="text" required="required" name="nombre">
								<label for="nombre">Nombre</label>
							</div>
							<br>
							<div class="input-field">
								<i class="material-icons prefix">keyboard</i>
								<input id="control" type="text" data-length="12" required="required" name="control">
								<label for="control">No. Control</label>
							</div>
							<br>

							<div class="input-field ">
								<i class="material-icons prefix">lock</i>
								<input id="pass" type="password" required="required" name="pass">
								<label for="pass">Contraceña</label>
							</div>
							<br>

							<div class="input-field ">
								<i class="material-icons prefix">lock</i>
								<input id="pass2" type="password" required="required" name="pass2">
								<label for="pass2">Repetir Contraceña</label>
							</div>
							<br>
							
							<div class="input-field">
								<button class="waves-effect waves-light btn-large disabled" 
								type="submit" onclick="M.toast({html: 'I am a toast', completeCallback: function(){alert('Your toast was dismissed')}})">Crear</button>
							</div>
							<br>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<script src="js/jquery.js"></script>  
	<script type="text/javascript" src="js/materialize.js"></script> 
	<script src="js/script.js"></script>
	<?php
		if(isset($_POST['enviar']))
		{
			$control = $_POST['controlA'];
			$pass = $_POST['passA'];
			
			$cons= "SELECT '1'= (SELECT COUNT(no_control) FROM alumno WHERE no_control='$control' AND pass='$pass') as result";
    		$gsent = $con->prepare($cons);
    		$gsent->execute();
    		$result = $gsent->fetch(PDO::FETCH_ASSOC);
			$res= array_values($result)[0];

    		if($res==0)
    		{
				echo "<script>";
				echo "$( document ).ready(function()";
				echo "{";
    			echo "	Materialize.toast('El Numero de Control o Contraceña Inocrrectos', 4000)";
				echo "});";
				echo "</script>";
			}
			else
			{
				session_start();
				$_SESSION['control']=$control;
				header("Location: php/crear.php");
				exit;
			}
		}	
	?>
</body>
</html>