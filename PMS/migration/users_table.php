<?php
require '../models/subscription.class.php';
class card_details{
    public $connect;
    public function __construct()
    {
        try{

        $sql = "CREATE TABLE `users` (
          `id` int(11) NOT NULL,
          `username` varchar(255) NOT NULL,
          `email` varchar(255) NOT NULL,
          `password` varchar(255) NOT NULL,
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
