<?php 
    session_start();
    include_once "db_setting.php";
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    if(!empty($email) && !empty($password)){
        $query = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
        if(mysqli_num_rows($query) > 0){
            $row = mysqli_fetch_assoc($query);
            $entered_pass = md5($password);
            $enc_pass = $row['password'];

            if($entered_pass === $enc_pass){
                $onlineStatu = "Active now";
                $statusUpdateQuery = mysqli_query($conn, "UPDATE users SET status = '{$onlineStatu}' WHERE unique_id = {$row['unique_id']}");
                if($statusUpdateQuery){
                    $_SESSION['unique_id'] = $row['unique_id'];
                    echo "success";
                }else{
                    echo "Something went wrong.";
                }
            }else{
                echo "Email or Password is Incorrect!";
            }
        }else{
            echo "$email - This email not Exist!";
        }
    }else{
        echo "All input fields are required!";
    }
?>