<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Update Product | E-lap</title>
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="style.css" />

    <link rel="icon" href="resource/shop-logo.svg" />
</head>

<body>
    <div class="container-fluid">
        <div class="row gy-3">
            <?php include "header.php";

            require "connection.php";

            if (isset($_SESSION["u"])) {
                if (isset($_SESSION["p"])) {

            ?>

                    <div class="col-12 text-center mb-4">
                        <h2 class="h2 text-primary fw-bold">Update Product</h2>
                    </div>

                    <div class="col-12 ">
                        <div class="row">

                            <div class="col-12 col-lg-4 border-danger border-2 border-end ">
                                <div class="row  ">
                                    <div class="col-12">
                                        <label class="form-label fw-bold" style="font-size: 20px;">Select Product Category</label>
                                    </div>

                                    <div class="col-12 mb-4">
                                        <select class="form-select text-center bg-light" disabled>

                                            <?php
                                            $product = $_SESSION["p"];

                                            $category_rs = Database::search("SELECT * FROM `category` WHERE `id`='" . $product["category_id"] . "'");
                                            $category_data = $category_rs->fetch_assoc();

                                            ?>
                                            <option value=""><?php echo $category_data["name"]; ?></option>

                                        </select>
                                    </div>

                                    <div class="col-12 ">
                                        <label class="form-label fw-bold" style="font-size: 20px;">Select Product Brand</label>
                                    </div>

                                    <div class="col-12 mb-4">
                                        <select class="form-select text-center bg-light " disabled>

                                            <?php
                                            $brand_rs = Database::search("SELECT * FROM  `brand` WHERE `id` IN
(SELECT `brand_id` FROM `brand_has_model` WHERE `id`='" . $product["brand_has_model_id"] . "')");
                                            $brand_data = $brand_rs->fetch_assoc();
                                            ?>
                                            <option><?php echo $brand_data["name"]; ?></option>

                                        </select>
                                    </div>

                                    <div class="col-12 ">
                                        <label class="form-label fw-bold" style="font-size: 20px;">Select Product Model</label>
                                    </div>

                                    <div class="col-12 mb-4">
                                        <select class="form-select text-center bg-light " disabled>

                                            <?php
                                            $model_rs = Database::search("SELECT * FROM  `model` WHERE `id` IN
(SELECT `model_id` FROM `brand_has_model` WHERE `id`='" . $product["brand_has_model_id"] . "')");
                                            $model_data = $model_rs->fetch_assoc();
                                            ?>
                                            <option><?php echo $model_data["name"]; ?></option>

                                        </select>
                                    </div>
                                    <div class="col-12 ">
                                        <div class="row">
                                            <div class="col-12">
                                                <label class="form-label fw-bold" style="font-size: 20px;">Select Product Condition</label>
                                            </div>
                                            <?php

                                            if ($product["condition_id"] == 1) {

                                            ?>
                                                <div class="col-12 mb-4">
                                                    <div class="form-check form-check-inline mx-5">
                                                        <input class="form-check-input" type="radio" id="b" checked disabled />
                                                        <label class="form-check-label fw-bold" for="b">Brandnew</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" id="u" disabled />
                                                        <label class="form-check-label fw-bold" for="u">Used</label>
                                                    </div>
                                                </div>
                                            <?php
                                            } else {

                                            ?>
                                                <div class="col-12">
                                                    <div class="form-check form-check-inline mx-5">
                                                        <input class="form-check-input" type="radio" id="b" name="c" disabled>
                                                        <label class="form-check-label" for="b">Brandnew</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" id="u" name="c" checked disabled>
                                                        <label class="form-check-label" for="u">Used</label>
                                                    </div>
                                                </div>
                                            <?php
                                            }

                                            ?>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <label class="form-label fw-bold" style="font-size: 20px;">Select Product Colour</label>
                                    </div>
                                    <div class="col-12 mb-4">

                                        <?php

                                        $color_rs = Database::search("SELECT * FROM `colour` WHERE `id`='" . $product["colour_id"] . "'");
                                        $color_data = $color_rs->fetch_assoc();

                                        ?>
                                        <select class="form-select  bg-light" disabled>
                                            <option><?php echo $color_data["name"] ?></option>
                                        </select>
                                    </div>

                                </div>
                            </div>

                            <div class="col-12 col-lg-4 border-danger border-2 border-end">
                                <div class="row ">

                                    <div class="col-12">
                                        <label class="form-label fw-bold" style="font-size: 20px;"> Add a Title to your Product</label>
                                    </div>
                                    <div class="col-12 mb-4">
                                        <input type="text" class="form-control"  value="<?php echo $product["title"]; ?>" id="t" />
                                    </div>
                                    <div class="col-12 mb-4">
                                        <div class="row">
                                            <div class="col-12">
                                                <label class="form-label fw-bold" style="font-size: 20px;">Add Product Quantity</label>
                                            </div>
                                            <div class="col-12 col-lg-8">
                                                <input type="number" class="form-control" value="<?php echo $product["qty"] ?>" min="0" id="q" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 ">
                                        <label class="form-label fw-bold" style="font-size: 20px;">Cost Per Item</label>
                                    </div>
                                    <div class="offset-0  col-12 col-lg-8 mb-4">
                                        <div class="input-group mb-2 mt-2">
                                            <span class="input-group-text">Rs.</span>
                                            <input type="text" class="form-control" disabled value="<?php echo $product["price"] ?>" />
                                            <span class="input-group-text">.00</span>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <label class="form-label fw-bold" style="font-size: 20px;">Delivery Cost</label>
                                    </div>
                                    <div class="col-12 ">
                                        <div class="row">
                                            <div class="col-12 offset-lg-1 col-lg-3">
                                                <label class="form-label">Delivery cost Within Colombo</label>
                                            </div>
                                            <div class="col-12 col-lg-8">
                                                <div class="input-group mb-2 mt-2">
                                                    <span class="input-group-text">Rs.</span>
                                                    <input type="text" class="form-control" id="dwc" value="<?php echo $product["delivery_fee_colombo"] ?>" />
                                                    <span class="input-group-text">.00</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 ">
                                        <div class="row">
                                            <div class="col-12 offset-lg-1 col-lg-3">
                                                <label class="form-label">Delivery cost out of Colombo</label>
                                            </div>
                                            <div class="col-12 col-lg-8">
                                                <div class="input-group mb-2 mt-2">
                                                    <span class="input-group-text">Rs.</span>
                                                    <input type="text" class="form-control" id="doc" value="<?php echo $product["delivery_fee_other"] ?>" />
                                                    <span class="input-group-text">.00</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>

                            <div class="col-12 col-lg-4">
                                <div class="row">

                                    <div class="col-12">
                                        <label class="form-label fw-bold" style="font-size: 20px;">Approved Payment Methods</label>
                                    </div>
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-3 pm pm1"></div>
                                            <div class="col-3 pm pm2"></div>
                                            <div class="col-3 pm pm3"></div>
                                            <div class="col-3 pm pm4"></div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-12">
                        <hr class="border border-dark" />
                    </div>

                    <div class="col-12">
                        <div class="row">
                            <div class="col-12 col-lg-6">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-12">
                                            <label class="form-label fw-bold" style="font-size: 20px;">Product Description</label>
                                        </div>
                                        <div class="col-12">
                                            <textarea cols="30" rows="10" class="form-control" id="d"><?php echo $product["description"]; ?> </textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-12 text-center">
                                            <label class="form-label fw-bold" style="font-size: 20px;">Add Product Images</label>
                                        </div>
                                        <?php

                                        $img = array();
                                        $img[0] = "resource/addproductimg.svg";
                                        $img[1] = "resource/addproductimg.svg";
                                        $img[2] = "resource/addproductimg.svg";

                                        $image_rs = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $product["id"] . "'");
                                        $image_num = $image_rs->num_rows;

                                        for ($x = 0; $x < $image_num; $x++) {
                                            $image_data = $image_rs->fetch_assoc();
                                            $img[$x] = $image_data["code"];
                                        }

                                        ?>
                                        <div class="offset-lg-2 col-12 col-lg-8">
                                            <div class="row">
                                                <div class="col-4 border border-primary rounded">
                                                    <img src="<?php echo $img[0]; ?>" class="img-fluid" style="height: 180px;" id="i0" />
                                                </div>
                                                <div class="col-4 border border-primary rounded">
                                                    <img src="<?php echo $img[1]; ?>" class="img-fluid" style="height: 180px;" id="i1" />
                                                </div>
                                                <div class="col-4 border border-primary rounded">
                                                    <img src="<?php echo $img[2]; ?>" class="img-fluid" style="height: 180px;" id="i2" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="offset-lg-3 col-12 col-lg-6 d-grid mt-3">
                                            <input type="file" class="d-none" id="imageuploader" multiple />
                                            <label for="imageuploader" class="col-12 btn btn-primary">Upload Images</label>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <hr class="border border-dark" />
                    </div>

                    <div class="offset-lg-4 col-12 col-lg-4 d-grid mt-3 mb-3">
                        <button class="btn btn-success" onclick="updateproduct();">Update Product</button>
                    </div>

            <?php

                } else {
                    header("Location:myproduct.php");
                }
            } else {
                header("Location: home.php");
            }

            ?>

            
        </div>
    </div>
    <?php include "footer.php" ?>
    <script src="script.js"></script>
</body>

</html>