<?php

namespace App\Models;

class Database extends DatabaseManager {

	public function __construct() {
		parent::__construct();
	}
	
    public function fetchAllToDos() {
		$req = $this->pdo->prepare("SELECT * FROM todos");
		$req->execute();
		return $req->fetchall();
	}
	
    public function persistAToDo($todo) {
		$req = $this->pdo->prepare("INSERT INTO todos (todo) VALUES (?)");
		$isInserted = $req->execute([$todo]);
		return $isInserted;
	}
	
    public function deleteAToDo($todoId) {
		$req = $this->pdo->prepare("DELETE FROM todos WHERE id = (?)");
		$isDeleted = $req->execute([$todoId]);
		return $isDeleted;
	}
	
}
