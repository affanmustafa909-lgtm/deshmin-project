<?php

$username = "root";
$password = "";
$server = "localhost";
$database = "dash_min";

// connection Query

$conn = mysqli_connect($server, $username, $password, $database);

if ($conn) {
    
    ?>
    <script>
        // alert("connection successful..");
        </script>

        <?php
}

else{
    ?>
    <script>
        alert("No connection..");
        </script>

        <?php
}

?>




