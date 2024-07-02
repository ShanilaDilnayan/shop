<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>E-lap | Invoice</title>

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
                $oid = $_GET["id"];

            ?>


                <hr>
                <div class="col-12 bg-light mb-4 border border-danger rounded" id="page">
                    <div class="row">

                        <div class="col-12 col-lg-4 mt-2 mt-lg-5">
                            <div class="row">
                                <div class="col-12 text-danger text-decoration-underline text-start">
                                    <h2 class="fw-bold">E-Lap</h2>
                                </div>
                                <div class="col-12 fw-bold text-strat">
                                    <span>Kurunrgala, Giriulle, Sri Lanka</span><br />
                                    <span>+90 1234 3450</span><br />
                                    <span>E-lap@gmail.com</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-lg-4 mt-2 mt-lg-5">
                            <div class="row">
                                <div class="col-12 text-center">
                                    <h1 class="fw-bold">INVOICE TO :</h1>
                                </div>
                                <?php
                                $address_rs = Database::search("SELECT * FROM `user_has_address` WHERE `user_email`='" . $umail . "'");
                                $address_data = $address_rs->fetch_assoc();
                                ?>
                                <div class="col-12 fw-bold text-center">
                                    <span><?php echo $_SESSION["u"]["fname"] . " " . $_SESSION["u"]["lname"]; ?></span><br />
                                    <span><?php echo $umail; ?></span>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-lg-4 mt-2 mt-lg-5">
                            <div class="row">
                                <?php
                                $invoice_rs = Database::search("SELECT * FROM `invoice` WHERE `order_id`='" . $oid . "'");
                                $invoice_data = $invoice_rs->fetch_assoc();

                                ?>
                                <div class="col-12 text-primary text-end">
                                    <h2 class="fw-bold">INVOICE 0<?php echo $invoice_data["id"]; ?></h2>
                                </div>
                                <div class="col-12 fw-bold text-end">
                                    <span>Date & Time</span><br />
                                    <span><?php echo $invoice_data["date"]; ?></span><br />
                                    <span>00:00:00</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <hr class="border border-1 border-dark" />
                        </div>

                        <div class="col-12 mt-lg-4">
                            <table class="table">

                                <thead>
                                    <tr class="border border-1 border-secondary">
                                        <th>#</th>
                                        <th class="text-center">Oreder ID & Product</th>
                                        <th class="text-center">Unit Price</th>
                                        <th class="text-center">Quantity</th>
                                        <th class="text-center">Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="border border-dark" style="height: 72px;">
                                        <td class="bg-warning text-black fs-3 text-center"><?php echo $invoice_data["id"]; ?></td>
                                        <td class="border border-dark text-center">

                                            <?php
                                            $img = array();

                                            $images_rs = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $invoice_data["product_id"] . "'");
                                            $images_data = $images_rs->fetch_assoc();

                                            ?>
                                            <img src="<?php echo $images_data["code"]; ?>" style="height: 60px;"><br>
                                            <?php
                                            $product_rs = Database::search("SELECT * FROM `product` WHERE `id`='" . $invoice_data["product_id"] . "'");
                                            $product_data = $product_rs->fetch_assoc();
                                            ?>
                                            <span class="fw-bold text-primary fs-4 p-2 "><?php echo $product_data["title"]; ?></span><br>
                                            <span class="fw-bold  p-2">000001</span>
                                        </td>
                                        <td class="fw-bold fs-6  pt-4 text-center border border-dark">Rs. <?php echo $product_data["price"]; ?> .00</td>
                                        <td class="fw-bold fs-6 text-end pt-4 border border-dark text-center"><?php echo $invoice_data["qty"]; ?></td>
                                        <td class="fw-bold fs-6 text-end pt-4 text-center">Rs. <?php echo $invoice_data["total"]; ?> .00</td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <?php
                                    $city_rs = Database::search("SELECT * FROM `city` WHERE `id`='" . $address_data["city_id"] . "'");
                                    $city_data = $city_rs->fetch_assoc();

                                    $delivery = 0;
                                    if ($city_data["district_id"] == 3) {
                                        $delivery = $product_data["delivery_fee_colombo"];
                                    } else {
                                        $delivery = $product_data["delivery_fee_other"];
                                    }
                                    $t = $invoice_data["total"];
                                    $g = $t - $delivery;
                                    ?>
                                    <tr>
                                        <td colspan="3" class="border-0"></td>
                                        <td class="fs-5 text-end fw-bold">SUBTOTAL</td>
                                        <td class="text-end">Rs. <?php echo $g; ?> .00</td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" class="border-0"></td>
                                        <td class="fs-5 text-end fw-bold border-primary">Delivery Fee</td>
                                        <td class="text-end border-primary">Rs. <?php echo $delivery; ?> .00</td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" class="border-0"></td>
                                        <td class="fs-5 text-end fw-bold border-primary text-primary">GRAND TOTAL</td>
                                        <td class="text-end border-primary text-primary fw-bold">Rs. <?php echo $t; ?> .00</td>
                                    </tr>
                                </tfoot>

                            </table>
                        </div>

                        <div class="col-6">
                            <hr class="border border-1 border-primary" />
                        </div>
                        <div class="col-12 btn-toolbar justify-content-start mb-3">
                            <button class="btn btn-primary me-2" onclick="printinvoice();"><i class="bi bi-printer-fill"></i> print</button>
                            <button class="btn btn-danger me-2"><i class="bi bi-filetype-pdf"></i> Export as PDF</button>
                        </div>

                    </div>
                </div>
            <?php
            }
            ?>

            

        </div>
    </div>
    <?php include "footer.php"; ?>
</body>

</html>