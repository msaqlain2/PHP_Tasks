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

$table = new table();

?>
