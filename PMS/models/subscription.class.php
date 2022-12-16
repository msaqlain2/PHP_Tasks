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

    public function subscribe($user_id, $card_number, $card_type, $card_holder_name, 
        $card_expiry_date, $token, $subs_plan, $payment_date, $amount_paid, $paid_currency, 
        $payment_status, $subs_expiry_date, $card_subs_status) {
        $query = "INSERT INTO `subscription`(`user_id`,`card_number`, `card_type`, `card_holder_name`, `card_expiry_date`, `token`, `subs_plan`, `payment_date`,
            `amount_paid`, `paid_currency`, `payment_status`,
            `subs_expiry_date`, `card_subs_status`) 
        VALUES (:user_id, :card_number, :card_type, :card_holder_name, :card_expiry_date, :token, 
            :subs_plan, :payment_date,
            :amount_paid, :paid_currency, :payment_status, 
            :subs_expiry_date, :card_subs_status)";
        $stmt = $this->connect->prepare($query);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':card_number', $card_number);
        $stmt->bindParam(':card_type', $card_type);
        $stmt->bindParam(':card_holder_name', $card_holder_name);
        $stmt->bindParam(':card_expiry_date', $card_expiry_date);
        $stmt->bindParam(':token', $token);
        $stmt->bindParam(':subs_plan', $subs_plan);
        $stmt->bindParam(':payment_date', $payment_date);
        $stmt->bindParam(':amount_paid', $amount_paid);
        $stmt->bindParam(':paid_currency', $paid_currency);
        $stmt->bindParam(':payment_status', $payment_status);
        $stmt->bindParam(':subs_expiry_date', $subs_expiry_date);
        $stmt->bindParam(':card_subs_status', $card_subs_status);
        if($stmt->execute()){
            echo json_encode(array('status' => 'success'));
        }
        else{
            echo json_encode(array('status' => 'failed'));
        }
        // return $lastInsertId = $this->connect->lastInsertId();
    }


    public function pure_select($table)
    {
        $q = $this->connect->query("select * from ".$table);
        return $q->fetchAll(PDO::FETCH_BOTH);
    }


    public function getUserCards($id) {
        $query = "SELECT * FROM `subscription` WHERE user_id = :id";
        $stmt = $this->connect->prepare($query);
        $stmt->bindParam(':id', $id);
        if($stmt->execute()) {
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }

    function getUsers($user_id) {
        $query = $this->connect->prepare("SELECT * FROM users WHERE id = :user_id");
        $query->bindParam(':user_id', $user_id);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
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

    function checkUserDataByCard($card_number) {
        $query = "SELECT * FROM `subscription` WHERE card_number = :card_number";
        $stmt = $this->connect->prepare($query);
        $stmt->bindParam(':card_number', $card_number);
        if($stmt->execute()){
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }

    function subsDataByUserId($user_id) {
        $query = "SELECT * FROM `subscription` WHERE user_id = :user_id ORDER BY id DESC LIMIT 1";
        $stmt = $this->connect->prepare($query);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    function reSubscribeUsingPreviousCard($user_id, $card_number, $payment_date, $subs_expiry_date, $token, $subs_plan, $card_subs_status) {
        $query = "UPDATE `subscription` SET token = :token, subs_plan = :subs_plan, 
        payment_date = :payment_date, payment_status = :payment_status, 
        subs_expiry_date = :subs_expiry_date, card_subs_status = :card_subs_status WHERE card_number = :card_number AND user_id = :user_id ORDER BY id DESC LIMIT 1";
        $stmt = $this->connect->prepare($query);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':card_number', $card_number);
        $stmt->bindParam(':payment_date', $payment_date);
        $stmt->bindParam(':subs_expiry_date', $subs_expiry_date);
        $stmt->bindParam(':subs_plan', $subs_plan);
        $stmt->bindParam(':card_subs_status', $card_subs_status);
        $stmt->bindParam(':token', $token);
        $stmt->bindParam(':payment_status', $payment_status);
        $stmt->execute();
        return true;
    }

    function selectDataByUserId($user_id) {
        $query = "SELECT * FROM `subscription` WHERE user_id = :user_id ORDER BY id DESC LIMIT 1";
        $stmt = $this->connect->prepare($query);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->execute();
        $query_res = $stmt->fetch(PDO::FETCH_ASSOC);
        if($stmt->rowCount() == 0){
            echo json_encode(array('status' => 'Data Not Exist!'));
        }
        else if($query_res['payment_date'] >  $query_res['subs_expiry_date']) {
            echo json_encode(array('status' => 'Subscription Expired'));
        }
        else if($stmt->rowCount() > 0) {
            echo json_encode(array('status' => 'Data Already Exist!'));
        }
    }
}
