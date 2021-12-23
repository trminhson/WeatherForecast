<?php

include 'config.php';

session_start();

error_reporting(0);

if (isset($_SESSION['userId'])) {
    header("Location: index.php");
}

if(isset($_POST['submitLog'])){

    $uname=$_POST['userId'];
    $upassword=md5($_POST['password']);

    $sql="select * from loginform where User= '$uname' AND  Pass='$upassword' ";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result)==1){
        echo "<script>alert('You have successfully log in!')</script>";       
    } else {
        echo "Wrong username or password";
        exit();
    }
}
?>