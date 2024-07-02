<?php

require "connection.php";

if (isset($_GET["id"])) {

    $pid = $_GET["id"];

    $product_rs = Database::search("SELECT product.price,product.qty,product.description,product.title,
    product.datetime_added,product.delivery_fee_colombo,product.delivery_fee_other,product.category_id,
    product.brand_has_model_id,product.colour_id,product.status_id,product.condition_id,product.user_email,
    model.name AS mname,brand.name AS bname FROM `product` INNER JOIN `brand_has_model` ON
    brand_has_model.id = product.brand_has_model_id INNER JOIN `brand` ON brand.id = brand_has_model.brand_id INNER JOIN
    `model` ON model.id = brand_has_model.model_id WHERE product.id = '" . $pid . "'");

    $product_num = $product_rs->num_rows;

    if ($product_num == 1) {

        $product_data = $product_rs->fetch_assoc();

?>


        <!DOCTYPE html>

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">

            <title>Electro | Single Product</title>

            <link rel="stylesheet" href="bootstrap.css" />
            <link rel="stylesheet" href="style.css" />
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

            <link rel="icon" href="resource/shop-logo.svg" />
        </head>

        <body>

            <div class="container-fluid">
                <div class="row">

                    <?php include "header.php"; ?>

                    <div class="col-12 container-fluid mt-3">
                        <div class="row">
                            <div class="col-lg-6 mx-lg-3">
                                <div class="row">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Single Product View</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                            <hr class="border border-dark">
                        </div>
                    </div>

                    <div col-12>
                        <div class="row" >

                            <div class="col-12 col-lg-6" style="background-color: #74EBD5;background-image: linear-gradient(90deg,#FF0032 20%,#7E0A7E 100%);">
                                <div class=" border border-2 border-dark mb-3 mt-3 rounded bg-light">
                                    <div class="main-img" id="mainimg"></div>
                                </div>
                                <div class="row mb-3 ">
                                    <?php

                                    $image_rs = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $pid . "'");
                                    $image_num = $image_rs->num_rows;

                                    if ($image_num != 0) {

                                        for ($x = 0; $x < $image_num; $x++) {
                                            $image_data = $image_rs->fetch_assoc();
                                            $img[$x] = $image_data["code"];

                                    ?>

                                            <li class="d-flex flex-colum justify-content-center align-items-center
                                                 mb-1">
                                                <img src="<?php echo $img["$x"]; ?>" style="height: 170px;" class="img-thumbnail mt-1 mb-1" id="productimg<?php echo $x; ?>" onclick="loadmainimg(<?php echo $x; ?>);" />
                                            </li>

                                        <?php
                                        }
                                    } else {
                                        ?>
                                        <div class="col-4 d-none d-lg-block">
                                            <img class="img-thumbnail border border-dark" src="resource/empty.svg" style="height: 200px;">
                                        </div>
                                        <div class="col-4 d-none d-lg-block">
                                            <img class="img-thumbnail border border-dark" src="resource/empty.svg" style="height: 200px;">
                                        </div>
                                        <div class="col-4 d-none d-lg-block">
                                            <img class="img-thumbnail border border-dark" src="resource/empty.svg" style="height: 200px;">
                                        </div>
                                    <?php
                                    }

                                    ?>
                                </div>

                            </div>

                            <div class="col-12 col-lg-6 border border-2 border-danger rounded">

                                <div class="row border-bottom border-dark">
                                    <div class="col-12 my-2">
                                        <span class="fs-4 text-success fw-bold"><?php echo $product_data["title"]; ?></span>
                                    </div>
                                </div>

                                <div class="row border-bottom border-dark">
                                    <div class="col-12 my-2">
                                        <span class="badge">
                                            <i class="bi bi-star-fill text-warning fs-5"></i>
                                            <i class="bi bi-star-fill text-warning fs-5"></i>
                                            <i class="bi bi-star-fill text-warning fs-5"></i>
                                            <i class="bi bi-star-fill text-warning fs-5"></i>
                                            <i class="bi bi-star-fill text-warning fs-5"></i>

                                            &nbsp;&nbsp;

                                            <label class="fs-5 text-dark fw-bold">4.5 Stars | 39 Reviews & Ratings</label>
                                        </span>
                                    </div>
                                </div>

                                <?php

                                $price = $product_data["price"];
                                $adding_price = ($price / 100) * 5;
                                $new_price = $price + $adding_price;
                                $differnce = $new_price - $price;
                                $percentage = ($differnce / $price) * 100;

                                ?>

                                <div class="row border-bottom border-dark">
                                    <div class="col-12 my-2">
                                        <span class="fs-4 fw-bold text-dark">Rs. <?php echo $price; ?> .00</span>
                                        &nbsp;&nbsp; | &nbsp;&nbsp;
                                        <span class="fs-4 fw-bold text-danger text-decoration-line-through">Rs. <?php echo $new_price; ?> .00</span>
                                        &nbsp;&nbsp; | &nbsp;&nbsp;
                                        <span class="fs-6 fw-bold text-black-50">Save Rs. <?php echo $differnce; ?> .00 (5%)</span>
                                    </div>
                                </div>

                                <div class="row border-bottom border-dark">
                                    <div class="col-12 my-2">
                                        <span class="fs-5 fw-bold">Warrenty : </span><span class="text-primary">6 Months Warrenty</span><br />
                                        <span class="fs-5 fw-bold">Return Policy : </span><span class="text-primary">1 Months Return Policy</span><br />
                                        <span class="fs-5 fw-bold">In Stock : </span><span class="text-primary">10 Items Available</span><br />
                                    </div>
                                </div>

                                <div class="row border-bottom border-dark">
                                    <div class="col-12 my-3">
                                        <label class="form-label fs-4">Quantity</label>
                                        <input class="text-center rounded ms-3" type="text" value="1" id="qty_input" pattern="[0-9]">
                                    </div>
                                </div>

                                <div class="col-4 fw-bold mt-3 text-bg-primary rounded text-center ">
                                    <span class="mt-2">Fast Delivery Service</span>
                                </div>

                                <div class="col-6 mt-4">
                                    <select class="form-select fw-bold text-center">
                                        <option>Shipping Methode</option>
                                        <option>Postal Service</option>
                                        <option>Quriar Service</option>
                                    </select>
                                </div>

                                <div class="row">
                                    <div class="col-12 my-5">
                                        <div class="row">
                                            <div class="col-4 d-grid">
                                                <button class="btn btn-success" onclick="paynow(<?php echo $pid; ?>);">Buy Now</button>
                                            </div>
                                            <div class="col-4 d-grid">
                                                <button class="btn btn-primary" >Add To Cart</button>
                                            </div>
                                            <div class="col-4 d-grid">
                                                <button class="btn btn-light" >
                                                    <i class="bi bi-heart-fill fs-4 text-danger"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 border-start border-5 border-primary mt-3 mt-lg-5 mb-3 mb-lg-0 rounded" style="background-color: #e7f2ff;">
                                    <div class="row ms-3">
                                        <div class="col-12 mt-3 mb-3">
                                            <label class="form-label fw-bold fs-5">NOTICE : </label><br />
                                            <label class="form-label fs-6">Purchased items can return befor 7 days of Delivery.</label>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <hr class="mt-2">

                            <div class="col-12 mb-3">
                                <div class="row">
                                    <div class="col-12">
                                        <label class="form-label fs-4 fw-bold">Product Description : </label>
                                    </div>
                                    <div>
                                        <textarea cols="60" rows="10" class="form-control" readonly><?php echo $product_data["description"]; ?>  </textarea>
                                    </div>
                                </div>
                            </div>

                            <hr class="mt-2">

                            <div class="col-12">
                                <div class="row  mt-3 mb-3 border-bottom border-1 border-dark">
                                    <div class="col-12">
                                        <span class="fs-3 fw-bold">Related Items</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="row justify-content-center gap-2 mb-4"  style="background-color: #090C5B ;">

                                    <div class="card col-6 col-lg-2 mt-2 mb-2" style="width: 18rem;">

                                        <img src="resource/images/aser i7_0_63be3333414a4.jpeg" class="card-img-top img-thumbnail mt-2" style="height: 180px;" />
                                        <div class="card-body ms-0 m-0 text-center">
                                            <h5 class="card-title fs-6 fw-bold">Dell (i5) <span class="badge bg-info">New</span></h5>
                                            <span class="card-text text-primary">Rs. 300000 .00</span> <br />

                                            <span class="card-text text-warning fw-bold">In Stock</span> <br />
                                            <span class="card-text text-success fw-bold">19 Items Available</span><br /><br />
                                            <a href="#"  class="btn btn-outline-success mb-2">Buy Now</a><br>
                                            <a href=""  class="btn btn-outline-warning mb-2">Add to Cart</a>

                                            <button  class="col-12 btn btn-outline-light mt-2 border border-info">
                                                <i class="bi bi-heart-fill text-danger fs-5"></i>
                                            </button>

                                        </div>

                                    </div>
                                    <div class="card col-6 col-lg-2 mt-2 mb-2" style="width: 18rem;">

                                        <img src="resource/images/asuse i7_0_63be33413c21a.jpeg" class="card-img-top img-thumbnail mt-2" style="height: 180px;" />
                                        <div class="card-body ms-0 m-0 text-center">
                                            <h5 class="card-title fs-6 fw-bold">Aser (i7) <span class="badge bg-info">New</span></h5>
                                            <span class="card-text text-primary">Rs. 400000 .00</span> <br />

                                            <span class="card-text text-warning fw-bold">In Stock</span> <br />
                                            <span class="card-text text-success fw-bold">10 Items Available</span><br /><br />
                                            <a href="#"  class="btn btn-outline-success mb-2">Buy Now</a><br>
                                            <a href=""  class="btn btn-outline-warning mb-2">Add to Cart</a>

                                            <button  class="col-12 btn btn-outline-light mt-2 border border-info">
                                                <i class="bi bi-heart-fill text-danger fs-5"></i>
                                            </button>

                                        </div>

                                    </div>
                                    <div class="card col-6 col-lg-2 mt-2 mb-2" style="width: 18rem;">

                                        <img src="resource/images/Asuse_0_63be33098fa49.png" class="card-img-top img-thumbnail mt-2" style="height: 180px;" />
                                        <div class="card-body ms-0 m-0 text-center">
                                            <h5 class="card-title fs-6 fw-bold">Aser (i3) <span class="badge bg-info">New</span></h5>
                                            <span class="card-text text-primary">Rs. 260000 .00</span> <br />

                                            <span class="card-text text-warning fw-bold">In Stock</span> <br />
                                            <span class="card-text text-success fw-bold">5 Items Available</span><br /><br />
                                            <a href="#"  class="btn btn-outline-success mb-2">Buy Now</a><br>
                                            <a href="" class="btn btn-outline-warning mb-2">Add to Cart</a>

                                            <button  class="col-12 btn btn-outline-light mt-2 border border-info">
                                                <i class="bi bi-heart-fill text-danger fs-5"></i>
                                            </button>

                                        </div>

                                    </div>
                                    <div class="card col-6 col-lg-2 mt-2 mb-2" style="width: 18rem;">

                                        <img src="resource/images/dell i5 _0_63be33263935b.jpeg" class="card-img-top img-thumbnail mt-2" style="height: 180px;" />
                                        <div class="card-body ms-0 m-0 text-center">
                                            <h5 class="card-title fs-6 fw-bold">Asus (i7) <span class="badge bg-info">New</span></h5>
                                            <span class="card-text text-primary">Rs. 350000 .00</span> <br />

                                            <span class="card-text text-warning fw-bold">In Stock</span> <br />
                                            <span class="card-text text-success fw-bold">20 Items Available</span><br /><br />
                                            <a href="#"  class="btn btn-outline-success mb-2">Buy Now</a><br>
                                            <a href=""  class="btn btn-outline-warning mb-2">Add to Cart</a>

                                            <button  class="col-12 btn btn-outline-light mt-2 border border-info">
                                                <i class="bi bi-heart-fill text-danger fs-5"></i>
                                            </button>

                                        </div>

                                    </div>
                                    <div class="card col-6 col-lg-2 mt-2 mb-2" style="width: 18rem;">

                                        <img src="resource/images/Aser i7_0_63be33190add5.jpeg" class="card-img-top img-thumbnail mt-2" style="height: 180px;" />
                                        <div class="card-body ms-0 m-0 text-center">
                                            <h5 class="card-title fs-6 fw-bold">Dell inspiron (i3) <span class="badge bg-info">New</span></h5>
                                            <span class="card-text text-primary">Rs. 270000 .00</span> <br />

                                            <span class="card-text text-warning fw-bold">In Stock</span> <br />
                                            <span class="card-text text-success fw-bold">2 Items Available</span><br /><br />
                                            <a href="#"  class="btn btn-outline-success mb-2">Buy Now</a><br>
                                            <a href=""  class="btn btn-outline-warning mb-2">Add to Cart</a>

                                            <button  class="col-12 btn btn-outline-light mt-2 border border-info">
                                                <i class="bi bi-heart-fill text-danger fs-5"></i>
                                            </button>

                                        </div>

                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>



                    

                </div>
            </div>
            <?php include "footer.php"; ?>
            <script src="script.js"></script>
            <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>
        </body>

        </html>

<?php

    } else {
        echo ("Sorry for the Inconvenience");
    }
} else {
    echo ("Something went wrong !");
}

?>