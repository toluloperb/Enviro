<?php

    // $host = "localhost";
    // $username = "root";
    // $password = "";
    // $database = "businesspro";

    $host = "localhost";
    $username = "manojlmu_manorrealtor";
    $password = "Trodpen2022*";
    $database = "manojlmu_goepreneur";

    $con = mysqli_connect($host, $username, $password, $database);

    if(!$con)
	{
		die("Connection failed: ". mysqli_connect_error());
	}
?>