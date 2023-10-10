<?php


namespace App\Classes\Customer;

use App\Storage\DB;

//! IT'S CONNECTED FOR SESSION
 require_once '../session.php';

class Transfer{
    //! CONNECTION FOR DB
    public DB $db;
    public function __construct(){
        $this->db = new DB();
    }
    //! CONNECTION FOR DB

    public function insertTransfer($formData){
        $customer_id = $_SESSION['user_id'];
        $transfer_name = $formData['transfer_name'];
        $transfer_email = $formData['transfer_email'];
        $transfer_amount = $formData['transfer_amount'];
        $date = date('Y/m/d H:i:s');

        try {

            if (empty($transfer_amount)) {
                echo '<div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Please Enter Valid Withdraw Amount / Name</strong>
                </div>';
            }else{
                $sql = "INSERT INTO customer_transfer(customer_id,transfer_name,transfer_email,transfer_amount,date) VALUES('$customer_id','$transfer_name','$transfer_email','$transfer_amount','$date')";
                $stmt = $this->db->conn->prepare($sql);
                $stmt->execute();
                echo '<div class="bg-green-100 border border-green-400 text-black-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Transfer  Succeeful!</strong>
                </div>';
            }  
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}