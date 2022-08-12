<?php

	include_once '../config/core.php';
	include_once '../models/company.php';
	include_once '../models/market-index.php';
	include_once './scraper-utils.php';

	$database = new Database();
	$db = $database->connect();

	$company = new Company($db);
	$marketIndex = new MarketIndex($db);

	scrapeBET($company, $marketIndex);
	scrapeDAX($company, $marketIndex);
	scrapeDJIA($company, $marketIndex);

?>
