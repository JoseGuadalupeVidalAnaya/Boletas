<?php
    /**
     * Created by PhpStorm.
     * User: jose
     * Date: 7/05/18
     * Time: 06:03 PM
     */
    header('Content-type: application/json');
    header("Access-Control-Allow-Origin: *");
    try
    {
        $con = new PDO('mysql:host=localhost;dbname=boletas', 'root', 'pass');
        $usr=getusr();
        echo json_encode($usr);
    }
    catch (PDOException $e)
    {
        print "¡Error!: " . $e->getMessage() . "<br/>";
        die();
    }

    function getusr()
    {
        global $con;
        $control = $_GET['controlA'];
        $pass = $_GET['passA'];
        $cons = "SELECT '1'= (SELECT COUNT(no_control) FROM alumno WHERE no_control='$control' AND pass='$pass') AS result";
        $gsent = $con->prepare($cons);
        $gsent->execute();
        $result = $gsent->fetch(PDO::FETCH_ASSOC);
        $res = array_values($result)[0];
        return ['res' => $res == 0];
    }

