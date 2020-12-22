<?php 
    session_start();
    include("./connection.php");
    include("./functions.php");
    $user_data = checkIFUserIsLoggedIn($con);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>

<body>
    <h1>This is a dashboard!</h1>
    <h3>Hello, <?php  echo($user_data["user_name"])?></h3>

    <a href="logout.php">Logout</a>
</body>

</html>