<?php
    include("../config/dbcon.php");

    if(isset($_POST["contactForm"]))
    {
        $fname = $_POST["fname"];
        $lname = $_POST["lname"];
        $tel = $_POST["tel"];
        $email = $_POST["email"];
        $service = $_POST["service"];
        $comment = $_POST["comment"];

        $additional_info = str_replace("'", "''", "$comment");

        $insert = "INSERT INTO mail (fname,lname,tel,email,services,additional_info) 
                    VALUES ('$fname','$lname','$tel','$email','$service','$additional_info')";
        $insert_query = mysqli_query($con, $insert);
        
        if($insert_query)
        {
            header("Location: ../success");

            $to = "admin@manor-realtors.com";
            $subject = "New Contact Form Submitted!";

            $message = "
                <html>
                    <body>
                        <p>You have a new Form Submitted from $fname $lname</p>
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
        else
        {
            $_SESSION["status"] = "There was an error";
            header("Location: ".$_SERVER['HTTP_REFERER']);
            exit();
        }
    }
?>