
<?php
    include('log.php'); // Added missing semicolon at the end of the line

    // Getting all values from the HTML form
    if(isset($_POST['submit']))
    {
      var_dump('fhfdh');
        $name = $_POST['name'];
        $email = $_POST['email'];
        $subject = $_POST['subject'];
        $message = $_POST['message'];

        // Using SQL to create a data entry queryl
        $sql = "INSERT INTO hire(`name`,`email`,`subject`,`message`) VALUES ('$name','$email','$subject','$message')";
      
        // Sending query to the database to add values and confirming if successful
        $rs = mysqli_query($con, $sql);
        if($rs)
        {
            echo "Entries added successfully!";
            // Redirect to a URL after successful submission
            echo '<script>alert("Entries added successfully!"); window.location.href = "index.php";</script>'; // Show pop-up message and redirect to a URL
            exit;
        }
        else
        {
            echo "Error: " . mysqli_error($con);
        }
      
      
        // Closing the database connection
        mysqli_close($con);
    }
?>


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
