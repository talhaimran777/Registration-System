<?php
    // Includeing functions file
    include("./functions.php");
    
    // Gettin data that the user just entered
    $user_name =  $_POST["user_name"];
    $password =  $_POST["password"];
    $password_copy =  $_POST["password_copy"];

    $error = false;
    $errorMssage = "";

    if(!empty($user_name) && !empty($password) && !empty($password_copy)){
        if($password == $password_copy){

            // 20 here is the max length of the user_id
            $user_id = generateUserID(20);

            // Getting things ready for database connection
            $dbhost = "localhost";
            $dbuser = "root";
            $dbpass = "";
            $dbname = "gymregistrationsystem";
            
            // Getting connection
            $connection = mysqli_connect($dbhost, $dbuser, $dbpass);

            // If not connected then generate the error
            if(!$connection){
                echo("Could not connect to the server!");
            }

            // If connected then try select the db to enter the data
            // If not generate an error
            if(!mysqli_select_db($connection, $dbname)){
                echo("Could not select the database!");
            }

            // Else write query to enter the user submitted data to the db
            $query = "insert into users (user_id, user_name, password) values ('$user_id', '$user_name', '$password')";

            // If not able to insert the data with the query generate an error
            if(!mysqli_query($connection, $query)){
                echo("Could not insert data into the database!");
            }
            else{
                echo("Insert data into the database!");
            }

            //header("refresh:5; url = signup.php");
            header("Location: login.php");
            die;
            
        }
        else{
            $error = true;
            $errorMessage = "Passwords do not match!";
            die;
        }
    }
    else{
        $error = true;
        $errorMessage = "Cannot leave any of the fields empty!";
        die; 
    }
?>