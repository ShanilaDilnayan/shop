<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="style.css" />

</head>

<body>

    <div class="col-12">
        <div class="row mt-1  bg-light">

            <div class=" offset-lg-1 col-3 col-lg-1  shop-logo" style="height: 60px;"></div>

            <div class=" col-3 col-lg-2 align-self-start my-4 " style="margin-left: -25px;">
                <?php

                session_start();

                if (isset($_SESSION["u"])) {
                    $data = $_SESSION["u"];

                ?>
                    <span offset-lg-1><b>Welcome |</b> <?php echo $data["fname"] . " " . $data["lname"]; ?></span>

                <?php

                } else {
                ?>

                    <a href="index.php" class="text-decoration-none fw-bold">Sign in or Register</a>

                <?php
                }

                ?>
            </div>

            <div class="col-6 col-lg-5 text-center g-3 ">
                <button class="btn btn-light" onclick="window.location='home.php';">HOME</button>
                <button class="btn btn-light">ABOUT</button>
                <button class="btn btn-light">SEVICES</button>
                <button class="btn btn-light">SHOWCASE</button>
                <button class="btn btn-light">BLOG</button>
                <button class="btn btn-light">CONTACT</button>
            </div>



            <div class="col-3 col-lg-1 dropdown my-3">
                <button class="btn btn-light dropdown-toggle fw-bold" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    E-lap
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="userprofile.php">My Profile</a></li>
                    <!-- <li><a class="dropdown-item" href="myproduct.php">My Products</a></li> -->
                    <li><a class="dropdown-item" href="watchlist.php">Watchlist</a></li>
                    <li><a class="dropdown-item" href="history.php">Purchase History</a></li>
                </ul>
            </div>

            <div class="offset-lg-0 col-2 col-lg-1  cart-icon mt-3 " onclick="window.location = 'cart.php';"></div>

            <div class=" col-6 col-lg-1 mt-3 mb-3">
                <a class="btn btn-outline-danger" onclick="signout();">Sign Out</a>
            </div>

        </div>
    </div>

    <script src="script.js"></script>
    <script src="bootstrap.bundle.js"></script>
</body>

</html>