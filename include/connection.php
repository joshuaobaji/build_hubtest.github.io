<?php
// this code configures the database conection
$HOSTNAME='localhost';
$USERNAME='root';
$PASSWORD= '';
$DATABASE='rex';

// establish a database connection
$con=mysqli_connect($HOSTNAME,$USERNAME,$PASSWORD,$DATABASE);
// check if the connection was succesfull
if(!$con) {
     die(mysqli_connect($con)); 
} 

?>
