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

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <!-- Font Awsome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
        integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA=="
        crossorigin="anonymous" />
    <title>Add Customer</title>
</head>

<body>
    <?php include("./components/navbar.php"); ?>

    <div class="container">
        <div class="col-md-7 col-lg-6 mx-auto py-5">
            <div class="card card-body bg-light">

                <div class="row mb-4">
                    <div class="col-8 align-self-center">
                        <h4 class="text-left mb-2 text-uppercase text-primary">Register Customer</h4>
                        <p class="text-left mb-2 strong">Add customer to datbase.</p>
                    </div>
                    <div class="col-4 align-self-center text-center">
                        <i class="fa fa-user-plus fa-3x text-primary" aria-hidden="true"></i>

                    </div>
                </div>

                <form type="submit">
                    <label for="first_name">Enter first name</label>
                    <input type="text" class="form-control" name="first_name">
                    <br />
                    <label for="first_name">Enter last name</label>
                    <input type="text" class="form-control" name="last_name">
                    <br />
                    <label for="first_name">Enter email</label>
                    <input type="text" class="form-control" name="email">
                    <br />
                    <label for="first_name">Enter phone</label>
                    <input type="text" class="form-control" name="phone">
                    <br />
                    <label for="first_name">Enter address</label>
                    <input type="text" class="form-control" name="address">
                    <br />
                    <br />
                    <button type="submit" class="btn btn-primary w-100">Add Customer</button>
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