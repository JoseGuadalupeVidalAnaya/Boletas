<?php
    include_once "conexion.php";
    $usr = $_GET['control'];
    $cons = "SELECT '1'= (SELECT COUNT(no_control) FROM alumno WHERE id_carrera IS NULL AND no_control='$usr') AS result";
    $gsent = $con->prepare($cons);
    $gsent->execute();
    $result = $gsent->fetch(PDO::FETCH_ASSOC);
    $res = array_values($result)[0];
    echo json_encode($usr);

    if ($res == 0)
    {
        header("Location: ../pages/boletas.html?usr=$usr");
        exit;
    }
    else
    {
        header("Location: ../pages/carrera.html?usr=$usr");
        exit;
    }
?>
