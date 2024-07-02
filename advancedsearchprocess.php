<?php

require "connection.php";

$txt = $_POST["t"];
$category = $_POST["c"];
$brand = $_POST["b"];
$model = $_POST["m"];
$condition = $_POST["con"];
$colour = $_POST["col"];
$price_from = $_POST["pf"];
$price_to = $_POST["pt"];
$sort = $_POST["s"];

$query = "SELECT * FROM `product`";
$status = 0;

if ($sort == 0) {

    if (!empty($txt)) {
        $query .= " WHERE `title` LIKE '%" . $txt . "%'";
        $status = 1;
    }

    if ($status == 0 && $category != 0) {
        $query .= " WHERE `category_id`='" . $category . "'";
        $status = 1;
    } else if ($status != 0 && $category != 0) {
        $query .= " AND `category_id`='" . $category . "'";
    }

    $pid = 0;
    if ($brand != 0 && $model == 0) {

        $brand_rs = Database::search("SELECT * FROM `brand_has_model` WHERE `brand_id`='" . $brand . "'");
        $brand_num = $brand_rs->num_rows;
        for ($x = 0; $x < $brand_num; $x++) {
            $brand_data = $brand_rs->fetch_assoc();
            $pid = $brand_data["id"];
        }

        if ($status == 0) {
            $query .= " WHERE `brand_has_model_id`='" . $pid . "'";
            $status = 1;
        } else if ($status != 0) {
            $query .= " AND `brand_has_model_id`='" . $pid . "'";
        }
    }

    if ($brand == 0 && $model != 0) {

        $model_rs = Database::search("SELECT * FROM `brand_has_model` WHERE `model_id`='" . $model . "'");
        $model_num = $model_rs->num_rows;
        for ($x = 0; $x < $model_num; $x++) {
            $model_data = $model_rs->fetch_assoc();
            $pid = $model_data["id"];
        }

        if ($status == 0) {
            $query .= " WHERE `brand_has_model_id`='" . $pid . "'";
            $status = 1;
        } else if ($status != 0) {
            $query .= " AND `brand_has_model_id`='" . $pid . "'";
        }
    }

    if ($brand != 0 && $model != 0) {

        $brand_has_model_rs = Database::search("SELECT * FROM `brand_has_model` WHERE `brand_id`='" . $brand . "' 
        AND `model_id`='" . $model . "'");
        $brand_has_model_num = $brand_has_model_rs->num_rows;
        for ($x = 0; $x < $brand_has_model_num; $x++) {
            $brand_has_model_data = $brand_has_model_rs->fetch_assoc();
            $pid = $brand_has_model_data["id"];
        }

        if ($status == 0) {
            $query .= " WHERE `brand_has_model_id`='" . $pid . "'";
            $status = 1;
        } else if ($status != 0) {
            $query .= " AND `brand_has_model_id`='" . $pid . "'";
        }
    }

    if ($status == 0 && $condition != 0) {
        $query .= " WHERE `condition_id`='" . $condition . "'";
        $status = 1;
    } else if ($status != 0 && $condition != 0) {
        $query .= " AND `condition_id`='" . $condition . "'";
    }

    if ($status == 0 && $colour != 0) {
        $query .= " WHERE `colour_id`='" . $colour . "'";
        $status = 1;
    } else if ($status != 0 && $colour != 0) {
        $query .= " AND `colour_id`='" . $colour . "'";
    }

    if (!empty($price_from) && empty($price_to)) {
        if ($status == 0) {
            $query .= " WHERE `price` >= '" . $price_from . "'";
            $status = 1;
        } else if ($status != 0) {
            $query .= " AND `price` >= '" . $price_from . "'";
        }
    } else if (empty($price_from) && !empty($price_to)) {
        if ($status == 0) {
            $query .= " WHERE `price` <= '" . $price_to . "'";
            $status = 1;
        } else if ($status != 0) {
            $query .= " AND `price` <= '" . $price_to . "'";
        }
    } else if (!empty($price_from) && !empty($price_to)) {
        if ($status == 0) {
            $query .= " WHERE `price` BETWEEN '" . $price_from . "' AND '" . $price_to . "'";
            $status = 1;
        } else if ($status != 0) {
            $query .= " AND `price` BETWEEN '" . $price_from . "' AND '" . $price_to . "'";
        }
    }
} else if ($sort == 1) {
    if (!empty($txt)) {
        $query .= " WHERE `title` LIKE '%" . $txt . "%' ORDER BY `price` DESC";
        $status = 1;
    }
} else if ($sort == 2) {
    if (!empty($txt)) {
        $query .= " WHERE `title` LIKE '%" . $txt . "%' ORDER BY `price` ASC";
        $status = 1;
    }
} else if ($sort == 3) {
    if (!empty($txt)) {
        $query .= " WHERE `title` LIKE '%" . $txt . "%' ORDER BY `qty` DESC";
        $status = 1;
    }
} else if ($sort == 4) {
    if (!empty($txt)) {
        $query .= " WHERE `title` LIKE '%" . $txt . "%' ORDER BY `qty` ASC";
        $status = 1;
    }
}

?>

<div class="row">
    <div class="offset-lg-1 col-12 col-lg-12 text-center">
        <div class="row">
            <?php

            if ("0" != ($_POST["page"])) {
                $pageno = $_POST["page"];
            } else {
                $pageno = 1;
            }

            $product_rs = Database::search($query);
            $product_num = $product_rs->num_rows;

            $results_per_page = 12;
            $number_of_pages = ceil($product_num / $results_per_page);

            $page_results = ($pageno - 1) * $results_per_page;
            $selected_rs =  Database::search($query . " LIMIT " . $results_per_page . " OFFSET " . $page_results . "");

            $selected_num = $selected_rs->num_rows;

            for ($x = 0; $x < $selected_num; $x++) {
                $selected_data = $selected_rs->fetch_assoc();

            ?>

                <div class="card col-6 col-lg-2 mt-2 mb-2" style="width: 18rem;">

                    <?php

                    $product_img_rs = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $selected_data["id"] . "'");
                    $product_img_data = $product_img_rs->fetch_assoc();

                    ?>

                    <img src="<?php echo $product_img_data["code"]; ?>" class="card-img-top img-thumbnail mt-2" style="height:180px;" />
                    <div class="card-body ms-0 m-0 text-center">
                        <h5 class="card-title fs-6 fw-bold"><?php echo $selected_data["title"]; ?> <span class="badge bg-info">New</span></h5>
                        <span class="card-text text-primary">Rs. <?php echo $selected_data["price"]; ?> .00</span> <br />

                        <?php

                        if ($selected_data["qty"] > 0) {

                        ?>
                            <span class="card-text text-warning fw-bold">In Stock</span> <br />
                            <span class="card-text text-success fw-bold"><?php echo $selected_data["qty"]; ?> Items Available</span><br /><br />
                            <button class="col-12 btn text-white" style="background-color: #78CA78 ;">Buy Now</button>
                            <button class="col-12 btn mt-2 text-white" style="background-color: #06C292 ;">Add to Cart</button>

                        <?php


                        } else {

                        ?>
                            <span class="card-text text-danger fw-bold">Out of Stock</span> <br />
                            <span class="card-text text-danger fw-bold">00 Items Available</span><br /><br />
                            <button class="col-12 btn btn-success disabled">Buy Now</button>
                            <button class="col-12 btn btn-danger mt-2 disabled">Add to Cart</button>

                        <?php

                        }

                        ?>

                        <button class="col-12 btn btn-outline-light mt-2 "><i class="bi bi-heart-fill  fs-5" style="color: #A713C8 ;"></i></button>

                    </div>
                </div>

            <?php
            }

            ?>

        </div>
    </div>
    <!--  -->
    <div class="offset-2 offset-lg-3 col-8 col-lg-6 text-center mb-3">
        <nav aria-label="Page navigation example">
            <ul class="pagination pagination-lg justify-content-center">
                <li class="page-item">
                    <a class="page-link" <?php if ($pageno <= 1) {
                                                echo ("#");
                                            } else {
                                            ?> onclick="basicSearch(<?php echo ($pageno - 1) ?>);" <?php
                                                                                                } ?> aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <?php

                for ($x = 1; $x <= $number_of_pages; $x++) {
                    if ($x == $pageno) {
                ?>
                        <li class="page-item active">
                            <a class="page-link" onclick="basicSearch(<?php echo ($x) ?>);"><?php echo $x; ?></a>
                        </li>
                    <?php
                    } else {
                    ?>
                        <li class="page-item">
                            <a class="page-link" onclick="basicSearch(<?php echo ($x) ?>);"><?php echo $x; ?></a>
                        </li>
                <?php
                    }
                }

                ?>

                <li class="page-item">
                    <a class="page-link" <?php if ($pageno >= $number_of_pages) {
                                                echo ("#");
                                            } else {
                                            ?> onclick="basicSearch(<?php echo ($pageno + 1) ?>);" <?php
                                                                                                } ?> aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
    <!--  -->
</div>