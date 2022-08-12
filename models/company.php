<?php 

	class Company {
		// DB stuff
		private $conn;
		private $table = 'companies';

		// Company Properties
		public $name;
		public $symbol;
		public $weight;
		public $marketIndex;

		// Constructor with DB
		public function __construct($db) {
			$this->conn = $db;
		}

		// Get Companies by MarketIndex
		public function readByIndex() {
			$this->marketIndex = htmlspecialchars(strip_tags($this->marketIndex));

			// Create query
			$query = 'SELECT * FROM ' . $this->table . ' WHERE market_index = :market_index';
		
			// Prepare statement
			$stmt = $this->conn->prepare($query);

			// Bind data
			$stmt->bindParam(':market_index', $this->marketIndex);

			// Execute query
			if($stmt->execute()) {
				logMsg("[READ COMPANIES BY INDEX]: " . $this->marketIndex);

				return $stmt;
			} else {
				logMsg("[FAIL READ COMPANIES BY INDEX]: " . $this->marketIndex . " " . $stmt->error);

				return false;
			}
		}

		// Create Company
		public function create($company) {
			// Create query
			$query = 'INSERT INTO ' . $this->table . ' SET symbol = :symbol, name = :name, weight = :weight, market_index = :market_index';

			// Prepare statement
			$stmt = $this->conn->prepare($query);

			// Clean data
			$this->name = htmlspecialchars(strip_tags($company->name));
			$this->symbol = htmlspecialchars(strip_tags($company->symbol));
			$this->weight = htmlspecialchars(strip_tags($company->weight));
			$this->marketIndex = htmlspecialchars(strip_tags($company->marketIndex));

			// Bind data
			$stmt->bindParam(':name', $this->name);
			$stmt->bindParam(':symbol', $this->symbol);
			$stmt->bindParam(':weight', $this->weight);
			$stmt->bindParam(':market_index', $this->marketIndex);

			// Execute query
			if($stmt->execute()) {
				logMsg("[CREATE COMPANY]: " . $this->symbol);

				return true;
			} else {
				logMsg("[FAIL CREATE COMPANY]: " . $this->symbol . " " . $stmt->error);

				return false;
			}
		}

		public function replaceAll($marketIndexName, $companies) {
			$this->deleteAll($marketIndexName);

			foreach ($companies as $company) {
				$companyObject = (object) $company;

				$this->create($companyObject);
			}
		}

		// Delete Post
		public function deleteAll($marketIndexName) {
			// Create query
			$query = 'DELETE FROM ' . $this->table . ' WHERE market_index = :market_index';

			// Prepare statement
			$stmt = $this->conn->prepare($query);

			// Clean data
			$this->marketIndex = htmlspecialchars(strip_tags($marketIndexName));

			// Bind data
			$stmt->bindParam(':market_index', $this->marketIndex);

			// Execute query
			if($stmt->execute()) {
				logMsg("[DELETE ALL COMPANIES]: " . $this->marketIndex);

				return true;
			} else {
				logMsg("[FAIL DELETE ALL COMPANIES]: " . $this->marketIndex . " " . $stmt->error);

				return false;
			}
		}
	}

?>