<?php

namespace App\Controllers;

use App\Models\Database;

class MainController {

	private $database;

	public function __construct() {
		$this->database = new Database();
	}

    public function fetchAllToDos() {
		return $this->database->fetchAllToDos();
    }

    public function persistAToDo($todo) {
		$this->database->persistAToDo($todo);
    }

    public function deleteAToDo($todoId) {
		$this->database->deleteAToDo($todoId);
    }

}

?>