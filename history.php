<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-lap | Purchase History</title>

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
                $umail = $_SESSION["u"]["email"];

                $invoice_rs = Database::search("SELECT * FROM `invoice` WHERE `user_email`='" . $umail . "'");
                $invoice_num = $invoice_rs->num_rows;

            ?>

                <div class="col-12 my-3">
                    <div class="row text-center">
                        <h5 class="fw-bold fs-1">Purchase History</h5>
                    </div>
                </div>
                <hr>
                <?php
                if ($invoice_num == 0) {
                ?>
                    <div class="col-12 bg-body text-center" style="height: 450px;">
                        <span class="fs-1 fw-bolder text-black-50 d-block" style="margin-top: 200px;">
                            You have not purchased any product yet...
                        </span>
                    </div>
                <?php
                } else {
                ?>
                    <div class="col-12 mt-lg-4">
                        <table class="table bg-light">

                            <thead>
                                <tr class="border border-1 border-secondary">
                                    <th>#</th>
                                    <th class="text-center">Oreder ID & Product</th>
                                    <th class="text-center">Unit Price</th>
                                    <th class="text-center">Quantity</th>
                                    <th class="text-center">Purchase Date & Time</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                for ($x = 0; $x < $invoice_num; $x++) {
                                    $invoice_data = $invoice_rs->fetch_assoc();
                                ?>
                                    <tr class="border border-dark" style="height: 72px;">

                                        <td class="bg-warning text-black fs-3 text-center"><?php echo $invoice_data["id"]; ?></td>
                                        <td class="border border-dark text-center">

                                            <?php
                                            $pid = $invoice_data["product_id"];
                                            $image_rs = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $pid . "' ");
                                            $image_data = $image_rs->fetch_assoc();
                                            ?>
                                            <img src="<?php echo $image_data["code"]; ?>" style="height: 60px;"><br>
                                            <?php
                                            $product_rs = Database::search("SELECT * FROM `product` WHERE `id`='" . $pid . "' ");
                                            $product_data = $product_rs->fetch_assoc();

                                            $seller_rs = Database::search("SELECT * FROM `user` WHERE `email`='" . $product_data["user_email"] . "' ");
                                            $seller_data = $seller_rs->fetch_assoc();
                                            ?>
                                            <span class="fw-bold text-primary fs-4 p-2 "><?php echo $product_data["title"]; ?></span><br>
                                            <span class="fw-bold  p-2">000001</span>
                                        </td>
                                        <td class="fw-bold fs-6  pt-4 text-center border border-dark">Rs. <?php echo $product_data["price"]; ?> .00</td>
                                        <td class="fw-bold fs-6 text-end pt-4 border border-dark text-center"><?php echo $invoice_data["qty"]; ?></td>
                                        <td class="fw-bold fs-6 text-end pt-4 text-center"><?php echo $invoice_data["date"]; ?> | 00:00:00</td>
                                        <td><button class="btn btn-outline-danger mt-3"><i class="bi bi-trash-fill"></i> Delete</button></td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>

                        </table>
                    </div>
                    <div class="col-12 text-end mb-3">
                        <button class="btn btn-primary">Clear All</button>
                    </div>

            <?php
                }
            }
            ?>

        </div>
    </div>
    <?php include "footer.php"; ?>
    <script src="script.js"></script>
</body>

</html>