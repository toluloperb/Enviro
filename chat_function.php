<?php 
    include("config/dbcon.php");

    $messages = $_POST["messages"];
    $session_id = $_POST["session_id"];

    $checkSessionId = "SELECT * FROM user_sessions WHERE session_id = '$session_id'";
    $checkSessionIdRun = mysqli_query($con, $checkSessionId);

    if(mysqli_num_rows($checkSessionIdRun) > 0)
    {
        $insert = "INSERT INTO cs_chats (messages,session_id) VALUES ('$messages','$session_id')";
        $insert_run = mysqli_query($con, $insert);

        if($insert_run)
        {
            $updateSessionId = "UPDATE user_sessions SET session_status = 'New' WHERE session_id = '$session_id'";
            $updateSessionId = mysqli_query($con, $updateSessionId);
        }
    }
?>