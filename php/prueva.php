<?php
    try
    {
        include_once "conexion.php";
        function carrera($id_carrera, $nombre_carrera)
        {
            echo "<option value='$id_carrera'>$nombre_carrera</option>";
        }

        $cons = "SELECT id_carrera, nombre_carrera FROM carrera";
        $gsent = $con->prepare($cons);
        $gsent->execute();
        $resultado = $gsent->fetchAll(PDO::FETCH_FUNC, "carrera");
    }
    catch (PDOException $e)
    {
        print "¡Error!: " . $e->getMessage() . "<br/>";
        die();
    }
?>
