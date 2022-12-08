<?php
require '../models/subscription.class.php';
class card_details{
    public $connect;
    public function __construct()
    {
        try{

        $sql = "CREATE TABLE `invoices` (
	  `id` int(11) NOT NULL,
	  `user_id` int(11) NOT NULL,
	  `invoice_no` int(255) NOT NULL,
	  `card_number` varchar(255) NOT NULL,
	  `subscription_type` varchar(255) NOT NULL,
	  `subscription_starting_date` date NOT NULL,
	  `subscription_expiry_date` date NOT NULL,
	  `created_at` date NOT NULL
	)";

            $stmt = $this->db->query($sql);
            if($stmt) {
                echo "Table Created Successfully";
            }
        }
        catch(Exception $e) {
            echo $e->getMessage();
        }
        return $this->db;
    }
}

$daily_log = new card_details();

?>
