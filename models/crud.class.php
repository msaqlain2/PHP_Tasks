<?php

class crud{


	private $connect;

	public function __construct() {
		require_once 'database.class.php';
		$db_config = new database();
		$this->connect = $db_config->connect();
	}
	
	public function createNewAccount($full_name, $email, $password) {
		try{
			$query = "INSERT INTO `users`(`full_name`, `email`, `password`) 
			VALUES (:full_name,  :email, :password)";
			$stmt = $this->connect->prepare($query);
			$stmt->bindParam(':full_name', $full_name);
			$stmt->bindParam(':email', $email);
			$stmt->bindParam(':password', $password);
			// echo $stmt->queryString;
			// echo $stmt->debugDumpParams();
			$stmt->execute();
			return true;
		}
		catch(PDOException $e) {
			echo $e->getMessage();
		}
	}

	public function showAllData() {
		$query = "SELECT * FROM `users`";
		$stmt = $this->connect->prepare($query);
		$stmt->execute();
		$user_data = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $user_data;

	}

	public function UpdateUserData($user_id, $full_name, $email, $password) {
		$query = "UPDATE `users` SET full_name = :full_name , 
		email = :user_email, password = :user_password WHERE id = :user_id";
		$stmt = $this->connect->prepare($query);
		$stmt->bindParam(':user_id', $user_id);
		$stmt->bindParam(':full_name', $full_name);
		$stmt->bindParam(':user_email', $user_email);
		$stmt->bindParam(':user_password', $user_password);
		$stmt->execute();
		return true;

	}

	public function selectSpecificData($user_id) {
		$query = "SELECT * FROM `users` WHERE id = :user_id";
		$stmt = $this->connect->prepare($query);
		$stmt->bindParam(':user_id', $user_id);
		$stmt->execute();
		$user_data = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $user_data;

	}

	public function deleteData($user_id) {
		$query = "DELETE FROM `users` WHERE id = :user_id";
		$stmt = $this->connect->prepare($query);
		$stmt->bindParam(':user_id', $user_id);
		$stmt->execute();
		return true;
	}

}
