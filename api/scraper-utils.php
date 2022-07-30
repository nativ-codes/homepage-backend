<?php

	function scrapeBETCompanies($finder, $indiceName) {
		$companiesQuery = $finder->query("//table[@id='gvC']/tbody/tr");
		$companies = array();

		for ( $i = 0; $i < sizeof($companiesQuery); $i++ ) {
			$name = $companiesQuery->item($i)->childNodes->item(2)->textContent;
			$symbol = $companiesQuery->item($i)->childNodes->item(1)->textContent;
			$weight = $companiesQuery->item($i)->childNodes->item(8)->textContent;

			array_push($companies, array(
				'name' => $name,
				'symbol' => $symbol,
				'weight' => $weight,
				'indice' => $indiceName
			));		
		}

		return $companies;
	}

	function scrapeBETLastUpdated($finder) {
		$lastUpdatedQuery = $finder->query("//div[@class='col-xs-12 special-head']/h2/b/text()");
		$lastUpdated = str_replace("BET Index Composition ", "", $lastUpdatedQuery->item(0)->nodeValue);

		return $lastUpdated;
	}

?>