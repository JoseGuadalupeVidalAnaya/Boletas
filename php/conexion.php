<?php
    try
    {
        $con=new PDO('mysql:host=localhost;dbname=boletas', 'root', '');
    }
    catch (PDOException $e) 
    {
        print "¡Error!: " . $e->getMessage() . "<br/>";
        die();
    }
?>