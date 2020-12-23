<nav class="navbar navbar-expand-lg navbar-dark bg-primary py-0">
    <div class="container px-5">
        <a class="navbar-brand" href="#">Gym Registration</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav" style="margin-left: auto;">
                <li class="nav-item active">
                    <a class="nav-link"><?php echo($user_data["user_name"])?></a>
                </li>

                <li class="nav-item active">
                    <a class="nav-link" href="dashboard.php">Dashboard<span class="sr-only">(current)</span></a>
                </li>

                <li class="nav-item active">
                    <a class="nav-link" href="reg_customer.php">Register Customer<span
                            class="sr-only">(current)</span></a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>