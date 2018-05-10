<?php
    /**
     * Created by PhpStorm.
     * User: jose
     * Date: 9/05/18
     * Time: 03:20 PM
     */
    include_once "conexion.php";
    $nombre = $_GET['nombre'];
    $apellido = $_GET['apellido'];
    $pass = $_GET['pass'];
    $num = $_GET['num'];
    $cons = "INSERT INTO alumno VALUES('$nombre','$apellido','$num','$pass',NULL)";
    $gsent = $con->prepare($cons);
    $gsent->execute();
    $resp = ['res' => $gsent->rowCount()];
    echo json_encode($resp);
