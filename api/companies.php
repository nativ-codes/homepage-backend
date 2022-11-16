<?php 
	// Headers
	header('Access-Control-Allow-Origin: *');
	header('Content-Type: application/json');

	include_once '../config/core.php';
	include_once '../models/company.php';

	// Instantiate DB & connect
	$database = new Database();
	$db = $database->connect();

	// Instantiate company object
	$company = new Company($db);

	// Company query
	$company->marketIndex = isset($_GET['marketIndex']) ? $_GET['marketIndex'] : die();
	$result = $company->readByIndex();

	// Post array
	$posts_arr['data'] = array();

	while($row = $result->fetch(PDO::FETCH_ASSOC)) {
		extract($row);

		$post_item = array(
			'id' => $market_index . '_' . $symbol,
			'name' => $name,
			'symbol' => $symbol,
			'weight' => $weight,
			'marketIndex' => $market_index
		);

		// Push to "data"
		array_push($posts_arr['data'], $post_item);
	}

	// Turn to JSON & output
	echo json_encode($posts_arr);

?>