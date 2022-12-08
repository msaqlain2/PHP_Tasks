<?php
class subscription{
	private $connect;

	public function __construct() {
		require_once 'database.class.php';
		$db_config = new database();
		$this->connect = $db_config->connect();
	}

	public function insertData($table_name,$column=array()){
        if($column !=null){
            foreach($column as $kay=>$values){
                $col[] = $kay;
                $val[] = $values;
                $bind[] = ':'.$kay;
            };
            $col = implode(' , ', $col);
            $val = implode( "' , '",$val);
            $bind = implode(' , ',$bind);
                $insert = "INSERT INTO $table_name($col) VALUES($bind)";
                $prepare = $this->connect->prepare($insert);
                $ececute = $prepare->execute(
                    $column
                );    
            }
        else{
            echo "Array Null";
        }

    }

    public function subscribe($user_id, $invoice_no, $card_number, $subscription_type, $subscription_starting_date, $subscription_expiry_date, $created_at) {
        $query = "INSERT INTO `invoices`(`user_id`, `invoice_no`, `card_number`, `subscription_type`, `subscription_starting_date`, `subscription_expiry_date`, `created_at`) 
        VALUES (:user_id, :invoice_no, :card_number, :subscription_type, :subscription_starting_date,
            :subscription_expiry_date, :created_at)";
        $stmt = $this->connect->prepare($query);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':invoice_no', $invoice_no);
        $stmt->bindParam(':card_number', $card_number);
        $stmt->bindParam(':subscription_type', $subscription_type);
        $stmt->bindParam(':subscription_starting_date', $subscription_starting_date);
        $stmt->bindParam(':subscription_expiry_date', $subscription_expiry_date);
        $stmt->bindParam(':created_at', $created_at);
        $stmt->execute();
        return true;
    }

    public function pure_select($table)
    {
        $q = $this->connect->query("select * from ".$table);
        return $q->fetchAll(PDO::FETCH_BOTH);
    }


    public function getUserCards($id) {
        $query = "SELECT * FROM `users_cards` WHERE user_id = :id";
        $stmt = $this->connect->prepare($query);
        $stmt->bindParam(':id', $id);
        if($stmt->execute()) {
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }

    function editCards($user_id)
    {   
        $stmt = $this->connect->prepare("SELECT * FROM users_cards WHERE user_id = '$user_id'");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function login($email, $password){
        try{
            $query = $this->connect->prepare("SELECT * FROM `users` WHERE email = :email AND password = :password");
            // print_r($query);
            $query->bindParam(':email', $email);
            $query->bindParam(':password', $password);
            $query->execute();
            $query_res = $query->fetch(PDO::FETCH_ASSOC);
            if ($query->rowCount() == 1) {
                $_SESSION['userId'] = $query_res['id'];
                $_SESSION['userEmail'] = $email;
                echo json_encode(array("status"=>"success"));
            }
            else
            {
                echo json_encode(array("status"=>"failed"));
            }
        }
        catch(Exception $e) {
            echo $e->getMessage();
        }
    }
    function customQuery($sql){
        
        $this->connect->prepare($sql)->execute();
        return $this->connect->lastInsertId();

    }
    function selectDataByUserId($user_id, $invoice_no, $card_number, $subscription_type,
        $subscription_starting_date, $subscription_expiry_date, $created_at) {
        $query = "SELECT * FROM invoices WHERE user_id = :user_id ORDER BY id DESC LIMIT 1";
        $stmt = $this->connect->prepare($query);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->execute();
        $query_res = $stmt->fetch(PDO::FETCH_ASSOC);
        if($stmt->rowCount() == 0){
            echo json_encode(array('status' => 'Data Not Exist!'));
        }
        else if($query_res['subscription_starting_date'] >  $query_res['subscription_expiry_date']) {
            echo json_encode(array('status' => 'Subscription Expired'));
            
        }
        else if($stmt->rowCount() > 0) {
            echo json_encode(array('status' => 'Data Already Exist!'));
        }

        
        
        
        
    }
}
