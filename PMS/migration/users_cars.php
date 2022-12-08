<?php
require '../models/subscription.class.php';
class card_details{
    public $connect;
    public function __construct()
    {
        try{

        $sql = "CREATE TABLE `users_cards` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `card_number` varchar(255) NOT NULL,
  `card_type` varchar(255) NOT NULL,
  `card_holder_name` varchar(255) NOT NULL,
  `card_expiry_date` varchar(255) NOT NULL,
  `cvv` varchar(255) NOT NULL,
  `card_status` int(11) NOT NULL,
  `created_at` datetime NOT NULL
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
