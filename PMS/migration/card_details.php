<?php
require '../models/subscription.class.php';
class card_details{
    public $connect;
    public function __construct()
    {
        try{

        $sql = "CREATE TABLE `card_details` (
          `id` int(11) NOT NULL,
          `card_owner` varchar(255) NOT NULL,
          `card_number` varchar(255) NOT NULL,
          `card_expiry_date` varchar(255) NOT NULL,
          `user_id` int(11) NOT NULL,
          `subscription_plan` varchar(255) NOT NULL,
          `subscription_date` date NOT NULL,
          `subscription_expiry_date` date NOT NULL
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
