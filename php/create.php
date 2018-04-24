<?php
    include_once 'conexion.php';


    $nombre = $_POST['nombre'];
    $control = $_POST['control'];
    $pass = $_POST['pass'];
    $pass2 = $_POST['pass2'];

    print ($nombre.$control.$pass.$pass);


    $cons= "SELECT '1'= (SELECT COUNT(no_control) FROM alumno WHERE no_control='2013150480778') AS result";
    $gsent = $con->prepare($cons);
    $gsent->execute();
    $result = $gsent->fetch(PDO::FETCH_ASSOC);

    $res= array_values($result)[0];

    if($res==0)
    {
        print ("agregado");
    }
?>