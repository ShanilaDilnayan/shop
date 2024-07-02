<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>E-lap | Home</title>

    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <link rel="icon" href="resource/shop-logo.svg" />

</head>

<body>

    <div class="container-fluid" style="background-color: whitesmoke;">
        <div class="row">

            <?php include "header.php"; ?>
            <hr class="">

            <div class="col-12 " style="background-color: white;">
                <div class="row my-4">

                    <div class="offset-lg-1  col-12 col-lg-2">
                        <p class="text-center fs-3 fw-bold " style="color: black  ;">E-Lap | Shop</p>
                    </div>
                    <div class=" col-12 col-lg-5 mt-lg-2">
                        <input type="search" class="form-control" placeholder="Search here..." id="basic_search_text">
                    </div>
                    <div class="col-12 col-lg-1 d-grid my-3 my-lg-2" style="height : 10px;">
                        <button class="btn text-white" style="background-color:black  ;" onclick="basicsearch(0);">Search</button>
                    </div>
                    <div class="col-12 col-lg-2 mt-4 mt-lg-2 text-center">
                        <i class="bi bi-heart fs-4" onclick="window.location='watchlist.php'" style="color: red"></i>&nbsp;<a href="watchlist.php" class="text-decoration-none"><span class="fs-5 form-control-color" style="color: red;">Wish List</span></a>
                    </div>
                    <div class="col-12  col-lg-1 mt-3 mt-lg-0 text-center">
                        <div class="justify-content-center">
                            <a href="advancedsearch.php" class="link-secondary text-decoration-none fw-bold text-center"> Advanced</a><br>
                            <i class="bi bi-search" onclick="window.location ='advancedsearch.php'"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- <hr /> -->
            <div class="offset-lg-1 col-12 col-lg-10 " id="basicSearchResult">
                <div class="row">

                    <div class="col-12 d-none d-lg-block mt-3 mb-5 ">
                        <div class="row">

                            <div class="col-3">
                                <div class="row">

                                    <div class="col-12  rounded-3" style="background-color: white;">

                                        <i class="bi bi-list-task fs-5"></i>&nbsp;&nbsp;<span class="fs-4">Categories</span>

                                        <hr>

                                        <span class="fw-bold">Home</span><br>
                                        <label class="mt-2"><i class="bi bi-laptop"></i> &nbsp;<span>New Laptops</span></label><br>
                                        <label class="mt-2"><i class="bi bi-battery-charging"></i> &nbsp;<span>Laptop chargers</span></label><br>
                                        <label class="mt-2"><i class="bi bi-battery-full"></i> &nbsp;<span>Laptop battry</span></label><br>
                                        <label class="mt-2"><i class="bi bi-keyboard-fill"></i> &nbsp;<span>Keyboard & Mouse</span></label><br>
                                        <label class="mt-2"><i class="bi bi-sd-card"></i> &nbsp;<span></span>Hard drive</label><br>
                                        <label class="mt-2"><i class="bi bi-sd-card-fill"></i> &nbsp;<span>Pen drive</span></label><br>
                                        <label class="mt-2"><i class="bi bi-laptop-fill"></i> &nbsp;<span></span>Used laptop</label><br>
                                        <label class="mt-2"><i class="bi bi-memory"></i> &nbsp;<span>Ram card</span></label><br>

                                    </div>

                                </div>
                            </div>

                            <div class="col-6">
                                <div class="row">

                                    <div class="col-12">

                                        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
                                            <div class="carousel-indicators">
                                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
                                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4" aria-label="Slide 5"></button>
                                            </div>
                                            <div class="carousel-inner">
                                                <div class="carousel-item active">
                                                    <img src="resource/slide5.png" class="d-block w-100 rounded-3" alt="...">
                                                </div>
                                                <div class="carousel-item">
                                                    <img src="resource/slide2.jpg" class="d-block w-100 rounded-3" alt="...">
                                                </div>
                                                <div class="carousel-item">
                                                    <img src="resource/slide4.png" class="d-block w-100 rounded-3" alt="...">
                                                </div>
                                                <div class="carousel-item">
                                                    <img src="resource/slide6.jpg" class="d-block w-100 rounded-3" alt="...">
                                                </div>
                                                <div class="carousel-item">
                                                    <img src="resource/slide6.webp" class="d-block w-100 rounded-3" alt="...">
                                                </div>
                                            </div>
                                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Previous</span>
                                            </button>
                                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Next</span>
                                            </button>
                                        </div>

                                    </div>

                                </div>
                            </div>

                            <div class="col-3">
                                <div class="row">

                                    <div class="col-12 rounded-3" style="background-color: white;">
                                        <div class="row justify-content-center">

                                            <div class="mt-3" style="width: 7rem;">
                                                <img src="resource/ll.jpg" class="card-img-top mb-1" alt="...">
                                            </div>
                                            <?php

                                            if (isset($_SESSION["u"])) {
                                                $data = $_SESSION["u"];

                                            ?>
                                                <div class="col-12 text-center my-3">
                                                    <span class="fs-4 fw-bold">Hi , <?php echo $data["fname"]; ?></span>
                                                </div>
                                                <div class="col-8 d-grid text-center mb-3 mt-2">
                                                    <button class="btn  rounded-5" style="background-color: #74EBD5;background-image: linear-gradient(90deg,#FBE35E  0%,#F0FF0C  100%);" onclick="signout();">Sign Out</button>
                                                </div>
                                                <div class="mt-3 mb-2" style="width: 18rem;">
                                                    <img src="resource/de.jpeg" class="card-img-top mb-1 rounded-2" alt="...">
                                                </div>


                                            <?php

                                            } else {
                                            ?>
                                                <div class="col-12 text-center mt-3 mb-0">
                                                    <span class="fs-4 fw-bold">Hello , Customer</span>
                                                </div>
                                                <div class="col-10 d-grid text-center mb-3 mt-3">
                                                    <button class="btn btn-primary rounded-5" onclick="window.location='index.php'">Sign In</button>
                                                </div>
                                                <div class="mt-3 mb-3" style="width: 18rem;">
                                                    <img src="resource/de.jpeg" class="card-img-top mb-1 rounded-2" alt="...">
                                                </div>

                                            <?php
                                            }

                                            ?>

                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>


            <!-- category -->
            <div class="col-6  offset-1">
                <div class="row">
                    <div class="border-start border-5 border-primary ps-5 mb-5">
                        <h6 class="text-black text-uppercase">OUR SHOPE</h6>
                        <h1 class=" text-uppercase mb-0 text-black">Select Category</h1>
                    </div>
                </div>
            </div>


            <div class="col-12 mb-3 mb-lg-5">
                <div class="row justify-content-center">

                    <div class="card mx-2 mb-2 mb-lg-0 text-center item" style="width: 18rem;">
                        <img src="resource/n1.jpeg" class="card-img-top mb-1" alt="...">
                        <div class="card-body">
                            <p class="card-text fw-bold fs-3 mt-5">Laptop battry</p>
                        </div>
                    </div>
                    <div class="card mx-2 mb-2 mb-lg-0 text-center item" style="width: 18rem;">
                        <img src="resource/n6.jpeg" class="card-img-top mb-2" alt="...">
                        <div class="card-body">
                            <p class="card-text fw-bold fs-3 mt-5">Laptops</p>
                        </div>
                    </div>
                    <div class="card mx-2 mb-2 mb-lg-0 text-center item" style="width: 18rem;">
                        <img src="resource/n3.jpeg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-text fw-bold fs-3">Laptop Chargers</p>
                        </div>
                    </div>
                    <div class="card mx-2 mb-2 mb-lg-0 text-center item" style="width: 18rem;">
                        <img src="resource/n4.jpeg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-text fw-bold fs-3">Keyboard & Mouse</p>
                        </div>
                    </div>
                    <div class="card mx-2 mb-2 mb-lg-0 text-center item" style="width: 18rem;">
                        <img src="resource/n5.jpeg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-text fw-bold fs-3">Hard disk & Pen drive</p>
                        </div>
                    </div>

                </div>
            </div>
            <!-- category -->

            <hr class="border-primary" style="border-width: 4px;">

            <!-- product -->
            <div class="col-12 my-2 ">
                <div class="row ">

                    <div class="col-12 my-2 text-center">
                        <h2>--- All Items --- </h2>
                    </div>

                    <div class="col-12 mb-4" style="background-color: #090C5B ;">
                        <div class="row justify-content-center gap-2 mb-2">

                            <?php
                            require "connection.php";

                            $product_rs = Database::search("SELECT * FROM `product` WHERE  
                            `status_id` ='1' ORDER BY `datetime_added` DESC LIMIT 25 OFFSET 0");

                            $product_num = $product_rs->num_rows;

                            for ($z = 0; $z < $product_num; $z++) {
                                $product_data = $product_rs->fetch_assoc();

                            ?>

                                <div class="card col-6 col-lg-2 mt-2 mb-2" style="width: 18rem;">
                                    <?php

                                    $image_rs = Database::search("SELECT * FROM `images` WHERE `product_id` ='" . $product_data["id"] . "'");
                                    $image_data = $image_rs->fetch_assoc();

                                    ?>

                                    <img src="<?php echo $image_data["code"]; ?>" class="card-img-top img-thumbnail mt-2" style="height: 180px;" />
                                    <div class="card-body ms-0 m-0 text-center">
                                        <h5 class="card-title fs-6 fw-bold"><?php echo $product_data["title"]; ?> <span class="badge bg-danger">New</span></h5>
                                        <span class="card-text text-primary">Rs. <?php echo $product_data["price"]; ?> .00</span> <br />
                                        <?php

                                        if ($product_data["qty"] > 0) {

                                        ?>
                                            <span class="card-text text-warning fw-bold">In Stock</span> <br />
                                            <span class="card-text text-success fw-bold"><?php echo $product_data["qty"]; ?> Items Available</span><br /><br />
                                            <a href='<?php echo "singleproduct.php?id=" . $product_data["id"]; ?>' class="btn btn-outline-success mb-2">Buy Now</a><br>
                                            <a href="" onclick="addtocart(<?php echo $product_data['id']; ?>);" class="btn btn-outline-warning mb-2">Add to Cart</a>
                                        <?php


                                        } else {

                                        ?>
                                            <span class="card-text text-warning fw-bold">Out of Stock</span> <br />
                                            <span class="card-text text-success fw-bold">00 Items Available</span><br /><br />
                                            <a href="#" class="btn btn-outline-success mb-2  disabled">Buy Now</a><br>
                                            <a href="" class="btn btn-outline-warning mb-2  disabled">Add to Cart</a>
                                        <?php

                                        }
                                        $watchlist_rs = Database::search("SELECT * FROM `watchlist` WHERE `product_id`='" . $product_data["id"] . "'
                                         AND `user_email`='" . $_SESSION["u"]["email"] . "'");
                                        $watchlist_num = $watchlist_rs->num_rows;

                                        if ($watchlist_num == 1) {
                                        ?>
                                            <button class="col-12 btn btn-outline-light mt-2 " onclick='addwatchlist(<?php echo $product_data["id"]; ?>);'>
                                                <i class="bi bi-heart-fill  fs-5" style="color: red ;" id='heart<?php echo $product_data["id"]; ?>'></i>
                                            </button>
                                        <?php
                                        } else {
                                        ?>
                                            <button class="col-12 btn btn-outline-light mt-2" onclick='addwatchlist(<?php echo $product_data["id"]; ?>);'>
                                                <i class="bi bi-heart-fill text-dark fs-5" id='heart<?php echo $product_data["id"]; ?>'></i>
                                            </button>
                                        <?php
                                        }

                                        ?>
                                    </div>
                                </div>

                            <?php

                            }

                            ?>


                        </div>
                    </div>

                </div>
            </div>

            <!-- product -->

        </div>
    </div>
    <?php include "footer.php"; ?>
</body>

</html>