<?php
namespace App\Classes\Customer;

use App\Storage\DB;

//! IT'S CONNECTED FOR SESSION
 require_once '../session.php';



class Deposit{
    public  DB $db;
    public function __construct(){
        $this->db = new DB();
    }
    public function insertDeposit($formData){
        $customer_id = $_SESSION['user_id'];
        $deposit_amount = $formData['deposit_amount'];
        //$currentDateTime = new DateTime('now');
        //$currentDate = $currentDateTime->format('Y-m-d');
        $date = date('Y/m/d H:i:s');

        try {

            if (empty($deposit_amount)) {
                echo '<div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Please Enter Valid Deposit Amount</strong>
                </div>';
            }else{
                $sql = "INSERT INTO customer_deposit (customer_id,deposit_amount,date) VALUES('$customer_id','$deposit_amount','$date')";
                $stmt = $this->db->conn->prepare($sql);
                $stmt->execute();
                echo '<div class="bg-green-100 border border-green-400 text-black-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Deposit Succeeful!</strong>
                </div>';
            }  
        } catch (PDOException $e) {
            echo $e->getMessage();
        }  
    }

}