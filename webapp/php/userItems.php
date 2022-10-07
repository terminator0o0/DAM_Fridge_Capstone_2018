<?php
	session_start();
	#header('Content-Type: application/json');
	
	$columns = array( 
	// datatable column index  => database column name
		0 =>'Item', 
		1 => 'Quantity',
		2=> 'TStamp'
	);

	// storing  request (ie, get/post) global array to a variable  
	$requestData= $_REQUEST;

	$mysqli = new mysqli("127.0.0.1", "admin", "", "damfridge");

	/* check connection */
	if ($mysqli->connect_errno) {
		printf("Connect failed: %s\n", $mysqli->connect_error);
	exit();
	}

	$sql = "SELECT Item, Quantity, TStamp FROM itemlist WHERE Email= '".$_SESSION['email']."'";

	$query=mysqli_query($mysqli, $sql) or die("EFF OFF");
	$totalData = mysqli_num_rows($query);
	$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.

	if( !empty($requestData['search']['value']) ) {
		// if there is a search parameter
		$sql = "SELECT Item, Quantity, TStamp ";
		$sql.=" FROM itemlist";
		$sql.=" WHERE Email LIKE '".$_SESSION['email']."'";
		$sql.=" AND Item LIKE '".$requestData['search']['value']."%' ";    // $requestData['search']['value'] contains search parameter
		$sql.=" OR Quantity LIKE '".$requestData['search']['value']."%' ";
		$sql.=" OR TStamp LIKE '".$requestData['search']['value']."%' ";

		$query=mysqli_query($mysqli, $sql) or die("Failed.");
		$totalFiltered = mysqli_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result without limit in the query 
		$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length']."   "; // $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc , $requestData['start'] contains start row number ,$requestData['length'] contains limit length.
		$query=mysqli_query($mysqli, $sql) or die("Failed1"); // again run query with limit
		
	} else {	
		$sql = "SELECT Item, Quantity, TStamp ";
		$sql.=" FROM itemlist";
		$sql.=" WHERE Email LIKE '".$_SESSION['email']."' ";
		$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
		#echo $sql;
		$query=mysqli_query($mysqli, $sql) or die("Failed2.");
		
	}

	$data = array();

	while( $row=mysqli_fetch_array($query) ) {  // preparing an array
		$nestedData=array(); 
		$nestedData[] = $row["Item"];
		$nestedData[] = $row["Quantity"];
		$nestedData[] = $row["TStamp"];

		$data[] = $nestedData;
	}

	$json_data = array(
			"draw"            => intval( $requestData['draw'] ),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
			"recordsTotal"    => intval( $totalData ),  // total number of records
			"recordsFiltered" => intval( $totalFiltered ), // total number of records after searching, if there is no searching then totalFiltered = totalData
			"data"            => $data   // total data array
			);
	echo json_encode($json_data);  // send data as json format
?>