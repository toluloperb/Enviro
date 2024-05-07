<?php
    include("config/dbcon.php");


    $session_id = $_POST["session_id"];
    $newStatus = "New";

    $checkSessionId = "SELECT * FROM user_sessions WHERE session_id = '$session_id'";
    $checkSessionIdRun = mysqli_query($con, $checkSessionId);

    if(mysqli_num_rows($checkSessionIdRun) > 0)
    {
        $updateSessionId = "UPDATE user_sessions SET session_status = '$newStatus' WHERE session_id = '$session_id'";
        $updateSessionId = mysqli_query($con, $updateSessionId);
    }
    else 
    {
        $createSessionId = "INSERT INTO user_sessions (session_id,session_status) VALUES ('$session_id','$newStatus')";
        $createSessionIdRun = mysqli_query($con, $createSessionId);
    }
?>