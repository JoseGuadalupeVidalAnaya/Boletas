<?php
    /**
     * Created by PhpStorm.
     * User: jose
     * Date: 10/05/18
     * Time: 11:32 AM
     */
    include_once "conexion.php";
    function carrera($nombre, $clave, $cred, $cal, $op)
    {
        return ["nombre" => $nombre, "clave" => $clave, "creditos" => $cred, "calificacion" => $cal, "opcion" => $op];
    }

    $usr = $_GET['usr'];
    $sem = $_GET['sem'];

    $cons = "SELECT m.nombre_materia, m.clave_materia, m.creditos, b.cal,b.opcion FROM materia m
              INNER JOIN materia_carrera mc ON mc.clave_materia=m.clave_materia
              INNER JOIN alumno a ON a.id_carrera = mc.id_carrera
              INNER JOIN boletas b ON b.clave_materia=m.clave_materia
            WHERE b.no_control='$usr' and mc.semestre='$sem';";

    $gsent = $con->prepare($cons);
    $gsent->execute();

    $resultado = $gsent->fetchAll(PDO::FETCH_FUNC, "carrera");
    echo json_encode($resultado);