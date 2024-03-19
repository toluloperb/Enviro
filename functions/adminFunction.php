<?php

    include("../config/dbcon.php");

    if(isset($_POST["endSession"]))
    {
        $session_id = $_POST["sessionId"];
        $session_status = "Ended";

        $endSessionId = "UPDATE user_sessions SET session_status = '$session_status' WHERE session_id = '$session_id'";
        $endSessionIdRun = mysqli_query($con, $endSessionId);
        
        if($endSessionIdRun)
        {
            $_SESSION["status"] = "Session Ended";
            header("Location: ../admin/chats.php");
            exit();
        }
    }
?>