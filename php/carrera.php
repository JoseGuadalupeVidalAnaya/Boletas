<?php
    /**
     * Created by PhpStorm.
     * User: jose
     * Date: 9/05/18
     * Time: 09:29 PM
     */
    include_once "conexion.php";
    function carrera($id_carrera, $nombre_carrera)
    {
        return ['id' => $id_carrera, 'nombre' => $nombre_carrera];
    }

    $cons = "SELECT id_carrera, nombre_carrera FROM carrera ORDER BY nombre_carrera";

    $gsent = $con->prepare($cons);
    $gsent->execute();

    $resultado = $gsent->fetchAll(PDO::FETCH_FUNC, "carrera");
    echo json_encode($resultado);