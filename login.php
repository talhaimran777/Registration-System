<?php

    $error = false;
    $errorMessage = "";
    session_start();

    // Including code from these files
    include("./connection.php");
    //include("./functions.php");

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $user_name =  $_POST["user_name"];
        $password =  $_POST["password"];

        if(!empty($user_name) && !empty($password)){

            // try select the db to read the data from the database
            // If not generate an error
            if(!mysqli_select_db($con, $dbname)){
                echo("Could not select the database!");
            }
            else{
                // Else write query to enter the user submitted data to the db
                $query = "select * from users where user_name = '$user_name' limit 1";

                // If not able to insert the data with the query generate an error

                $result  = mysqli_query($con, $query);
                if($result){
                    if($result && mysqli_num_rows($result) > 0){
                        $user_data = mysqli_fetch_assoc($result);

                        if($user_data["password"] === $password){
                            $_SESSION["user_id"] = $user_data["user_id"];
                            header("Location: dashboard.php");
                            die;
                        }
                        else{
                            $error = true;
                            $errorMessage = "Invalid username / password";
                        }
                    }
                }
            }
        }
        else{
            $error = true;
            $errorMessage = "Cannot leave any of the fields empty!";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <!-- Font Awsome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
        integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA=="
        crossorigin="anonymous" />

    <title>Log in</title>
</head>

<body>
    <div class="col-10 col-sm-8 col-md-6 col-lg-5 mx-auto my-5">

        <!-- <div class="container mb-4">
            <h1 class="text-primary text-center">Gym Registration Website</h1>
        </div> -->
        <div class="card card-body bg-light">
            <div class="row">
                <div class="col-8 align-self-center">
                    <h4 class="text-left mb-2 text-uppercase text-primary">Log In Form</h4>
                    <p class="text-left mb-2 strong">Log in to your dashboard.</p>
                </div>
                <div class="col-4 align-self-center text-center">
                    <i class="fas fa-user-lock fa-3x text-primary"></i>
                </div>
            </div>
            <hr />

            <?php
                if($error){ ?>

            <div class="alert alert-danger alert-dismissible fade show">
                <button type="button" class="btn btn-danger close mr-4" data-dismiss="alert">&times;</button>
                <?php echo $errorMessage ?>
            </div><?php
            }
            ?>
            <form method="POST">
                <label for="user_name">Enter user name</label>
                <input type="text" class="form-control" autocomplete="false" placeholder="Enter username..."
                    required="true" name="user_name">
                <br />
                <label for="password">Enter password</label>
                <input type="password" class="form-control" autocomplete="false" placeholder="Enter password..."
                    required="true" name="password">
                <br />
                <br />
                <button type="submit" class="w-100 btn btn-block btn-outline-primary">Log In</button>
            </form>

            <div class="row mt-3">
                <div class="col-6">
                    <p class="mt-3">Don't Have an account?</p>
                </div>
                <div class="col-6">
                    <a href="signup.php" class="btn btn-primary mt-3 btn-sm">SignUp Here</a>
                </div>
            </div>
        </div>
    </div>
    <!-- For Bootstrap to work perfectly -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>