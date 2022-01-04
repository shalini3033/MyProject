<?php

$servername = 'localhost';
$username = 'root';
$password = '';
$db = 'Banking_db';
$conn = new mysqli($servername, $username, $password, $db);
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

$sender = $_GET['var1'];
$receiver = $_POST['somename2'];
$amount = $_POST['amount'];
// var $sender_bal;
// var $receiver_bal ;

$sql_sender = "SELECT current_balance FROM customer_table where name = '$sender' ";
$result_sender = $conn->query($sql_sender);
if ($result_sender->num_rows > 0) {
    // output data of each row
    while ($rows = $result_sender->fetch_assoc()) {
        $sender_bal = $rows['current_balance'];
    }
}

// echo $sender_bal;ss

$sql_receiver = "SELECT current_balance FROM customer_table where name = '$receiver' ";
$result_receiver = $conn->query($sql_receiver);
if ($result_receiver->num_rows > 0) {
    // output data of each row
    while ($rows = $result_receiver->fetch_assoc()) {
        $receiver_bal = $rows['current_balance'];
    }
}
// echo $receiver_bal;

if ($amount > $sender_bal) { ?>
<script>
    alert('You do Not have enough balance // Transaction Failed ');
    setTimeout("location.href = 'home_new.php';",1500);
    </script>
    <?php } else {
         $receiver_bal = $receiver_bal + $amount;
         $sender_bal = $sender_bal - $amount;
         
        $sql = "INSERT INTO transfer_table (sender ,  receiver,  sender_bal,    receiver_bal  , amount_transfer) VALUES
  ('$sender', '$receiver', '$sender_bal' , '$receiver_bal' , '$amount')";

    if ($conn->query($sql) === true) { ?>
        <script type="text/JavaScript">
        alert('transactional Sucessfull');
      setTimeout("location.href = 'transaction_history.php';",1200);
 </script>
 <?php
 $receiver_bal = $receiver_bal + $amount;
 $sender_bal = $sender_bal - $amount;

 $sql1 = "UPDATE customer_table SET current_balance=' $sender_bal' WHERE name='$sender'";
 if ($conn->query($sql1) === true) {
     // echo 'done1';
 } else {
     // echo 'error \n';
 }
 $sql2 = "UPDATE customer_table SET current_balance=' $receiver_bal ' WHERE name='$receiver'";
 if ($conn->query($sql2) === true) {
     // echo 'done2';
 } else {
     // echo 'error \n';
 }
 }}
?>

