<?php
session_start();
include ('../config/dbcon.php');

if(isset($_POST['login_btn']))
{
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    $login_query = "SELECT * FROM users WHERE rep_email = '$username' AND account_pass = '$password' LIMIT 1";
    $login_query_run = mysqli_query($con, $login_query);

    if(mysqli_num_rows($login_query_run) > 0)
    {
        foreach($login_query_run as $data)
        {
            $user_id = $data['id'];
            $user_fname = $data['business_rep'];
            $business = $data['business_name'];
            $logo = $data['business_logo'];
            $user_email = $data['email'];
        }

        $_SESSION['auth'] = true;
        $_SESSION['auth_user'] = [
            'user_id'=>$user_id,
            'user_name'=>$user_fname,
            'user_email'=>$user_email,
            'business_name'=>$business,
            'business_logo'=>$logo,
        ];

        if($_SESSION['auth'])
        {
            $_SESSION["status"] = "$user_name Welcome to Dashboard";
            header("Location: ../dashboard");
            exit();
        }
    }
    else
    {
        $_SESSION["status"] = "Invalid Login or Password";
        header("Location: ../dashboard/login");
        exit();
    }
}
else
{
    $_SESSION["status"] = "You are not allowed here";
    header("Location: ../dashboard/login");
    exit();
}
