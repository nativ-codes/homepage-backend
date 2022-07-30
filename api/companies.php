<?php 
	// Headers
	header('Access-Control-Allow-Origin: *');
	header('Content-Type: application/json');

	include_once '../config/database.php';
	include_once '../models/company.php';

	// Instantiate DB & connect
	$database = new Database();
	$db = $database->connect();

	// Instantiate company object
	$company = new Company($db);

	// Company query
	$company->indice = isset($_GET['indice']) ? $_GET['indice'] : die();
	$result = $company->readByIndex();
	// echo var_dump($result);
	// Get row count

	// Post array
	$posts_arr['data'] = array();

	while($row = $result->fetch(PDO::FETCH_ASSOC)) {
		extract($row);

		$post_item = array(
			'name' => $name,
			'symbol' => $symbol,
			'weight' => $weight,
			'indice' => $indice
		);

		// Push to "data"
		array_push($posts_arr['data'], $post_item);
	}

	// Turn to JSON & output
	echo json_encode($posts_arr);

?>