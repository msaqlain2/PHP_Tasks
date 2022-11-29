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
                // if($ececute == true){
                //     echo 'Success';
                // }
        }
        else{
            echo "Array Null";
        }

    }

    public function selectData($table, $where_with_column)
    {
        
        $q = $this->db->query("SELECT * FROM ".$table." WHERE " . $where_with_column);
        return $q->fetch(PDO::FETCH_ASSOC);
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
    function selectDataByUserId($user_id, $card_owner, $card_number, $card_expiry_date,
        $subscription_plan, $subscription_date, $subscription_expiry_date) {
        $query = "SELECT * FROM `card_details` WHERE user_id = :user_id";
        $stmt = $this->connect->prepare($query);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->execute();
        $query_res = $stmt->fetch(PDO::FETCH_ASSOC);
        if(date("Y-m-d") >  $query_res['subscription_expiry_date'] AND $query_res->rowCount() > 0) {
            echo json_encode(array('status' => 'Subscription Expired'));
            $update_query = "UPDATE `card_details` SET card_owner = :card_owner, 
            card_number = :card_number, card_expiry_date = :card_expiry_date, subscription_plan = :subscription_plan, subscription_date = :subscription_date, subscription_expiry_date = :subscription_expiry_date WHERE user_id = :user_id";
            $stmt = $this->connect->prepare($update_query);
            $stmt->bindParam(':user_id', $user_id);
            $stmt->bindParam(':card_owner', $card_owner);
            $stmt->bindParam(':card_number', $card_number);
            $stmt->bindParam(':card_expiry_date', $card_expiry_date);
            $stmt->bindParam(':subscription_plan', $subscription_plan);
            $stmt->bindParam(':subscription_date', $subscription_date);
            $stmt->bindParam(':subscription_expiry_date', $subscription_expiry_date);
            return true;
        }
        else if($stmt->rowCount() > 0) {
            echo json_encode(array('status' => 'Data Already Exist!'));
        }
        else if($stmt->rowCount() == 0){
            echo json_encode(array('status' => 'Data Not Exist!'));
        }
    }
}
