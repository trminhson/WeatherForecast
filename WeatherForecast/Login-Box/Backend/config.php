<?php

$server="localhost:8888";
$username="root";
$password="";
$db="se";

// Create connection
$conn = mysqli_connect($server, $username, $password, $db);

// Check connection
if (!$conn) {
  die("<script>alert('Connection Failed.')</script>");
}

?>