<?php

session_start();

require "connection.php";

$user = $_SESSION["u"];

$time = $_POST["t"];
$qty = $_POST["q"];
$condition = $_POST["c"];

$query = "SELECT * FROM `product` WHERE `user_email`='" . $user["email"]. "'";

// if (!empty($search)) {
//     $query .= " AND `title` LIKE '%" . $search . "%'";
// }

if ($condition != "0") {
    $query .= " AND `condition_id` ='" . $condition . "'";
}

if ($time != "0") {
    if ($time == "1") {
        $query .= " ORDER BY `datetime_added` DESC";
    } else if ($time == "2") {
        $query .= " ORDER BY `datetime_added` ASC";
    }
}

if ($time != "0" &&  $qty != "0") {
    if ($qty == "1") {
        $query .= " ,`qty` DESC";
    } else if ($qty == "2") {
        $query .= " ,`qty` ASC";
    }
} else if ($time == "0" && $qty != "0") {
    if ($qty == "1") {
        $query .= " ORDER BY `qty` DESC";
    } else if ($qty == "2") {
        $query .= " ORDER BY `qty` ASC";
    }
}

?>

<div class="offset-1 col-10 text-center">
    <div class="row justify-content-center">

        <?php

        if ("0" != ($_POST["page"])) {
            $pageno = $_POST["page"];
        } else {
            $pageno = 1;
        }

        $product_rs = Database::search($query);
        $product_num = $product_rs->num_rows;

        $results_per_page = 6;
        $number_of_pages = ceil($product_num / $results_per_page);

        $page_results = ($pageno - 1) * $results_per_page;
        $selected_rs = Database::search($query. " LIMIT " . $results_per_page . " OFFSET " . $page_results . "");

        $selected_num = $selected_rs->num_rows;

        for ($x = 0; $x < $selected_num; $x++) {
            $selected_data = $selected_rs->fetch_assoc();

        ?>

            <!-- card -->
            <div class="card mb-3 mt-3 col-12 col-lg-6">
                <div class="row ">
                    <div class="col-md-4 mt-4">

                        <?php

                        $product_img_rs = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $selected_data["id"] . "'");
                        $product_img_data = $product_img_rs->fetch_assoc();

                        ?>
                        <img src="<?php echo $product_img_data["code"]; ?>" class="img-fluid rounded-start" />
                    </div>
                    <div class="col-md-8">
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
                                <div class="col-12 ">
                                    <div class="row g-1">
                                        <div class="col-12 col-lg-6 d-grid">
                                            <a class="btn  fw-bold text-white" style="background-color: #581845 ;" onclick="sendid(<?php echo$selected_data['id']; ?>);">Update</a>
                                        </div>
                                        <div class="col-12 col-lg-6 d-grid">
                                            <button class="btn fw-bold text-white" style="background-color: #C70039;">Delete</button>
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

<!--  -->