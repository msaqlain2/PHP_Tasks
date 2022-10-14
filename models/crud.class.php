<?php

class crud{

	private $user_id;
	private $full_name;
	private $user_email;
	private $user_password;
	public $connect;

	public function __construct() {
		require_once 'database.class.php';
		$db_config = new database();
		$this->connect = $db_config->connect();
	}

	public function setUserId($user_id) {
		$this->user_id = $user_id;
	}
	public function getUserId() {
		return $this->user_id;
	}
	
	public function setFullName($full_name) {
		$this->full_name = $full_name;
	}
	public function getFullName(){
		return $this->full_name;
	}

	
	public function setUserEmail($user_email) {
		$this->user_email = $user_email;
	}
	public function getUserEmail(){
		return $this->user_email;
	}

	public function setUserPassword($user_password) {
		$this->user_password = $user_password;
	}
	public function getUserPassword(){
		return $this->user_password;
	}

	public function createNewAccount() {
		try{
			$query = "INSERT INTO `users`(`full_name`, `email`, `password`) 
			VALUES (:full_name,  :email, :password)";
			$stmt = $this->connect->prepare($query);
			$stmt->bindParam(':full_name', $this->full_name);
			$stmt->bindParam(':email', $this->user_email);
			$stmt->bindParam(':password', $this->user_password);
			// echo $stmt->queryString;
			// echo $stmt->debugDumpParams();
			$stmt->execute();
			return true;
		}
		catch(PDOException $e) {
			echo $e->getMessage();
		}
	}

	public function userLogin() {
		try{
			$query = "SELECT email, password FROM `users` WHERE email = :email 
			AND password = :password";
			$stmt = $this->connect->prepare($query);
			$stmt->bindParam(':email', $this->user_email);
			$stmt->bindParam(':password', $this->user_password);
			if($stmt->execute()) {
				$user_data = $stmt->fetch(PDO::FETCH_ASSOC);
			}
			return $user_data;
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

	public function UpdateUserData() {
		$query = "UPDATE `users` SET full_name = :full_name , 
		email = :user_email, password = :user_password WHERE id = :user_id";
		$stmt = $this->connect->prepare($query);
		$stmt->bindParam(':user_id', $this->user_id);
		$stmt->bindParam(':full_name', $this->full_name);
		$stmt->bindParam(':user_email', $this->user_email);
		$stmt->bindParam(':user_password', $this->user_password);
		$stmt->execute();
		return true;

	}

	public function selectSpecificData() {
		$query = "SELECT * FROM `users` WHERE id = :user_id";
		$stmt = $this->connect->prepare($query);
		$stmt->bindParam(':user_id', $this->user_id);
		$stmt->execute();
		$user_data = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $user_data;

	}

	public function deleteData() {
		$query = "DELETE FROM `users` WHERE id = :user_id";
		$stmt = $this->connect->prepare($query);
		$stmt->bindParam(':user_id', $this->user_id);
		$stmt->execute();
		return true;
	}
}
