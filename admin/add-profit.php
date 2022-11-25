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

$users = $db->SelectAll("SELECT * FROM users");
require('header.php');
