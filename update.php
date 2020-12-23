<?php 
    session_start();

    include("./connection.php");
    include("./functions.php");

    $user_data = checkIFUserIsLoggedIn($con);

    $error = false;
    $updated = false;
    $successMessage = "";
    $errorMessage = "";
    $res;
    // Write query to the database to get the details of the
    // Customer with the matching id in the URL
    if(!empty($_GET["id"])){
        
        $fetchingID = $_GET["id"];
        $result;
        // Make a query to the database to get the data
        if(!mysqli_select_db($con, $dbname)){
            $error = true;
            $errorMessage = "Connection Faild to the database!";
        }
        else{
            $query = " select * from customers where id = '$fetchingID' limit 1 ";
            
            // $query = " select * from customers ";
            $result  = mysqli_query($con, $query);
            $res = mysqli_fetch_array($result);
            // while($res = mysqli_fetch_array($result)){
            //     echo $res['first_name'] . "<br/>";
            // }
            
            if(!$result){
                $error = true;
                $errorMessage = "Could not fetch the data from the database!";
            }
            else{
                $fetched = true;
            }
        }
    }
    else {
        header("Location: dashboard.php");
    }
    
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        
        $first_name =  $_POST["first_name"];
        $last_name =  $_POST["last_name"];
        $email =  $_POST["email"];
        $phone =  $_POST["phone"];
        $address =  $_POST["address"];

        if(!empty($first_name) && !empty($last_name) && !empty($email) && !empty($phone) && !empty($address)){
            if(!mysqli_select_db($con, $dbname)){
                $error = true;
                $errorMessage = "Connection Faild to the database!";
            }
            else{
                $query = " update customers set first_name = '$first_name', last_name = '$last_name', email = '$email', phone = '$phone', address = '$address' where id = '$fetchingID' ";     
                
                
                $result  = mysqli_query($con, $query);

                if(!$result){
                    $error = true;
                    $errorMessage = "Data could not be updated!";
                }
                else{
                    $updated = true;
                    $successMessage = "Data Updated Successfully!";
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
    <title>Update Customer</title>
</head>

<body>
    <?php include("./components/navbar.php"); ?>

    <div class="container">
        <div class="col-md-7 col-lg-6 mx-auto">
            <div class="card card-body bg-light">

                <div class="row mb-1">
                    <div class="col-8 align-self-center">
                        <h4 class="text-left mb-2 text-uppercase text-primary">Update Customer</h4>
                        <p class="text-left mb-2 strong">Update your customer details.</p>
                        <p>You cannot enter customer details with same phone or email with the existing customer.</p>
                    </div>
                    <div class="col-4 align-self-center text-center">
                        <i class="fas fa-edit fa-3x text-primary" aria-hidden="true"></i>

                    </div>
                </div>

                <?php
                    if($error){ ?>

                <div class="alert alert-danger alert-dismissible fade show">
                    <button type="button" class="btn btn-danger close mr-4" data-dismiss="alert">&times;</button>
                    <?php echo $errorMessage ?>
                </div><?php
                }
                ?>

                <?php
                    if($updated){ ?>

                <div class="alert alert-success alert-dismissible fade show">
                    <button type="button" class="btn btn-success close mr-4" data-dismiss="alert">&times;</button>
                    <?php echo $successMessage ?>
                </div><?php
                }
                ?>
                <form type="submit" method="POST">
                    <label for="first_name">Enter first name</label>
                    <input type="text" class="form-control" name="first_name" value="<?php echo $res["first_name"]?>">
                    <br />
                    <label for="first_name">Enter last name</label>
                    <input type="text" class="form-control" name="last_name" value="<?php echo $res["last_name"]?>">
                    <br />
                    <label for="first_name">Enter email</label>
                    <input type="text" class="form-control" name="email" value="<?php echo $res["email"]?>">
                    <br />
                    <label for="first_name">Enter phone</label>
                    <input type="text" class="form-control" name="phone" value="<?php echo $res["phone"]?>">
                    <br />
                    <label for="first_name">Enter address</label>
                    <input type="text" class="form-control" name="address" value="<?php echo $res["address"]?>">
                    <br />
                    <button type="submit" class="btn btn-primary w-100">Update Details</button>
                </form>
            </div>
        </div>
    </div>

    <!-- For Bootstrap to work perfectly -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>