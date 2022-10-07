<?php
	session_start();
	header('Content-Type: application/json');

	$userEmail = $_POST['email'] ?? '';
	$userPassword = $_POST['password'] ?? '';
	$authenticated = FALSE;
	
	try 
	{
	    $db = new PDO(
	    'mysql:host=127.0.0.1:3306;dbname=damfridge',
	    'admin',
	    ''
	    );
	   
	} 
	catch (Exception $e) 
	{
	    error_log('Error connecting to database: '.$e->getMessage());
	}

	$rows = $db->query('SELECT * FROM users');

	foreach ($rows as $row)
	{

	    if ($userEmail == $row[3] && $userPassword == $row[2])
	    {
	        $authenticated = TRUE;
	        $db->query('TRUNCATE TABLE currentuser');
	        $db->query("INSERT INTO currentuser(email) VALUES ('$userEmail')");
	        break;
	    }
	}

	if ($authenticated == TRUE) {
		$_SESSION['email'] = $userEmail;
		header("Location: dashboard.php");
	}
	else {
		$errorMessage = "Invalid user email or user password.";
		$msgArray = array('status' => 'error', 'msg'=> $errorMessage);
		echo json_encode($msgArray);
		error_log($errorMessage);
	}
?>