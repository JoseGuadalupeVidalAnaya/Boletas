<?php
    try
    {
        $con=new PDO('mysql:host=localhost;dbname=boletas', 'root', 'pass');
    }
    catch (PDOException $e) 
    {
        print "¡Error!: " . $e->getMessage() . "<br/>";
        die();
    }
?>