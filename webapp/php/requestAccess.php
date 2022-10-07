<?php
	$usernameSubmit = $_POST['username'] ?? '';
	$passwordSubmit = $_POST['password'] ?? '';
	$emailSubmit = $_POST['email'];

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

  	$sql_e = "SELECT * FROM users WHERE Email= '".$emailSubmit."'";
  	$res_e = $db->prepare($sql_e);
  	$res_e->execute();
  	if ($res_e->rowCount() > 0) {
  		echo "Sorry... email is already taken";	
  	}
  	else {
		$query = 'INSERT INTO users (Username, Password, Email)
		  VALUES (:username, :password, :email) ';

		$statement = $db->prepare($query);
			$params = [
			'username' => $usernameSubmit,
			'password' => $passwordSubmit,
			'email' => $emailSubmit
			];
				
		if(!$statement->execute($params)) {
			echo "Error executing statement";
		}
		else {
			header("Location: ../index.html");
		}
	}
?>