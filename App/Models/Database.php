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
		$affectedLine = $req->execute([$todo]);
		return $affectedLine;
	}
	
    public function deleteAToDo($todoId) {
		$req = $this->pdo->prepare("DELETE FROM todos WHERE id = (?)");
		$affectedLine = $req->execute([$todoId]);
		return $affectedLine;
	}
	
}
