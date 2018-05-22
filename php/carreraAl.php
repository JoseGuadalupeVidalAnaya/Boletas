<?php
    /**
     * Created by PhpStorm.
     * User: jose
     * Date: 10/05/18
     * Time: 02:28 PM
     */
    include_once "conexion.php";
    function carrera($car)
    {
        return ['carrera' => $car];
    }

    $usr = $_GET['usr'];

    $cons = "SELECT id_carrera FROM alumno WHERE no_control='$usr'";

    $gsent = $con->prepare($cons);
    $gsent->execute();

    $resultado = $gsent->fetchAll(PDO::FETCH_FUNC, "carrera");
    echo json_encode($resultado);