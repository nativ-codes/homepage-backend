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

		// Get Companies
		public function read() {
			// Create query
			$query = 'SELECT * FROM ' . $this->table;
			
			// Prepare statement
			$stmt = $this->conn->prepare($query);

			// Execute query
			$stmt->execute();

			return $stmt;
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
				return $stmt;
			}

			// Print error if something goes wrong
			printf("Error: %s.\n", $stmt->error);

			return false;
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
				return true;
			}

			// Print error if something goes wrong
			printf("Error: %s.\n", $stmt->error);

			return false;
		}

		public function replaceAll($companies) {
			$this->deleteAll();

			foreach ($companies as $company) {
				$companyObject = (object) $company;

				if ($this->create($companyObject) === TRUE) {
					echo "New record created successfully " . $companyObject->symbol . "<br>";
				} else {
					echo "Error: " . $updateSql . "<br>" . $conn->error;
				}
			}
		}

		// // Delete Post
		public function deleteAll() {
			// Create query
			$query = 'DELETE FROM ' . $this->table . ' WHERE market_index = :market_index';

			// Prepare statement
			$stmt = $this->conn->prepare($query);

			// Clean data
			$this->marketIndex = htmlspecialchars(strip_tags($this->marketIndex));

			// Bind data
			$stmt->bindParam(':market_index', $this->marketIndex);

			// Execute query
			if($stmt->execute()) {
				return true;
			}

			// Print error if something goes wrong
			printf("Error: %s.\n", $stmt->error);

			return false;
		}
		
	}

?>