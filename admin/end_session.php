<?php
    include("../config/dbcon.php");

    $session_id = $_POST["sessionId"];

    $endSessionId = "UPDATE user_sessions SET session_status = 'Ended' WHERE session_id = '$session_id'";
    $endSessionIdRun = mysqli_query($con, $endSessionId);
?>