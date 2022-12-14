<?php 

	class MarketIndex {
		// DB stuff
		private $conn;
		private $table = 'market_indexes';

		// MarketIndex Properties
		public $name;
		public $symbol;
		public $lastUpdated;
		public $country;
		public $isActive;
		public $currency;
		public $currencyPlacement;

		// Constructor with DB
		public function __construct($db) {
			$this->conn = $db;
		}

		// Get MarketIndexes
		public function read() {
			// Create query
			$query = 'SELECT * FROM ' . $this->table . ' WHERE is_active = 1';
			
			// Prepare statement
			$stmt = $this->conn->prepare($query);

			// Execute query
			if($stmt->execute()) {
				logMsg("[READ INDEXES]");

				return $stmt;
			} else {
				logMsg("[FAIL READ INDEXES]");

				return false;
			}
		}

		// Update MarketIndex
		public function update($symbol, $lastUpdated) {
			// Create Query
			$query = 'UPDATE ' . $this->table . ' SET last_updated = :last_updated WHERE symbol = :symbol';

			// Prepare Statement
			$stmt = $this->conn->prepare($query);

			// Clean data
			$this->lastUpdated = htmlspecialchars(strip_tags($lastUpdated));
			$this->symbol = htmlspecialchars(strip_tags($symbol));

			// Bind data
			$stmt->bindParam(':last_updated', $this->lastUpdated);
			$stmt->bindParam(':symbol', $this->symbol);

			// Execute query
			if($stmt->execute()) {
				logMsg("[UPDATE INDEX]: " . $this->symbol);

				return true;
			} else {
				logMsg("[FAIL UPDATE INDEX]: " . $this->symbol . " " . $stmt->error);

				return false;
			}

		}
	}

?>