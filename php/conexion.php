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
    }
    catch (PDOException $e)
    {
        print "¡Error!: " . $e->getMessage() . "<br/>";
        die();
    }


