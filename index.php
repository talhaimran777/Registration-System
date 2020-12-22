<?php 
    // Use this function to start a session
    session_start();

    // Check for the login of the user
    include("./connection.php");
    include("./functions.php");

    $user_data = checkIFUserIsLoggedIn($con);

    if($user_data["user_id"]){
        header("Location: dashboard.php");
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>This is index.php file</h1>
</body>

</html>