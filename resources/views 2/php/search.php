<?php
// require('db.php');

global $connection;

$fromLocation = mysqli_real_escape_string($connection, $_POST['from-location']);
$toLocation = mysqli_real_escape_string($connection, $_POST['to-location']);

// Connect to API

// Get Route information

// Return 
// $fromLocation;
// $toLocation;
// all Routes (time, transport type, price, other detail)




// if needed, send data to database
    // $sql1 = "SELECT * FROM users WHERE email =  '" .$email. "'";
    // $query1 = mysqli_query($connection, $sql1);
    // $row = mysqli_fetch_assoc($query1);


// if needed, open specific page by below code:
    // header('location: ../index.heml');

?>