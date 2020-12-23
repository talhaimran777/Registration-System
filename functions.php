<?php
function checkIFUserIsLoggedIn($con){

    if(isset($_SESSION["user_id"])){
        // If it is set than check for it's legitment

        $id = $_SESSION["user_id"];
        $query = "select * from users where user_id = '$id' limit 1";

        $result = mysqli_query($con, $query);

        if($result && mysqli_num_rows($result) > 0){

            // user exists
            $user_data = mysqli_fetch_assoc($result);
            return $user_data;
        }
    }

    // If the user is not found then redirect it to the login page
    header("Location: login.php");
}

function checkIFLoggedIn($con){

    if(isset($_SESSION["user_id"])){
        // If it is set than check for it's legitment

        $id = $_SESSION["user_id"];
        $query = "select * from users where user_id = '$id' limit 1";

        $result = mysqli_query($con, $query);

        if($result && mysqli_num_rows($result) > 0){

            // user exists
            return true;
        }
        else{
            return false;
        }
    }
    else{
        return false;
    }
}


function generateUserID($maxLength){

    // Code to generate a user_id for each of the user
    $ID = "";

    if($maxLength < 5){
        $maxLength = 5;
    }

    $actualLength = rand(4, $maxLength);
    

    for($i = 0; $i < $actualLength; $i++){
        $ID .= rand(1, 9);
    }

    return $ID;
}