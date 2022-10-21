<?php

class chart{


	private $connect;

	public function __construct() {
		require_once 'database.class.php';
		$db_config = new database();
		$this->connect = $db_config->connect();
	}
	
	public function addNewUser($email, $password) {
		try{
			$query = "INSERT INTO `users`(`email`, `password`) 
			VALUES (:email, :password)";
			$stmt = $this->connect->prepare($query);
			$stmt->bindParam(':email', $email);
			$stmt->bindParam(':password', $password);
			$stmt->execute();
			return true;
		}
		catch(PDOException $e) {
			echo $e->getMessage();
		}
	}

	public function showAllUsersData() {
		$query = "SELECT * FROM `users`";
		$stmt = $this->connect->prepare($query);
		$stmt->execute();
		$user_data = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $user_data;

	}

	public function UpdateUserData($user_id,  $password) {
		$query = "UPDATE `users` SET  password = :password WHERE id = :user_id";
		$stmt = $this->connect->prepare($query);
		$stmt->bindParam(':user_id', $user_id);
		$stmt->bindParam(':password', $password);
		$stmt->execute();
		// echo $stmt->queryString;
		// 	echo $stmt->debugDumpParams();
		return true;

	}

	public function deleteUserData($user_id) {
		$query = "DELETE FROM `users` WHERE id = :user_id";
		$stmt = $this->connect->prepare($query);
		$stmt->bindParam(':user_id', $user_id);
		$stmt->execute();
		return true;
	}

	public function getUserDataByEmail($email) {
		$query = "
		SELECT * FROM `users`
		WHERE email = :email 
		";
		$statement = $this->connect->prepare($query);
		$statement->bindParam(':email', $email);

		if($statement->execute()) {
			$user_data = $statement->fetch(PDO::FETCH_ASSOC);
		}

		return $user_data;
	}

	public function userLogin($email, $password) {
		$query = "SELECT email, password FROM `users` 
		WHERE email = :email AND password = :password";
		$stmt = $this->connect->prepare($query);
		$stmt->bindParam(':email', $email);
		$stmt->bindParam(':password', $password);
		$stmt->execute();
		$stmt->fetchAll(PDO::FETCH_OBJ);
		if($stmt->rowCount() > 0) {
			return true;
		}
		else{
			return false;
		}
	}

	public function adminLogin($email, $password) {
		$query = "SELECT * FROM `admins`
		WHERE email = :email AND password = :password";
		$stmt = $this->connect->prepare($query);
		$stmt->bindParam(':email', $email);
		$stmt->bindParam(':password', $password);
		$stmt->execute();
		$stmt->fetchAll(PDO::FETCH_OBJ);
		if($stmt->rowCount() > 0) {
			return true;
		}
		else{
			return false;
		}

	}

}
