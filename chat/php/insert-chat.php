<?php 
    session_start();
    if(isset($_SESSION['unique_id'])){
        include_once "db_setting.php";
        $out_id = $_SESSION['unique_id'];
        $in_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
        $message = mysqli_real_escape_string($conn, $_POST['message']);
        if(!empty($message)){
            $sql = mysqli_query($conn, "INSERT INTO messages (incoming_msg_id, outgoing_msg_id, msg)
                                        VALUES ({$in_id}, {$out_id}, '{$message}')") or die();
        }
    }else{
        header("location: ../login.php");
    }


    
?>