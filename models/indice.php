<?php 

	class Indice {
		// DB stuff
		private $conn;
		private $table = 'indices';

		// Indice Properties
		public $name;
		public $symbol;
		public $lastUpdated;

		// Constructor with DB
		public function __construct($db) {
			$this->conn = $db;
		}

		// Get Indices
		public function read() {
			// Create query
			$query = 'SELECT * FROM ' . $this->table;
			
			// Prepare statement
			$stmt = $this->conn->prepare($query);

			// Execute query
			$stmt->execute();

			return $stmt;
		}

		// Update Indice
		public function update($symbol, $lastUpdated) {
			// Create Query
			$query = 'UPDATE ' . $this->table . ' SET lastUpdated = :lastUpdated WHERE symbol = :symbol';

			// Prepare Statement
			$stmt = $this->conn->prepare($query);

			// Clean data
			$this->lastUpdated = htmlspecialchars(strip_tags($lastUpdated));
			$this->symbol = htmlspecialchars(strip_tags($symbol));

			// Bind data
			$stmt-> bindParam(':lastUpdated', $this->lastUpdated);
			$stmt-> bindParam(':symbol', $this->symbol);

			// Execute query
			if($stmt->execute()) {
				return true;
			}

			// Print error if something goes wrong
			printf("Error: $s.\n", $stmt->error);

			return false;
		}
	}

?>