<?php
        // Database details
        $host = "localhost";
        $username = "root";
        $password = "";
        $dbname = "portfolio";

        // Creating a connection
        $con = mysqli_connect($host, $username, $password, $dbname);

        // Checking if the connection is successful
        if (!$con)
        {
            die("Connection failed!" . mysqli_connect_error());
        }

?>
