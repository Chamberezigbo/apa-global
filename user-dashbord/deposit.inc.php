<?php
session_start();

require('../process/pdo.php');

$db = new DatabaseClass();
//success / failure error
$msg = $success = '';
if (isset($_SESSION['success']) && isset($_SESSION['msg'])) {
     // || checks for boolean values only
     $success = $_SESSION['success'] || false;
     $msg = $_SESSION['msg'];
     //remove the session
     unset($_SESSION['success']);
     unset($_SESSION['msg']);
}
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['pay'])) {
     $paymentMode = $_POST['paymentMode'];
     $amount = $_POST['amount'];
     $result = $db->SelectOne("SELECT * FROM payment_methods WHERE method = :method", ['method' => $paymentMode]);
     if (!($result['addr'] == NULL)) {
          $_SESSION["addr"] = $result['addr'];
          $_SESSION['paymentAmount'] = $amount;
          $_SESSION['paymentMode'] = $paymentMode;
          echo "<script>window.location.href='payment.php';</script>";
          exit();
     } else {
          $_SESSION['success'] = true;
          $_SESSION['msg'] = "Payment failed try with another method";
          //reset post array
          header("Location: ./deposit.php");
          exit();
     }
}
