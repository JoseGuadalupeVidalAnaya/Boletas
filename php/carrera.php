<?php
	include_once "conexion.php";
	session_start();
	$usr=$_SESSION['control'];	
?>
<!DOCTYPE html>
<html lang="en">
<head>
  	<meta charset="UTF-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="../css/materialize.css">
	<link rel="stylesheet" href="../css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Fira+Mono" rel="stylesheet">
    <title>Seleccion de Carrera</title>
</head>
<body>
    <nav>
      	<div class="nav-wrapper">
        	<a href="#" class="brand-logo">LOGO</a>
        	<a href="#" data-activates="mobile-menu" class="button-collapse"><i class="material-icons">menu</i></a>
        	<ul class="right hide-on-med-and-down">
          		<li><a href="#">item1</a></li>
          		<li><a href="#">item2</a></li>
          		<li><a href="#">item3</a></li>
          		<li><a href="#">item4</a></li>
        	</ul>
        	<ul class="side-nav" id="mobile-menu">
				<li><a href="#">item1</a></li>
				<li><a href="#">item2</a></li>
				<li><a href="#">item3</a></li>
				<li><a href="#">item4</a></li>
        	</ul>
      	</div>
    </nav>
    <div class="row">
        <div class="col s12 m8 l6 offset-l3 offset-m2">
            <div class="card z-depth-5">
                <div class="card-content">
                    <h1 class="brand-logo center" style="font-family: 'Ubuntu', sans-serif;">Seleccion de Carrera</h1>
                </div>

                <div class="card-action">
				<br>
					<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
						<div class="input-field">
							<select id="carrera" name="carrera">
								<option value="" disabled selected>Elige una opción</option>
								<?php
									function carrera($id_carrera, $nombre_carrera) 
									{
										echo "<option value='$id_carrera'>$nombre_carrera</option>";
									}
									$cons="SELECT id_carrera, nombre_carrera FROM carrera ORDER BY nombre_carrera";
							
									$gsent = $con->prepare($cons);
									$gsent->execute();
							
									$resultado = $gsent->fetchAll(PDO::FETCH_FUNC, "carrera");
								?>
							</select>
							<label>¿Cual es tu Carrera?</label>
						</div>
						<br>
						<div class="input-field">
							<button id="aceptar" class="waves-effect waves-light btn-large disabled" 
							type="submit" name="aceptar">Aceptar</button>
						</div>
					</form>
                </div>
            </div>
        </div>
    </div>
    
    <script src="../js/jquery.js"></script>  
    <script type="text/javascript" src="../js/materialize.js"></script> 
    <script>
        $(".button-collapse").sideNav();

		$(document).ready(function() 
		{
    		$('select').material_select();
		});
		
		var $valor = $('#carrera');
		$valor.on("change",function()
		{
			$('#aceptar').removeClass('disabled');
		});
    </script>
	<?php
		if(isset($_POST['aceptar']))
		{
			$valor = $_POST['carrera'];
			$cons="UPDATE alumno SET id_carrera = '$valor' WHERE no_control = $usr";
			$gsent = $con->prepare($cons);
			$gsent->execute();
			header("Location: boletas.php");
			exit;
		}
	?>
</body>
</html>