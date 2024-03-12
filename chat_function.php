<?php 
    include("config/dbcon.php");

    $messages = $_POST["messages"];

    $insert = "INSERT INTO cs_chats (messages) VALUES ('$messages')";
    $insert_run = mysqli_query($con, $insert);

?>