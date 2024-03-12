<?php 
    include("config/dbcon.php");

    $messages = $_POST["messages"];
    $session_id = $_POST["session_id"];

    $insert = "INSERT INTO cs_chats (messages,session_id) VALUES ('$messages','$session_id')";
    $insert_run = mysqli_query($con, $insert);
?>