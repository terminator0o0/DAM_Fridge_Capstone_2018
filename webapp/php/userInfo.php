<?php
	session_start();
	header('Content-Type: application/json');

	$userEmail = '';

	if (!isset($_SESSION['email'])) {
		$msgArray = ['status' => 'error', 'msg' => 'You are not an authorized user.'];
		echo json_encode($msgArray);
		die();
	} 
	else {
		$userEmail = $_SESSION['email'];
	}

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

	if ($userEmail) {
		$query = "SELECT Username FROM users WHERE Email = '".$userEmail."'";
		$rows = $db->query($query);

		if ($rows) {
			foreach ($rows as $row){
				$userName = $row[0];
			}

			$msgArray = ['status' => 'success', 
						 'msg' => '',
						 'data' => ['username' => $userName, 'email' => $userEmail]
						 ];
			echo json_encode($msgArray);
		}
	}	


?>