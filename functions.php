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

    // If the user is not found then redirect it to the signup page
    header("Location: signup.php");
}