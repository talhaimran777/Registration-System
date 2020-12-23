<?php 
    session_start();
    include("./connection.php");
    include("./functions.php");
    $user_data = checkIFUserIsLoggedIn($con);

    $fetched = false;
    $noCustomerFound = false;
    $fetchingID = $user_data["id"];
    $result;
    // Make a query to the database to get the data
    if(!mysqli_select_db($con, $dbname)){
        $error = true;
        $errorMessage = "Connection Faild to the database!";
    }
    else{
        $query = " select * from customers where user_id = '$fetchingID' ";
        
        // $query = " select * from customers ";
        $result  = mysqli_query($con, $query);

        // while($res = mysqli_fetch_array($result)){
        //     echo $res['first_name'] . "<br/>";
        // }
        
        if(mysqli_num_rows($result) === 0){
            $noCustomerFound = true;
            $noCustomerMessage = "You have not added any customers yet.";
        }
        else{
            $fetched = true;
            $noCustomerFound = false;
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
    <title>Dashboard</title>
</head>

<body>

    <!-- Including navbar component -->
    <?php
        include("./components/navbar.php");
    ?>

    <div class="container px-5">
        <h3 class="mt-4 mb-5">Hello, <?php  echo($user_data["user_name"])?></h3>

        <?php if($noCustomerFound){ ?>
        <p> <?php echo $noCustomerMessage ?> </p>
        <a href="reg_customer.php" class="btn btn-primary btn-sm">Add Customer</a>
        <?php }else{ ?>

        <!-- Write html to display all the customers -->

        <div class="table-responsive">
            <table class="table table-striped">
                <thead className="thead-inverse">
                    <tr>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Phone No</th>
                        <th>Address</th>
                        <th />
                    </tr>
                </thead>

                <tbody>
                    <?php while($row = mysqli_fetch_array($result)){  ?>
                    <tr>
                        <td> <?php echo $row['id']; ?> </td>
                        <td> <?php echo $row['first_name']; ?> </td>
                        <td> <?php echo $row['last_name']; ?> </td>
                        <td> <?php echo $row['email']; ?> </td>
                        <td> <?php echo $row['phone']; ?> </td>
                        <td> <?php echo $row['address']; ?> </td>
                        <td>
                            <a href="update.php?id=<?php echo $row['id']; ?>">
                                <i class="fas fa-edit text-success" style="margin-right: 5px; cursor: pointer;"></i>
                            </a>
                            <i class="fas fa-trash text-danger" style=" cursor: pointer;"></i>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

        <?php }
        ?>


    </div>




    <!-- For Bootstrap to work perfectly -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>