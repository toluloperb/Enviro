<?php

    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "manorrealtor";

    // $host = "localhost";
    // $username = "alphkizf_alphkizf";
    // $password = "Ipk]dLws-*=q";
    // $database = "alphkizf_powerbase";

    $con = mysqli_connect($host, $username, $password, $database);

    if(!$con)
	{
		die("Connection failed: ". mysqli_connect_error());
	}
?>