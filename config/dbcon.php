<?php

    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "manorrealtors";

    // $host = "localhost";
    // $username = "alphonzt_manorrealtors";
    // $password = "Trodpen2022*";
    // $database = "alphonzt_manorrealtors";

    $con = mysqli_connect($host, $username, $password, $database);

    if(!$con)
	{
		die("Connection failed: ". mysqli_connect_error());
	}
?>