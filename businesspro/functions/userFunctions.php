<?php
    include("../config/dbcon.php");

    $email = $_POST["email"];

    $check_data = "SELECT * FROM subscribers WHERE email = '$email'";
    $check_data_run = mysqli_query($con, $check_data);

    if(empty(trim($email)))
    {
        echo "Error";
    }
    else
    {
        if(strpos($email, '@') === FALSE) 
        {
            echo "Error";
        }
        else
        {
            if(mysqli_num_rows($check_data_run) > 0)
            {
                echo "Exist";
            }
            else
            {
                $insert = "INSERT INTO subscribers (email) VALUES ('$email')";
                $insert_query = mysqli_query($con, $insert);

                if($insert_query)
                {
                    echo "Success";
                }
                else
                {
                    echo "Error";
                }
            }
        }
    }
?>