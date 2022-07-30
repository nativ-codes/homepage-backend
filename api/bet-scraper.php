<?php

	include_once '../config/database.php';
	include_once '../models/company.php';
	include_once '../models/indice.php';
	include_once './scraper-utils.php';

	$bvbUrl = "https://bvb.ro/FinancialInstruments/Indices/IndicesProfiles.aspx?i=BET";
	$indiceName = "BET";
	$database = new Database();
	$db = $database->connect();

	$company = new Company($db);
	$company->indice = $indiceName;
	
	$indice = new Indice($db);

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_URL, $bvbUrl);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US) AppleWebKit/525.13 (KHTML, like Gecko) Chrome/0.A.B.C Safari/525.13");

	$dom = new DOMDocument();
	@$dom->loadHTML(curl_exec($ch));
	$finder = new DomXPath($dom);
	curl_close($ch);

	$indice->update($indiceName, scrapeBETLastUpdated($finder));
	$company->replaceAll(scrapeBETCompanies($finder, $indiceName));

?>
