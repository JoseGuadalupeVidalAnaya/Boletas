<?php
    include_once "conexion.php";
    session_start();
    $usr = $_SESSION['control'];
    $cons = "SELECT '1'= (SELECT COUNT(no_control) FROM alumno WHERE id_carrera IS NULL AND no_control='$usr') AS result";
    $gsent = $con->prepare($cons);
    $gsent->execute();
    $result = $gsent->fetch(PDO::FETCH_ASSOC);
    $res = array_values($result)[0];

    if ($res == 1)
    {
        header("Location: ../pages/carrera.html");
        exit;
    }
    else
    {
        header("Location: ../pages/boletas.html");
        exit;
    }
?>
