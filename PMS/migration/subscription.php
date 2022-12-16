<?php
class table{
    public $db;
    public function __construct()
    {
        try{
            $servername = "localhost";
            $username = "root";
            $password = "";
        $this->db = new PDO("mysql:host=$servername;dbname=pms", $username, $password);
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "CREATE TABLE `subscription` (
          `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
          `user_id` int(11) NOT NULL,
          `card_number` varchar(255) NOT NULL,
          `card_type` varchar(255) NOT NULL,
          `card_holder_name` varchar(255) NOT NULL,
          `card_expiry_date` varchar(255) NOT NULL,
          `token` varchar(255) NOT NULL,
          `cvv` int(11) NOT NULL,
          `subs_plan` varchar(255) NOT NULL,
          `payment_date` date NOT NULL,
          `amount_paid` varchar(255) NOT NULL,
          `paid_currency` varchar(255) NOT NULL,
          `payment_status` varchar(255) NOT NULL,
          `subs_expiry_date` date NOT NULL,
          `card_subs_status` varchar(255) NOT NULL
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

$table = new table();

?>
