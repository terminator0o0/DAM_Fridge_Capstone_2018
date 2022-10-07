<?php
	session_start();
	try 
    {
        $db = new PDO(
        'mysql:host=127.0.0.1;dbname=damfridge',
        'admin',
        '');
       
    } 
    catch (Exception $e) 
    {
        echo "Error connecting to database: " .$e->getMessage();
    }

    $db->query("UPDATE currentuser SET email='None'");

	session_destroy();

	header("Location: ../index.html");
?>