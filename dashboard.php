<?php
session_start();
if(!isset($_SESSION['username'])){
    header('location:login.php');
}

?>



<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Home page</title>
  </head>
  <body>
   <h1 class="text-center text-success mt-5" >welcome <?php echo $_SESSION['username']; ?></h1>
   <?php
       // database connection file
        include "include/connection.php"; 


                // this code fetches the username of the logged-in user
                $logged_in_username = $_SESSION['username'];

                // this code fetches user details from the database for the logged-in user
                $query = "SELECT firstname, lastname, email FROM rexregister WHERE username = '$logged_in_username'";
                $result = mysqli_query($con, $query);

                // this codes checks if the fetch user details query was successful
                if ($result) {
                    // Checking if there is a row in the result set
                    if ($row = mysqli_fetch_assoc($result)) {
                      echo '<table class="table table-bordered">
                      <thead>
                          <tr>
                              <th>First Name</th>
                              <th>Last Name</th>
                              <th>Email</th>
                              <th>Action</th> 
                          </tr>
                      </thead>
                      <tbody>';

                      echo '<tr>
                      <td>' . $row['firstname'] . '</td>
                      <td>' . $row['lastname'] . '</td>
                      <td>' . $row['email'] . '</td>
                      <td><a href="edit_details.php">Edit</a></td>
                    </tr>';
              
                    } else {
                        echo '<p>No user found with the logged-in username</p>';
                    }
                } else {
                    die(mysqli_error($con));
                }

// Closing the database connection
mysqli_close($con);
?>

   <div class="container">
    <a href="logout.php" class="btn btn-primary">Logout</a>
   </div>
   
  </body>
</html>
