<?php

namespace App\Models;

class DatabaseManager {

	protected $pdo;

	public function __construct() {
		$this->pdo = $this->dbConnect();
	}

    protected function dbConnect() {
		$db = parse_url($_ENV["DATABASE_URL"]);
		$pdo = new \PDO("pgsql:" . sprintf(
			"host=%s;port=%s;user=%s;password=%s;dbname=%s",
			$db["host"],
			$db["port"],
			$db["user"],
			$db["pass"],
			ltrim($db["path"], "/")
		));
        return $pdo;
	}
	
}
