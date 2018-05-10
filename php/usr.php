<?php
    /**
     * Created by PhpStorm.
     * User: jose
     * Date: 9/05/18
     * Time: 08:34 PM
     */
    include_once "conexion.php";
    $usr=$_GET['usr'];
    $cons = "SELECT nombre_alumno FROM alumno WHERE no_control='$usr'";
    $gsent = $con->prepare($cons);
    $gsent->execute();
    $result = $gsent->fetch(PDO::FETCH_ASSOC);
    $res = array_values($result)[0];
    echo json_encode(['name'=>$res]);