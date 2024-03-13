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
        }
        else
        {
            $_SESSION["status"] = "There was an error";
            header("Location: ".$_SERVER['HTTP_REFERER']);
            exit();
        }
    }
?>