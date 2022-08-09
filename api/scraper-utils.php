<?php

	function scrapeBET($company, $marketIndex) {
		$url = "https://bvb.ro/FinancialInstruments/Indices/IndicesProfiles.aspx?i=BET";
		$marketIndexName = "BET-20";

		$finder = scrapeUrl($url);

		$marketIndex->update($marketIndexName, scrapeBETLastUpdated($finder));
		$company->replaceAll($marketIndexName, scrapeBETCompanies($finder, $marketIndexName));	
	}

	function scrapeDAX($company, $marketIndex) {
		$url = "https://en.wikipedia.org/wiki/DAX";
		$marketIndexName = "DAX-40";

		$finder = scrapeUrl($url);

		$marketIndex->update($marketIndexName, scrapeDAXLastUpdated($finder));
		$company->replaceAll($marketIndexName, scrapeDAXCompanies($finder, $marketIndexName));	
	}

	function scrapeDJIA($company, $marketIndex) {
		$url = "https://www.slickcharts.com/dowjones";
		$marketIndexName = "DJIA-30";

		$finder = scrapeUrl($url);

		$marketIndex->update($marketIndexName, scrapeDJIALastUpdated($finder));
		$company->replaceAll($marketIndexName, scrapeDJIACompanies($finder, $marketIndexName));	
	}

	function scrapeUrl($url) {
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US) AppleWebKit/525.13 (KHTML, like Gecko) Chrome/0.A.B.C Safari/525.13");

		$dom = new DOMDocument();
		@$dom->loadHTML(curl_exec($ch));
		$finder = new DomXPath($dom);
		curl_close($ch);

		return $finder;
	}

	function scrapeBETCompanies($finder, $marketIndexName) {
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
				'marketIndex' => $marketIndexName
			));
		}

		return $companies;
	}

	function scrapeBETLastUpdated($finder) {
		$lastUpdatedQuery = $finder->query("//div[@class='col-xs-12 special-head']/h2/b/text()");
		$lastUpdated = str_replace("BET Index Composition ", "", $lastUpdatedQuery->item(0)->nodeValue);

		return $lastUpdated;
	}

	function scrapeDAXCompanies($finder, $marketIndexName) {
		$companiesQuery = $finder->query("//table[@id='constituents']/tbody/tr");
		$companies = array();

		for ( $i = 1; $i < sizeof($companiesQuery)-1; $i++ ) {
			$name = $companiesQuery->item($i)->childNodes->item(3)->textContent;
			$symbol = str_replace(".DE", "", $companiesQuery->item($i)->childNodes->item(7)->textContent);
			$weight = $companiesQuery->item($i)->childNodes->item(9)->textContent;

			array_push($companies, array(
				'name' => $name,
				'symbol' => $symbol,
				'weight' => $weight,
				'marketIndex' => $marketIndexName
			));		
		}

		return $companies;
	}

	function scrapeDAXLastUpdated($finder) {
		$lastUpdatedQuery = $finder->query("//p/small[text()[contains(.,': Weightings as of 20 June 2022')]]/text()");
		$lastUpdated = substr(str_replace(": Weightings as of ", "", $lastUpdatedQuery->item(0)->nodeValue), 2);

		return $lastUpdated;
	}

	function scrapeDJIACompanies($finder, $marketIndexName) {
		$companiesQuery = $finder->query("//table[@class='table table-hover table-borderless table-sm']/tbody/tr");
		$companies = array();

		for ( $i = 0; $i < 30; $i++ ) {
			$name = $companiesQuery->item($i)->childNodes->item(3)->textContent;
			$symbol = $companiesQuery->item($i)->childNodes->item(5)->textContent;
			$weight = $companiesQuery->item($i)->childNodes->item(7)->textContent;

			array_push($companies, array(
				'name' => $name,
				'symbol' => $symbol,
				'weight' => $weight,
				'marketIndex' => $marketIndexName
			));		
		}

		return $companies;
	}

	function scrapeDJIALastUpdated($finder) {
		$lastUpdatedQuery = $finder->query("//div[@class='shadow p-3 mb-4 bg-white rounded']/p[text()[contains(.,'Index weights as of')]]/text()");
		$lastUpdated = substr(str_replace("Index weights as of ", "", $lastUpdatedQuery->item(0)->nodeValue), 0, -2);

		return $lastUpdated;
	}

?>