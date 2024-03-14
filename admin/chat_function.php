<?php 
    include("../config/dbcon.php");

    $messages = $_POST["messages"];
    $session_id = $_POST["session_id"];
    $email = "Admin";

    $checkSessionId = "SELECT * FROM user_sessions WHERE session_id = '$session_id'";
    $checkSessionIdRun = mysqli_query($con, $checkSessionId);

    if(mysqli_num_rows($checkSessionIdRun) > 0)
    {
        $insert = "INSERT INTO cs_chats (messages,session_id,email) VALUES ('$messages','$session_id','$email')";
        $insert_run = mysqli_query($con, $insert);
    }
?>