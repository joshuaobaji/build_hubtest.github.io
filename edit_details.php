<?php
 // database connection file
include "include/connection.php";

// Checking if the user is logged in
session_start();
if (!isset($_SESSION['username'])) {
    // Redirects to the login page ifthe user is not logged in
    header("Location: login.php");
    exit();
}

// Fetch the username of the logged-in user
$logged_in_username = $_SESSION['username'];

// Fetch user details from the database for the logged-in user
$query = "SELECT firstname, lastname, email FROM rexregister WHERE username = '$logged_in_username'";
$result = mysqli_query($con, $query);

// Checking if the  fetch user details query was successful
if ($result) {
    // Checking if there is a row in the result set
    if ($row = mysqli_fetch_assoc($result)) {
        //  a form for editing the user details
        echo '<form action="update_details.php" method="POST">
                <label for="firstname">First Name:</label>
                <input type="text" name="firstname" value="' . $row['firstname'] . '" required><br>
                <label for="lastname">Last Name:</label>
                <input type="text" name="lastname" value="' . $row['lastname'] . '" required><br>
                <label for="email">Email:</label>
                <input type="email" name="email" value="' . $row['email'] . '" required><br>
                <input type="submit" value="Update Changes">
              </form>';
    } else {
        echo '<p>No user found with the logged-in username</p>';
    }
} else {
    die(mysqli_error($con));
}

// Closing the database connection
mysqli_close($con);
?>
