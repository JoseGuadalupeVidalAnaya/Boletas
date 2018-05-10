<?php
    /**
     * Created by PhpStorm.
     * User: jose
     * Date: 10/05/18
     * Time: 01:25 PM
     */
    include_once "conexion.php";
    function carrera($car)
    {
        return ['carrera' => $car];
    }

    $car = $_GET['carrera'];

    $cons = "SELECT mc.semestre FROM materia m
              INNER JOIN materia_carrera mc ON mc.clave_materia=m.clave_materia
              WHERE mc.id_carrera='$car'
              GROUP BY mc.semestre;";

    $gsent = $con->prepare($cons);
    $gsent->execute();

    $resultado = $gsent->fetchAll(PDO::FETCH_FUNC, "carrera");
    echo json_encode($resultado);