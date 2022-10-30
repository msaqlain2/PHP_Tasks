<?php

class task{
	
	private $connect;

	public function __construct() {
		require_once 'database.class.php';
		$db_config = new database();
		$this->connect = $db_config->connect();
	}

	public function getAllPartSideData(){
		$query = "SELECT * FROM `part_side`";
		$stmt = $this->connect->prepare($query);
		$stmt->execute();
		$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $data;
	}

	public function checkPartSideData($part_side) {
		$query = "SELECT * FROM `part_side` WHERE part_side = :part_side";
		$stmt = $this->connect->prepare($query);
		$stmt->bindParam(':part_side', $part_side);
		$stmt->execute();
		$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $data;
	}

	public function getAllVolumeData(){
		$query = "SELECT * FROM `volume`";
		$stmt = $this->connect->prepare($query);
		$stmt->execute();
		$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $data;
	}

	public function checkVolumeData($volume) {
		$query = "SELECT * FROM `volume` WHERE volume = :volume";
		$stmt = $this->connect->prepare($query);
		$stmt->bindParam(':volume', $volume);
		$stmt->execute();
		$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $data;
	}

	public function getAllPartOrCrownData(){
		$query = "SELECT * FROM `partorcrown`";
		$stmt = $this->connect->prepare($query);
		$stmt->execute();
		$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $data;
	}

	public function checkPartorCrownData($partorcrown) {
		$query = "SELECT * FROM `partorcrown` WHERE partorcrown = :partorcrown";
		$stmt = $this->connect->prepare($query);
		$stmt->bindParam(':partorcrown', $partorcrown);
		$stmt->execute();
		$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $data;
	}

	public function getAllMaterialTypeData(){
		$query = "SELECT * FROM `material_type`";
		$stmt = $this->connect->prepare($query);
		$stmt->execute();
		$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $data;
	}

	public function checkMaterialTypeData($material_type) {
		$query = "SELECT * FROM `material_type` WHERE material_type = :material_type";
		$stmt = $this->connect->prepare($query);
		$stmt->bindParam(':material_type', $material_type);
		$stmt->execute();
		$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $data;
	}

	public function addNewPartSide($part_side){
		$query = "INSERT INTO `part_side` (`part_side`) VALUES (:part_side)";
		$stmt = $this->connect->prepare($query);
		$stmt->bindParam(':part_side', $part_side);
		$stmt->execute();
		return true;
	}

	public function addNewVolume($volume){
		$query = "INSERT INTO `volume` (`volume`) VALUES (:volume)";
		$stmt = $this->connect->prepare($query);
		$stmt->bindParam(':volume', $volume);
		$stmt->execute();
		return true;
	}

	public function addNewPartOrCrown($partOrCrown){
		$query = "INSERT INTO `partorcrown` (`partorcrown`) VALUES (:partorcrown)";
		$stmt = $this->connect->prepare($query);
		$stmt->bindParam(':partorcrown', $partOrCrown);
		$stmt->execute();
		return true;
	}

	public function addNewMaterialType($material_type){
		$query = "INSERT INTO `material_type` (`material_type`) VALUES (:material_type)";
		$stmt = $this->connect->prepare($query);
		$stmt->bindParam(':material_type', $material_type);
		$stmt->execute();
		return true;
	}

	public function HairStyleData($part_side, $volume, $partorcrown, $material_type){
		$query = "UPDATE `step1` SET part_side = :part_side, volume = :volume, partorcrown = :partorcrown, material_type = :material_type WHERE id = '1'";
		$stmt = $this->connect->prepare($query);
		$stmt->bindParam(':part_side', $part_side);
		$stmt->bindParam(':volume', $volume);
		$stmt->bindParam(':partorcrown', $partorcrown);
		$stmt->bindParam(':material_type', $material_type);
		$stmt->execute();
		return true;

	}

	public function displayPartSideSelectedData(){
		$query = "SELECT `part_side` FROM `step1`";
		$stmt = $this->connect->prepare($query);
		$stmt->execute();
		$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $data;
	}

	public function displayVolumeSelectedData(){
		$query = "SELECT `volume` FROM `step1`";
		$stmt = $this->connect->prepare($query);
		$stmt->execute();
		$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $data;
	}

	public function displayPartOrCrownSelectedData(){
		$query = "SELECT `partorcrown` FROM `step1`";
		$stmt = $this->connect->prepare($query);
		$stmt->execute();
		$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $data;
	}

	public function displayMaterialTypeSelectedData(){
		$query = "SELECT `partorcrown` FROM `step1`";
		$stmt = $this->connect->prepare($query);
		$stmt->execute();
		$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $data;
	}


}
