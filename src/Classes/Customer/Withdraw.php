<?php


namespace App\Classes\Customer;

use App\Storage\DB;

//! IT'S CONNECTED FOR SESSION
 require_once '../session.php';

class Withdraw{
    //! CONNECTION FOR DB
    public DB $db;
    public function __construct(){
        $this->db = new DB();
    }
    //! CONNECTION FOR DB

    public function insertWithdraw($formData){
        $customer_id = $_SESSION['user_id'];
        $withdraw_amount = $formData['withdraw_amount'];
        $date = date('Y/m/d H:i:s');

        try {

            if (empty($withdraw_amount)) {
                echo '<div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Please Enter Valid Withdraw Amount</strong>
                </div>';
            }else{
                $sql = "INSERT INTO customer_withdraw (customer_id,withdraw_amount,date) VALUES('$customer_id','$withdraw_amount','$date')";
                $stmt = $this->db->conn->prepare($sql);
                $stmt->execute();
                echo '<div class="bg-green-100 border border-green-400 text-black-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Withdraw Succeeful!</strong>
                </div>';
            }  
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}