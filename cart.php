<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>E-lap | Cart</title>

    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <link rel="icon" href="resource/shop-logo.svg" />
</head>

<body>

    <div class="container-fluid">
        <div class="row">

            <?php include "header.php";

            require "connection.php";

            if (isset($_SESSION["u"])) {

                $email = $_SESSION["u"]["email"];

                $total = 0;
                $subtotal = 0;
                $shipping = 0;
            ?>
                <!-- <hr> -->
                <div class="col-12 pt-3" style="background-color: #E3E5E4;">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Cart</li>
                        </ol>
                    </nav>
                </div>

                <?php

                $cart_rs = Database::search("SELECT * FROM `cart` WHERE `user_email`='" . $email . "' ");
                $cart_num = $cart_rs->num_rows;

                if ($cart_num == 0) {

                ?>
                    <!-- Empty View -->
                    <div class="col-12">
                        <div class="row">
                            <div class="col-12 emptyCart"></div>
                            <div class="col-12 text-center mb-2">
                                <label class="form-label fs-1 fw-bold">
                                    You have no items in your Cart yet.
                                </label>
                            </div>
                            <div class="offset-lg-4 col-12 col-lg-4 d-grid mb-3">
                                <a href="home.php" class="btn btn-outline-info fs-3 fw-bold">
                                    Start Shopping
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- Empty View -->
                <?php

                } else {

                ?>

                    <!-- products -->
                    <div class="col-12 mt-lg-5 ">
                        <div class="row">

                            <?php
                            for ($x = 0; $x < $cart_num; $x++) {
                                $cart_data = $cart_rs->fetch_assoc();

                                $product_rs = Database::search("SELECT * FROM `product` WHERE `id`='" . $cart_data["product_id"] . "' ");
                                $product_data = $product_rs->fetch_assoc();

                                $total = $total + ($product_data["price"] * $cart_data["qty"]);

                                $address_rs = Database::search("SELECT `district`.`id` AS `did` FROM `user_has_address` INNER JOIN `city` ON
                                        user_has_address.city_id = city.id INNER JOIN `district` ON city.district_id = district.id WHERE
                                        `user_email` = '" . $email . "'");

                                $address_num = $address_rs->num_rows;

                                $address_data = $address_rs->fetch_assoc();
                                $ship = 0;

                                if ($address_num == 0) {
                                    header("userprofile.php");
                                } else if ($address_data["did"] == 3) {
                                    $ship = $product_data["delivery_fee_colombo"];
                                    $shipping = $shipping + $ship;
                                } else {
                                    $ship = $product_data["delivery_fee_other"];
                                    $shipping = $shipping + $ship;
                                }

                                $seller_rs = Database::search("SELECT * FROM `user` WHERE `email`='" . $product_data["user_email"] . "' ");
                                $seller_data = $seller_rs->fetch_assoc();
                                $seller = $seller_data["fname"] . " " . $seller_data["lname"];

                            ?>

                                <div class=" col-10 offset-lg-2">
                                    <div class="row">
                                        <div class="col-12 col-lg-10 ">
                                            <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>Product</th>
                                                        <th>Quantity</th>
                                                        <th class="text-center">Price</th>
                                                        <th class="text-center">Total</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="col-8 col-lg-6">
                                                            <div class="media">
                                                                <?php
                                                                $img = array();

                                                                $images_rs = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $cart_data["product_id"] . "'");
                                                                $images_data = $images_rs->fetch_assoc();

                                                                ?>
                                                                <a class="thumbnail pull-left"> <img class="media-object" src="<?php echo $images_data["code"]; ?>" style="width: 120px; height: 120px;"> </a>
                                                                <div class="media-body">
                                                                    <h4 class="media-heading fw-bold"><?php echo $product_data["title"]; ?></h4>
                                                                    <h5 class="media-heading text-primary">Brand : Aser</h5>
                                                                    <span>Condition: </span><span class="text-success fw-bold"> Brand new</span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="col-1 col-lg-1" style="text-align: center">
                                                            <input type="email" class="form-control" value="1">
                                                        </td>
                                                        <td class="col-1 col-lg-1 text-center"><strong>Rs. <?php echo $product_data["price"]; ?> .00</strong></td>
                                                        <td class="col-1 col-lg-1 text-center"><strong>Rs. <?php echo ($product_data["price"] * $cart_data["qty"]) + $ship; ?> .00</strong></td>
                                                        <td class="col-1 col-lg-1">
                                                            <a type="button" class="btn btn-outline-danger" onclick="deletefromcart(<?php echo $cart_data['id']; ?>);">
                                                                Remove
                                                            </a>
                                                        </td>
                                                    </tr>
                                                <?php
                                            }
                                                ?>

                                                <!-- summary -->
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td>
                                                        <h5 class="fw-bold">Subtotal</h5>
                                                    </td>
                                                    <td class="text-right">
                                                        <h5><strong>Rs. <?php echo $total; ?> .00</strong></h5>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td>
                                                        <h5 class="fw-bold">Estimated shipping</h5>
                                                    </td>
                                                    <td class="text-right">
                                                        <h5><strong>Rs. <?php echo $shipping; ?> .00</strong></h5>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> </td>
                                                    <td></td>
                                                    <td></td>
                                                    <td>
                                                        <h3 class="fw-bold">Total</h3>
                                                    </td>
                                                    <td class="text-right">
                                                        <h3><strong>Rs. <?php echo ($shipping + $total); ?> .00</strong></h3>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> </td>
                                                    <td></td>
                                                    <td> </td>
                                                    <td>
                                                        <button type="button" class="btn btn-default text-primary">
                                                            Continue Shopping
                                                        </button>
                                                    </td>
                                                    <td>
                                                        <button type="button" class="btn btn-success">
                                                            ORDER
                                                        </button>
                                                    </td>
                                                </tr>
                                                <!-- summary -->
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                            <?php
                        }

                            ?>

                        </div>
                    </div>

                <?php
            } else {
                echo ("Please Sign In or Register");
            }
                ?>

        </div>
    </div>
    <?php include "footer.php"; ?>
    <script src="script.js"></script>
</body>

</html>