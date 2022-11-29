<?php
include('../models/subscription.class.php');

class migration {
	 private $connect;
	 public function __construct() {
	 	try{
	 		require_once '../models/database.class.php';
			$db_config = new database();
			$this->connect = $db_config->connect();

				$sql = "

				
		 		CREATE TABLE `users` (
				  `id` int(11) PRIMARY KEY NOT NULL,
				  `username` varchar(255) NOT NULL,
				  `email` varchar(255) NOT NULL,
				  `password` varchar(255) NOT NULL
				);
		 		";	 		

	 		$stmt = $this->connect->query($sql);

            if($stmt) {
                echo "Table Created Successfully";
            }
	 	}
	 	catch(Exception $e) {
	 		echo $e->getMessage();
	 	}
	 	return $this->connect;
	 }
}

$migrations = new migration();