<?php

    include("../config/dbcon.php");

    if(isset($_POST["endSession"]))
    {
        $session_id = $_POST["sessionId"];

        $endSessionId = "UPDATE user_sessions SET session_status = 'Ended' WHERE session_id = '$session_id'";
        $endSessionIdRun = mysqli_query($con, $endSessionId);
        
        if($endSessionIdRun)
        {
            $_SESSION["status"] = "Session Ended";
            // header("Location: ".$_SERVER['HTTP_REFERER']);
            header("Location: ../admin/chats.php");
            exit();
        }
    }
?>