<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <title>Document</title>
</head>

<body>
    <div class="col-10 col-sm-8 col-md-6 col-lg-4 mx-auto my-5">

        <div class="container text-center mb-4">
            <h2 class="text-primary">Gym Registration Website</h2>
        </div>
        <div class="card card-body bg-light">
            <h3 class="text-center mb-2 text-uppercase text-primary">Sign Up Form</h3>
            <h5 class="text-center mb-2 text-uppercase">For Gym Admins</h5>
            <hr />
            <form>
                <label for="user_name">Enter user name</label>
                <input type="text" class="form-control" autocomplete=false placeholder="Enter username...">
                <br />
                <label for="password">Enter password</label>
                <input type="password" class="form-control" autocomplete=false placeholder="Enter password...">
                <br />
                <label for="password_copy">Re Enter the password</label>
                <input type="password" class="form-control" autocomplete=false placeholder="Re enter password...">
                <br />
                <br />
                <a href="login.php" class="btn btn-outline-success d-block">SignUp</a>
            </form>
        </div>
    </div>
    <!-- For Bootstrap to work perfectly -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous">
    </script>
</body>

</html>