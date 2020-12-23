<?php
    session_start();
    include "./connection.php";
    include "./functions.php";

    $user_data = checkIFUserIsLoggedIn($con);

    $id = $_GET['id'];
    $adminID = $user_data["id"];
    
    if(!mysqli_select_db($con, $dbname)){
        echo("Could not connect to the database!");
        die;
    }
    else{
        $query = " delete from customers where id = '$id' AND user_id = '$adminID' ";
        mysqli_query($con, $query);

        header("Location: dashboard.php");
    }
?>