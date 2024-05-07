<?php 
    include("../config/dbcon.php");

    $messages = $_POST["message"];
    $session_id = $_POST["session_id"];
    $sstatus = "New";

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

            if($updateSessionId)
            {
                $to = "admin@manor-realtors.com";
                $subject = "New Chat Alert!";

                $message = "
                    <html>
                        <body>
                            <p>You have a new Message Waiting from $session_id</p>
                            <p>'$messages'</p>
                        </body>
                    </html>
                ";

                // Always set content-type when sending HTML email
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";

                // More headers
                $headers .= 'From: Manor Live Chat <support@manorrealtorsgroup.com>' . "\r\n";
                $headers .= 'Cc: support@manorrealtorsgroup.com' . "\r\n";
                
                mail($to,$subject,$message,$headers);
            }
        }
    }
    else
    {
        $insert = "INSERT INTO user_sessions (session_id,session_status) VALUES ('$session_id', '$session_status')";
        $insert_run = mysqli_query($con, $insert);

        if(mysqli_num_rows($checkSessionIdRun) > 0)
    {
        $insert = "INSERT INTO cs_chats (messages,session_id) VALUES ('$messages','$session_id')";
        $insert_run = mysqli_query($con, $insert);

        if($insert_run)
        {
            $insertSessionId = "UPDATE user_sessions SET session_status = 'New' WHERE session_id = '$session_id'";
            $insertSessionId = mysqli_query($con, $insertSessionId);

            if($insertSessionId)
            {
                $to = "admin@manor-realtors.com";
                $subject = "New Chat Alert!";

                $message = "
                    <html>
                        <body>
                            <p>You have a new Message Waiting from $session_id</p>
                            <p>'$messages'</p>
                        </body>
                    </html>
                ";

                // Always set content-type when sending HTML email
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";

                // More headers
                $headers .= 'From: Manor Live Chat <support@manorrealtorsgroup.com>' . "\r\n";
                $headers .= 'Cc: support@manorrealtorsgroup.com' . "\r\n";
                
                mail($to,$subject,$message,$headers);
            }
        }
    }
    }
?>