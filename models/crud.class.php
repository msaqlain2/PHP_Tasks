<?php

class crud{


	private $connect;

	public function __construct() {
		require_once 'database.class.php';
		$db_config = new database();
		$this->connect = $db_config->connect();
	}
	
	public function createNewAccount($full_name, $email, $password, $image) {
		try{
			$query = "INSERT INTO `users`(`full_name`, `email`, `password`, `image`) 
			VALUES (:full_name,  :email, :password, :image)";
			$stmt = $this->connect->prepare($query);
			$stmt->bindParam(':full_name', $full_name);
			$stmt->bindParam(':email', $email);
			$stmt->bindParam(':password', $password);
			$stmt->bindParam(':image', $image);
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

	public function UpdateUserData($user_id, $full_name, $email, $password, $image) {
		$query = "UPDATE `users` SET full_name = :full_name , 
		email = :user_email, password = :user_password, image = :image WHERE id = :user_id";
		$stmt = $this->connect->prepare($query);
		$stmt->bindParam(':user_id', $user_id);
		$stmt->bindParam(':full_name', $full_name);
		$stmt->bindParam(':user_email', $email);
		$stmt->bindParam(':user_password', $password);
		$stmt->bindParam(':image', $image);
		$stmt->execute();
		// echo $stmt->queryString;
		// 	echo $stmt->debugDumpParams();
		return true;

	}

	function selectDataById($user_id) {
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
