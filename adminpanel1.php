<?php

session_start();
require "connection.php";

if (isset($_SESSION["au"])) {

?>
    <!DOCTYPE html>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>E-lap | Admin Panel</title>

        <link rel="stylesheet" href="bootstrap.css" />
        <link rel="stylesheet" href="style.css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

        <link rel="icon" href="resource/shop-logo.svg" />
    </head>

    <body style="background-color: #E9EBEE;">

        <div class="container-fluid">
            <div class="row">


                <div class="col-12 bg-white">
                    <div class="row">
                        <div class="col-12 col-lg-4">
                            <div class="row">
                                <div class="col-12 col-lg-4 mt-1 mb-1 text-center">

                                    <img src="resource/shop-logo.svg" width="90px" height="90px" class="rounded-circle" />

                                </div>
                                <div class="col-12 col-lg-8">
                                    <div class="row text-center text-lg-start">
                                        <div class="col-12 mt-0 mt-lg-4">
                                            <span class="text-black-50 fw-bold"><?php echo $_SESSION["au"]["fname"] . " " . $_SESSION["au"]["lname"]; ?></span>
                                        </div>
                                        <div class="col-12">
                                            <span class="text-black-50 fw-bold"><?php echo $_SESSION["au"]["email"]; ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-8">
                            <div class="row">
                                <div class="col-12 col-lg-10 mt-2 my-lg-4">
                                    <h1 class="offset-4 offset-lg-2 fw-bold">Admin Panel</h1>
                                </div>
                                <div class="col-12 col-lg-2 d-grid" style="padding: 30px;">
                                    <button class="btn btn-warning fw-bold" onclick="window.location='index.php'" >Sign out</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="row">

                        <div class="col-11 col-lg-2 mx-3 my-3 border border-primary rounded">
                            <div class="row">
                                <div class="col-12 mt-3 fs-5">
                                    <div class="row">
                                        <div class="col-12  text-center">
                                            <label class="form-label fw-bold fs-3 text-decoration-underline">Hello Admin</label>
                                        </div>

                                        <div class="col-12 mt-3">
                                            <i class="bi bi-house-door-fill"></i> <a href="adminpanel.php" class="form-label fw-bold fs-5"> Dash Borad</a>
                                        </div>
                                        <div class="col-12">
                                            <hr style="width: 100%;" />
                                        </div>
                                        <div class="col-12">
                                            <i class="bi bi-person-square"></i> <a href="adminpanel3.php" class="form-label fw-bold fs-5">Manage Product</a>
                                        </div>
                                        <div class="col-12">
                                            <hr style="width: 100%;" />
                                        </div>
                                        <div class="col-12">
                                            <i class="bi bi-inboxes-fill"></i> <a href="adminpanel2.php" class="form-label fw-bold fs-5">Manage Users</a>
                                        </div>
                                        <div class="col-12">
                                            <hr style="width: 100%;" />
                                        </div>
                                        <div class="col-12">
                                            <i class="bi bi-credit-card-2-front-fill"></i> <a href="adminpanel1.php" class="form-label fw-bold fs-5">Product Status</a>
                                        </div>
                                        <div class="col-12">
                                            <hr style="width: 100%;" />
                                        </div>
                                        <div class="col-12">
                                            <i class="bi bi-aspect-ratio-fill"></i> <a href="" class="form-label fw-bold fs-5">Customers</a>
                                        </div>
                                        <div class="col-12">
                                            <hr style="width: 100%;" />
                                        </div>
                                        <div class="col-12">
                                            <i class="bi bi-bag-fill"></i> <a href="" class="form-label fw-bold fs-5">Sizes</a>
                                        </div>
                                        <div class="col-12">
                                            <hr style="width: 100%;" />
                                        </div>
                                        <div class="col-12">
                                            <i class="bi bi-card-heading"></i> <a href="" class="form-label fw-bold fs-5">Orders</a>
                                        </div>
                                        <div class="col-12">
                                            <hr style="width: 100%;" />
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-lg-9 mt-3 mb-3 bg-white">
                            <div class="row" id="sort">
                                <div class="offset-1 col-10 text-center">
                                    <div class="row justify-content-center">


                                        <div class="col-12">
                                            <label class="form-label fs-4 text-danger fw-bold">Manage Product Status</label>
                                        </div>

                                        <div class="col-12">
                                            <hr>
                                        </div>

                                        <div class="col-12 text-lg-start"><label class="fs-4 fw-bold">Categorys</label></div>
                                        <div class="col-12">

                                            <div class="row">
                                                <?php
                                                $c_rs = Database::search("SELECT * FROM `category`");
                                                $c_num = $c_rs->num_rows;

                                                for ($y = 0; $y < $c_num; $y++) {
                                                    $cdata = $c_rs->fetch_assoc();

                                                ?>
                                                    <div class="col-6 col-lg-3">
                                                        <div class="card mb-3 mt-3 col-12">
                                                            <div class="row">
                                                                <div class="col-md-4 mt-4">

                                                                    <img src="resource/all.jpg" class="img-fluid rounded-start" style="height: 50px;" />
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div class="card-body">
                                                                        <h5 class="card-title fw-bold text-primary mt-4"><?php echo $cdata["name"]; ?></h5>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php
                                                }

                                                ?>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <hr>
                                        </div>
                                        <div class="col-12 text-lg-start"><label class="fs-4 fw-bold">Edit Product</label></div>
                                        <?php

                                        $product_rs = Database::search("SELECT * FROM `product` WHERE `status_id` ='1' ORDER BY `datetime_added` DESC LIMIT 10 OFFSET 0");

                                        $product_num = $product_rs->num_rows;

                                        for ($z = 0; $z < $product_num; $z++) {
                                            $product_data = $product_rs->fetch_assoc();

                                        ?>
                                            <div class="card mb-3 mt-3 col-12 col-lg-6">
                                                <div class="row">
                                                    <div class="col-md-4 mt-4">
                                                        <?php

                                                        $image_rs = Database::search("SELECT * FROM `images` WHERE `product_id` ='" . $product_data["id"] . "'");
                                                        $image_data = $image_rs->fetch_assoc();

                                                        ?>
                                                        <img src="<?php echo $image_data["code"]; ?>" class="img-fluid rounded-start" />
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="card-body">
                                                            <h5 class="card-title fw-bold"><?php echo $product_data["title"]; ?></h5>
                                                            <span class="card-text fw-bold text-primary">Rs. <?php echo $product_data["price"]; ?> .00</span><br />
                                                            <span class="card-text fw-bold text-success"><?php echo $product_data["qty"]; ?> Items </span><br>
                                                            <span class="card-text fw-bold">Seller email :</span>&nbsp;<span class="card-text fw-bold text-black-50"><?php echo $product_data["user_email"]; ?></span><br>

                                                            <span><?php

                                                                    if ($selected_data["status_id"] == 1) {
                                                                    ?>
                                                                    <button id="pb<?php echo $selected_data['id']; ?>" class="btn btn-danger" onclick="blockProduct('<?php echo $selected_data['id']; ?>');">Block</button>
                                                                <?php
                                                                    } else {
                                                                ?>
                                                                    <button id="pb<?php echo $selected_data['id']; ?>" class="btn btn-success" onclick="blockProduct('<?php echo $selected_data['id']; ?>');">Unblock</button>
                                                                <?php

                                                                    }

                                                                ?></span>

                                                        </div>
                                                    </div>
                                                </div>
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
        <?php include "footer.php" ?>
        <script src="script.js"></script>
    </body>

    </html>
<?php

} else {
    echo ("You are not a valid user.");
}

?>