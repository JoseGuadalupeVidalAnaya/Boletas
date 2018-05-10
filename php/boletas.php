<?php
    /**
     * Created by PhpStorm.
     * User: jose
     * Date: 10/05/18
     * Time: 07:57 AM
     */
    include_once "conexion.php";
    function carrera($sem)
    {
        return ['semestre' => $sem];
    }
    $usr=$_GET['usr'];

    $cons = "SELECT mc.semestre FROM materia m
              INNER JOIN materia_carrera mc ON mc.clave_materia=m.clave_materia
              INNER JOIN alumno a ON a.id_carrera = mc.id_carrera
              INNER JOIN boletas b ON b.clave_materia=m.clave_materia
              WHERE b.no_control='$usr'
            GROUP BY mc.semestre";

    $gsent = $con->prepare($cons);
    $gsent->execute();

    $resultado = $gsent->fetchAll(PDO::FETCH_FUNC, "carrera");
    echo json_encode($resultado);