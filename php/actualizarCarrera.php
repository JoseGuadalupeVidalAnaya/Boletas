<?php
    /**
     * Created by PhpStorm.
     * User: jose
     * Date: 10/05/18
     * Time: 12:54 AM
     */
    include_once "conexion.php";
    $valor = $_GET['carrera'];
    $usr=$_GET['usr'];
    $cons = "UPDATE alumno SET id_carrera = '$valor' WHERE no_control = $usr";
    $gsent = $con->prepare($cons);
    $gsent->execute();
    $resp = ['res' => $gsent->rowCount()];
    echo json_encode($resp);
