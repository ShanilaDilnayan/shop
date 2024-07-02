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
                                            <label class="form-label fs-4 text-danger fw-bold">Dash Borad</label>
                                        </div>

                                        <div class="col-12">
                                            <hr>
                                        </div>

                                        <div class="col-12">
                                            <div class="row justify-content-center">
                                                <div class="col-3 bg-light rounded mx-3 border border-2 border-dark">
                                                    <label class="mt-3"><i class="bi bi-cash-coin fs-1"></i></label><br>
                                                    <label class="fs-5  fw-bold">Daily Earnings</label><br>
                                                    <?php

                                                    $today = date("Y-m-d");
                                                    $thismonth = date("m");
                                                    $thisyear = date("Y");

                                                    $a = "0";
                                                    $b = "0";
                                                    $c = "0";
                                                    $e = "0";
                                                    $f = "0";

                                                    $invoice_rs = Database::search("SELECT * FROM `invoice`");
                                                    $invoice_num = $invoice_rs->num_rows;

                                                    for ($x = 0; $x < $invoice_num; $x++) {
                                                        $invoice_data = $invoice_rs->fetch_assoc();

                                                        $f = $f  + $invoice_data["qty"]; //total qty

                                                        $d =  $invoice_data["date"];
                                                        $splitdate = explode(" ", $d); //separate date from time
                                                        $pdate = $splitdate[0]; //sold date

                                                        if ($pdate == $today) {
                                                            $a = $a + $invoice_data["total"];
                                                            $c = $c + $invoice_data["qty"];
                                                        }

                                                        $splitmonth = explode("-", $pdate); //separate date as year,month & date
                                                        $pyear = $splitmonth[0]; //year
                                                        $pmonth = $splitmonth[1]; //month

                                                        if ($pyear == $thisyear) {
                                                            if ($pmonth == $thismonth) {
                                                                $b = $b + $invoice_data["total"];
                                                                $e = $e + $invoice_data["qty"];
                                                            }
                                                        }
                                                    }

                                                    ?>
                                                    <span class="fw-bold ">Rs. <?php echo $a; ?> .00</span>
                                                </div>
                                                <div class="col-3 bg-light rounded mx-3 border border-2 border-dark ">
                                                    <label class="mt-3"><i class="bi bi-cash-coin fs-1"></i></label><br>
                                                    <label class="fs-5  fw-bold">Monthly Earnings</label><br>
                                                    <span class="fw-bold ">Rs. <?php echo $b; ?> .00</span>
                                                </div>
                                                <div class="col-3 bg-light rounded mx-3 border border-2 border-dark ">
                                                    <label class="mt-3"><i class="bi bi-bag-check-fill fs-1"></i></label><br>
                                                    <label class="fs-5  fw-bold">Today Sellings</label><br>
                                                    <span class="fw-bold "><?php echo $c; ?> Items</span>
                                                </div>
                                                <div class="col-3 bg-light rounded mx-3 border border-2 border-dark mt-4">
                                                    <label class="mt-3"><i class="bi bi-bag-check-fill fs-1"></i></label><br>
                                                    <label class="fs-5  fw-bold">Monthly Sellings</label><br>
                                                    <span class="fw-bold "><?php echo $e; ?> Items</span>
                                                </div>
                                                <div class="col-3 bg-light rounded mx-3 border border-2 border-dark mt-4">
                                                    <label class="mt-3"><i class="bi bi-bag-check-fill fs-1"></i></label><br>
                                                    <label class="fs-5  fw-bold">Total Sellings</label><br>
                                                    <span class="fw-bold "><?php echo $f; ?> Items</span>
                                                </div>
                                                <div class="col-3 bg-light rounded mx-3 border border-2 border-dark mt-4">
                                                    <label class="mt-3"><i class="bi bi-person-workspace fs-1"></i></label><br>
                                                    <label class="fs-5  fw-bold">Total Engagements</label><br>
                                                    <?php
                                                    $user_rs = Database::search("SELECT * FROM `user`");
                                                    $user_num = $user_rs->num_rows;
                                                    ?>
                                                    <span class="fw-bold "><?php echo $user_num; ?> Members</span>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-12">
                                            <hr>
                                        </div>

                                        <div class="col-10 text-start bg-light">
                                            <?php

                                            $start_date = new DateTime("2022-09-27 00:00:00");

                                            $tdate = new DateTime();
                                            $tz = new DateTimeZone("Asia/Colombo");
                                            $tdate->setTimezone($tz);

                                            $end_date = new DateTime($tdate->format("Y-m-d H:i:s"));

                                            $difference = $end_date->diff($start_date);

                                            ?>
                                            <label class="form-label fs-5 fw-bold">Total Active Time :- &nbsp;&nbsp; <?php

                                                                                                                        echo $difference->format('%Y') . " Years " . $difference->format('%m') . " Months " .
                                                                                                                            $difference->format('%d') . " Days " . $difference->format('%H') . " Hours " .
                                                                                                                            $difference->format('%i') . " Minutes " . $difference->format('%s') . " Seconds ";

                                                                                                                        ?></label>
                                        </div>

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