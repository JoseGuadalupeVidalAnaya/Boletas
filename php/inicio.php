<!DOCTYPE html>
<html lang="en">
<head>
  	<meta charset="UTF-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="../css/materialize.css">
	<link rel="stylesheet" href="../css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Fira+Mono" rel="stylesheet">
    <title>Document</title>
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
    
    <script src="../js/jquery.js"></script>  
    <script type="text/javascript" src="../js/materialize.js"></script> 
    <script>
        $(".button-collapse").sideNav();
    </script>
</body>
</html>