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

				
		 		CREATE TABLE `card_details` (
				  `id` int(11) NOT NULL PRIMARY KEY,
				  `card_owner` varchar(255) NOT NULL,
				  `card_number` varchar(255) NOT NULL,
				  `card_expiry_date` varchar(255) NOT NULL,
				  `user_id` int(11) NOT NULL, FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
				  `subscription_plan` varchar(255) NOT NULL,
				  `subscription_date` date NOT NULL,
				  `subscription_expiry_date` date NOT NULL
				)
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