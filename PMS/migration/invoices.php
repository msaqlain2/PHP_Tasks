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

$table = new table();

?>
