<?php

session_start();
require "connection.php";

if (isset($_SESSION["au"])) {

?>
<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Electro | Admin Panel</title>

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



                                <?php



if (isset($_SESSION["au"])) {

    $email = $_SESSION["au"]["email"];
    $pageno;

?>
    

    <body>
        <div class="container-fluid">
            <div class="row">

                <div class="col-12 bg-light">
                    <div class="row">
                        
                        <div class="col-12 ">
                            <div class="row">
                                <div class="col-12 col-lg-10 mt-2 my-lg-4">
                                    <h1 class="offset-4 offset-lg-2  fw-bold">My Products</h1>
                                </div>
                                <div class="col-12 col-lg-2 mx-2 mb-2 my-lg-4 mx-lg-0 d-grid">
                                    <button class="btn btn-dark fw-bold text-white" onclick="window.location='addproduct.php'">Add Product</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="border border-dark">

                <div class="col-12">
                    <div class="row  mx-1 mb-3 bg-light">
                        <div class="col-4 border text-center rounded">
                            <label class="form-label fs-4 fw-bold"><i class="bi bi-search"></i> Active Time</label><br>
                            <div class="col-6 offset-1">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="r1" id="n">
                                    <label class="form-check-label" for="n">
                                        Newest to oldest
                                    </label>
                                </div>
                            </div>
                            <div class="col-6 offset-1">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="r1" id="o">
                                    <label class="form-check-label" for="o">
                                        Oldest to newest
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-4 border  rounded text-center ">
                            <label class="form-label fs-4 fw-bold"><i class="bi bi-search"></i> By quantity</label><br>
                            <div class="col-6 offset-1">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="r2" id="h">
                                    <label class="form-check-label" for="h">
                                        High to low
                                    </label>
                                </div>
                            </div>
                            <div class="col-6 offset-1">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="r2" id="l">
                                    <label class="form-check-label" for="l">
                                        Low to high
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-4 border  rounded text-center ">
                            <label class="form-label fs-4 fw-bold"><i class="bi bi-search"></i> By condition</label><br>
                            <div class="col-6 offset-1">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="r3" id="b">
                                    <label class="form-check-label" for="b">
                                        Brandnew
                                    </label>
                                </div>
                            </div>
                            <div class="col-6 offset-1">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="r3" id="u">
                                    <label class="form-check-label" for="u">
                                        Used
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-6 col-lg-3 text-center mt-3 mb-3">
                    <div class="row g-2">
                        <div class="col-12 col-lg-6 d-grid">
                            <button class="btn fw-bold text-white" style="background-color: #1e81b0;" onclick="sort1(0);">Sort</button>
                        </div>
                        <div class="col-12 col-lg-6 d-grid">
                            <button class="btn fw-bold" style="background-color: #eab676;" onclick="clearsort();">Clear</button>
                        </div>
                    </div>
                </div>

                <hr class="border border-dark">

                <div class="col-12 border rounded mb-4 bg-secondary">
                    <div class="row mx-2" id="sort">

                        <?php

                        if (isset($_GET["page"])) {
                            $pageno = $_GET["page"];
                        } else {
                            $pageno = 1;
                        }

                        $product_rs = Database::search("SELECT * FROM `product` WHERE `user_email`='" . $email . "'");
                        $product_num = $product_rs->num_rows;

                        $results_per_page = 6;
                        $number_of_pages = ceil($product_num / $results_per_page);

                        $page_results = ($pageno - 1) * $results_per_page;
                        $selected_rs = Database::search("SELECT * FROM `product` WHERE `user_email`='" . $email . "' 
                                    LIMIT " . $results_per_page . " OFFSET " . $page_results . "");

                        $selected_num = $selected_rs->num_rows;

                        for ($x = 0; $x < $selected_num; $x++) {
                            $selected_data = $selected_rs->fetch_assoc();

                        ?>


                            <!-- card -->
                            <div class="card mb-3 mt-3 col-12 col-lg-3">
                                <div class="row">
                                    <div class="col-md-4 mt-4">
                                        <?php

                                        $product_img_rs = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $selected_data["id"] . "'");
                                        $product_img_data = $product_img_rs->fetch_assoc();

                                        ?>
                                        <img src="<?php echo $product_img_data["code"]; ?>" class="img-fluid rounded-start" />
                                    </div>
                                    <div class="col-md-8 mt-5">
                                        <div class="card-body">
                                            <h5 class="card-title fw-bold"><?php echo $selected_data["title"]; ?></h5>
                                            <span class="card-text fw-bold text-primary">Rs.<?php echo $selected_data["price"]; ?>.00</span><br />
                                            <span class="card-text fw-bold text-success"><?php echo $selected_data["qty"]; ?> Items left</span>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" role="switch" id="fd<?php echo $selected_data["id"]; ?>" <?php if ($selected_data["status_id"] == 2) { ?>checked<?php } ?> onclick="changestatus(<?php echo $selected_data['id']; ?>);" />
                                                <label class="form-check-label fw-bold text-info" for="fd <?php echo $selected_data["id"]; ?>">
                                                    <?php if ($selected_data["status_id"] == 2) { ?>
                                                        Make Your Product Active
                                                    <?php } else { ?>
                                                        Make Your Product Deactive
                                                    <?php
                                                    }
                                                    ?>
                                                </label>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="row g-1">
                                                        <div class="col-12 col-lg-6 d-grid">
                                                            <a class="btn  fw-bold text-white" style="background-color:#581845  ;" onclick="sendid(<?php echo $selected_data['id']; ?>);">Update</a>
                                                        </div>
                                                        <div class="col-12 col-lg-6 d-grid">
                                                            <button class="btn  fw-bold text-white" style="background-color:#C70039  ;">Delete</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- card -->

                        <?php
                        }

                        ?>


                    </div>
                </div>

                <div class="offset-2 offset-lg-3 col-8 col-lg-6 text-center mb-3">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination pagination-lg justify-content-center">
                            <li class="page-item">
                                <a class="page-link" href="<?php if ($pageno <= 1) {
                                                                echo "#";
                                                            } else {
                                                                echo "?page=" . ($pageno - 1);
                                                            } ?>" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                            <?php

                            for ($x = 1; $x <= $number_of_pages; $x++) {
                                if ($x == $pageno) {

                            ?>
                                    <li class="page-item active">
                                        <a class="page-link" href="<?php echo "?page=" . ($x); ?>"><?php echo $x; ?></a>
                                    </li>
                                <?php

                                } else {
                                ?>
                                    <li class="page-item ">
                                        <a class="page-link" href="<?php echo "?page=" . ($x); ?>"><?php echo $x; ?></a>
                                    </li>
                            <?php
                                }
                            }

                            ?>

                            <li class="page-item">
                                <a class="page-link" href="<?php if ($pageno >= $number_of_pages) {
                                                                echo "#";
                                                            } else {
                                                                echo "?page=" . ($pageno + 1);
                                                            } ?>" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>

                
            </div>
        </div>

        <script src="script.js"></script>
    </body>

    </html>
<?php
} else {

    header("Location:home.php");
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