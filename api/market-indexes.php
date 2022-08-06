<?php 
	// Headers
	header('Access-Control-Allow-Origin: *');
	header('Content-Type: application/json');

	include_once '../config/database.php';
	include_once '../models/market-index.php';

	// Instantiate DB & connect
	$database = new Database();
	$db = $database->connect();

	// Instantiate marketIndex object
	$marketIndex = new MarketIndex($db);

	// MarketIndex query
	$result = $marketIndex->read();

	// Post array
	$posts_arr['data'] = array();

	while($row = $result->fetch(PDO::FETCH_ASSOC)) {
		extract($row);

		$post_item = array(
			'name' => $name,
			'symbol' => $symbol,
			'lastUpdated' => $last_updated,
			'country' => $country,
			'isActive' => $is_active,
			'currency' => $currency,
			'currencyPlacement' => $currency_placement
		);

		// Push to "data"
		array_push($posts_arr['data'], $post_item);
	}

	// Turn to JSON & output
	echo json_encode($posts_arr);

?>