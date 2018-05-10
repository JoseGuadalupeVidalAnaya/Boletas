<?php
    include_once "conexion.php";
    $control = $_GET['controlA'];
    $pass = $_GET['passA'];
    $cons = "SELECT '1'= (SELECT COUNT(no_control) FROM alumno WHERE no_control='$control' AND pass='$pass') AS result";
    $gsent = $con->prepare($cons);
    $gsent->execute();
    $result = $gsent->fetch(PDO::FETCH_ASSOC);
    $res = array_values($result)[0];
    if($res==0)
    {
        header("Location: inicio.php");
    }
    $usr=['res' => $res == 0];
    echo json_encode($usr);