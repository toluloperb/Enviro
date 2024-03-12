<?php

    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "manorrealtor";

    // $host = "localhost";
    // $username = "manojlmu_manorrealtor";
    // $password = "Trodpen2022*";
    // $database = "manojlmu_manorrealtor";

    $con = mysqli_connect($host, $username, $password, $database);

    if(!$con)
	{
		die("Connection failed: ". mysqli_connect_error());
	}
?>