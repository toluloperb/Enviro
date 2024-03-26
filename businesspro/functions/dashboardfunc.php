<?php
    session_start();
    include("../config/dbcon.php");

    if(isset($_POST["setpass"]))
    {
        $password = $_POST["password"];
        $cpassword = $_POST["cpassword"];
        $rep_email = $_POST["rep_email"];
        
        $update = "UPDATE users SET account_pass = '$password' WHERE rep_email = '$rep_email'";
        $update_run = mysqli_query($con, $update);

        if($update_run)
        {
            header("Location: ../dashboard");
        }
        else
        {
            echo "no";
        }
    }

    else if(isset($_POST["addCustomer"]))
    {
        $business_id = $_POST["business_id"];
        $fullname = $_POST["fullname"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];

        $check_cust = "SELECT * FROM customers WHERE business_id = '$business_id' AND email = '$email'";
        $check_cust_run = mysqli_query($con, $check_cust);

        if(mysqli_num_rows($check_cust_run) > 0)
        {
            $_SESSION["status"] = "Error";
            header("Location: ".$_SERVER['HTTP_REFERER']);
            exit();
        }
        else
        {
            $insert = "INSERT into customers (business_id,fullname,email,phone) VALUES('$business_id','$fullname','$email','$phone')";
            $insert_query = mysqli_query($con, $insert);

            if($insert_query)
            {
                $_SESSION["status"] = "Success";
                header("Location: ".$_SERVER['HTTP_REFERER']);
                exit();
            }
        }
    }

    else if(isset($_POST["sendEmail"]))
    {
        $recepient_email = $_POST["recepient_email"];
        $subjectRun = $_POST["subject"];
        $messageRun = $_POST["message"];
        $sender = $_POST["sender"];
        $business_id = $_POST["business_id"];
        $business_name = $_SESSION['auth_user']['business_name'];
        $business_logo = $_SESSION['auth_user']['business_logo'];
        $type = "single";

        $insert = "INSERT INTO emails (type,business_id,recepient_email, subject, message) VALUES('$type','$business_id','$recepient_email','$subjectRun','$messageRun')";
        $insert_query = mysqli_query($con, $insert);

        if($insert_query)
        {
            $to = "$recepient_email";
            $subject = "$subjectRun";

            $message = "
                <html>
                    <body style=\"background: #e8e8e8; text-align: center; padding: 10%;\">
                        <img style=\"width: 60%;\" src=\"https://manorrealtorsgroup.com/businesspro/assets/images/businesspro%20logo.png\">
                        <p style=\"color: #555;\">$messageRun</p>
                    </body>
                </html>
            ";

            // Always set content-type when sending HTML email
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";

            // More headers
            $headers .= 'From: '. $business_name .' <'. $sender .'@manorrealtorsgroup.com>' . "\r\n";
            $headers .= 'Cc: '. $sender .'@manorrealtorsgroup.com' . "\r\n";

            $mailprocess = mail($to,$subject,$message,$headers);
    
            if($mailprocess)
            {
                $_SESSION["status"] = "Success";
                header("Location: ".$_SERVER['HTTP_REFERER']);
                exit();
            }
            else
            {
                $_SESSION["status"] = "Success0.5";
                header("Location: ".$_SERVER['HTTP_REFERER']);
                exit();
            }
        }
        else
        {
            $_SESSION["status"] = "Error";
            header("Location: ".$_SERVER['HTTP_REFERER']);
            exit();
        }
    }

    else if(isset($_POST["bulkEmail"]))
    {
        $subjectRun = $_POST['subject'];
        $messageRun = $_POST['message'];
        $business_id = $_POST['business_id'];
        $sender = $_POST['sender'];
        $business_name = $_SESSION['auth_user']['business_name'];
        $type = "bulk";
        $business_email = $_SESSION['auth_user']['user_email'];

        // The query that loads all the email address from the DAtabase
        $the_email_query = "SELECT GROUP_CONCAT(email separator ',') as email FROM customers WHERE business_id = '$business_id'";
        $the_email_query_run = mysqli_query($con, $the_email_query);

        if (mysqli_num_rows($the_email_query_run) > 0) {

            while($row = mysqli_fetch_assoc($the_email_query_run)) {

                $recepientsAll = $row["email"];
                // $recepients[] = $row["email"];
                // $recepient_email = implode("; ", $recepients);

                // echo "$recepient_email";

                $insert = "INSERT INTO emails (type,business_id,recepient_email, subject, message) VALUES('$type','$business_id','$recepientsAll','$subjectRun','$messageRun')";
                $insert_query = mysqli_query($con, $insert);

                if($insert_query)
                {    
                    $to = $recepientsAll;
                    $subject = "$subjectRun";

                    $message = "
                        <html>
                            <body>
                                <p>$messageRun</p>
                            </body>
                        </html>
                    ";

                    // Always set content-type when sending HTML email
                    $headers[] = "MIME-Version: 1.0" . "\r\n";
                    $headers[] = "Content-type:text/html;charset=iso-8859-1" . "\r\n";

                    // More headers
                    $headers[] = 'From: '. $business_name .' <'. $sender .'@manorrealtorsgroup.com>' . "\r\n";
                    $headers[] = array(
                        'From' => 'webmaster@example.com',
                        'Reply-To' => 'webmaster@example.com',
                        'X-Mailer' => 'PHP/' . phpversion()
                    );
                    $headers[] = 'Bcc: ' . $to . "\r\n";

                    $mailprocess = mail($to,$subject,$message, implode("\r\n", $headers));
            
                    if($mailprocess)
                    {
                        $_SESSION["status"] = "Success";
                        header("Location: ".$_SERVER['HTTP_REFERER']);
                        exit();
                    }
                    else
                    {
                        $_SESSION["status"] = "Success0.5";
                        header("Location: ".$_SERVER['HTTP_REFERER']);
                        exit();
                    }
                }
                else
                {
                    $_SESSION["status"] = "Error";
                    header("Location: ".$_SERVER['HTTP_REFERER']);
                    exit();
                }
            }
        }
    }
?>