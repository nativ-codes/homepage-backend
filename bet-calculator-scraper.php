<?php
	function getDOM() {
		$bvbUrl = "https://bvb.ro/FinancialInstruments/Indices/IndicesProfiles.aspx?i=BET";

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_URL, $bvbUrl);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US) AppleWebKit/525.13 (KHTML, like Gecko) Chrome/0.A.B.C Safari/525.13");
		$dom = curl_exec($ch);

		curl_close($ch);

		return $dom;	
	}

	function parseDOM() {
		$dom = new DOMDocument();
		@$dom->loadHTML(getDOM());
		$finder = new DomXPath($dom);

		//BET Index Composition 7/20/2022
		$lastUpdatedQuery = $finder->query("//div[@class='col-xs-12 special-head']/h2/b/text()");
		$lastUpdated = $lastUpdatedQuery->item(0)->nodeValue;
		
		$compositionQuery = $finder->query("//table[@id='gvC']/tbody/tr");

		updateDB($lastUpdated, $compositionQuery);
	}

	function updateDB($updated, $companies) {
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "nativ_codes_cp39";

		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		
		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}

		// Removing old data
		$removeSql = "DELETE FROM bet_calculator";

		if ($conn->query($removeSql) === TRUE) {
			echo "Old records removed successfully <br>";
		} else {
			echo "Error: " . $removeSql . "<br>" . $conn->error;
		}

		// Updating last update
		$lastUpdatedSql = "INSERT INTO bet_calculator_settings(last_updated) VALUES ('".$updated."')";
		
		if ($conn->query($lastUpdatedSql) === TRUE) {
			echo "New record created successfully " . $updated . "<br>";
		} else {
			echo "Error: " . $lastUpdatedSql . "<br>" . $conn->error;
		}

		// Replacing with new data
		for ( $i = 0; $i < sizeof($companies); $i++ ) {
			$symbol = $companies->item($i)->childNodes->item(1)->textContent;
			$company = $companies->item($i)->childNodes->item(2)->textContent;
			$weight = $companies->item($i)->childNodes->item(8)->textContent;

			$updateSql = "INSERT INTO bet_calculator(symbol, company, weight) VALUES ('".$symbol."', '".$company."', '".$weight."')";
			
			if ($conn->query($updateSql) === TRUE) {
				echo "New record created successfully " . $symbol . "<br>";
			} else {
				echo "Error: " . $updateSql . "<br>" . $conn->error;
			}
		}

		$conn->close();
	};

	parseDOM();
?>