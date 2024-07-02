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
                                            <label class="form-label fs-4 text-danger fw-bold">Manage Users</label>
                                        </div>

                                        <div class="col-12">
                                            <hr>
                                        </div>

                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-6 offset-2">
                                                    <input class="form-control" type="text">
                                                </div>
                                                <div class="col-2 d-grid">
                                                    <button class="btn btn-primary">Search</button>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <hr>
                                        </div>

                                        <div class="col-12 mt-lg-4">
                                            <table class="table">

                                                <thead>
                                                    <tr class="border border-1 border-secondary">
                                                        <th>#</th>
                                                        <th class="text-center">Profile Image</th>
                                                        <th class="text-center">Email</th>
                                                        <th class="text-center">Mobile</th>
                                                        <th class="text-center">Register Date</th>
                                                        <th class="text-center">Block & Unblock</th>
                                                    </tr>
                                                </thead>
                                                <?php

                                                $query = "SELECT * FROM `user`";
                                                $pageno;

                                                if (isset($_GET["page"])) {
                                                    $pageno = $_GET["page"];
                                                } else {
                                                    $pageno = 1;
                                                }

                                                $user_rs = Database::search($query);
                                                $user_num = $user_rs->num_rows;

                                                $results_per_page = 20;
                                                $number_of_pages = ceil($user_num / $results_per_page);

                                                $page_results = ($pageno - 1) * $results_per_page;
                                                $selected_rs =  Database::search($query . " LIMIT " . $results_per_page . " OFFSET " . $page_results . "");

                                                $selected_num = $selected_rs->num_rows;

                                                for ($x = 0; $x < $selected_num; $x++) {
                                                    $selected_data = $selected_rs->fetch_assoc();
                                                ?>
                                                    <tbody>
                                                        <tr class="border border-dark" style="height: 72px;">
                                                            <td class="bg-warning text-black fs-3 text-center"><?php echo $x + 1 ?></td>
                                                            <td class="border border-dark text-center">

                                                                <img src="resource/p1.jpg" style="height: 60px;"><br>

                                                            </td>
                                                            <td class="fw-bold fs-6  pt-4 text-center border border-dark"><?php echo $selected_data["email"] ?></td>
                                                            <td class="fw-bold fs-6 text-end pt-4 text-center border border-dark"><?php echo $selected_data["mobile"] ?></td>
                                                            <td class="fw-bold fs-6 text-end pt-4 text-center border border-dark"><?php echo $selected_data["join_date"] ?></td>
                                                            <td><?php

                                                                if ($selected_data["status"] == 1) {

                                                                ?>
                                                                    <button class="btn btn-danger" id="ub<?php echo $selected_data['email']; ?>" onclick="blockuser('<?php echo $selected_data['email']; ?>');">Block</button>
                                                                <?php

                                                                } else {
                                                                ?>
                                                                    <button class="btn btn-success" id="ub<?php echo $selected_data['email']; ?>" onclick="blockuser('<?php echo $selected_data['email']; ?>');">Unblock</button>
                                                                <?php

                                                                }

                                                                ?>
                                                            </td>
                                                        </tr>

                                                    </tbody>
                                                <?php

                                                }

                                                ?>

                                            </table>
                                        </div>

                                    </div>
                                    <!--  -->
                                    <div class="offset-2 offset-lg-3 col-8 col-lg-6 text-center mb-3 mt-3">
                                        <nav aria-label="Page navigation example">
                                            <ul class="pagination pagination-lg justify-content-center">
                                                <li class="page-item">
                                                    <a class="page-link" href="<?php if ($pageno <= 1) {
                                                                                    echo ("#");
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
                                                            <a class="page-link" href="<?php echo "?page=" . ($x) ?>"><?php echo $x; ?></a>
                                                        </li>
                                                    <?php
                                                    } else {
                                                    ?>
                                                        <li class="page-item">
                                                            <a class="page-link" href="<?php echo "?page=" . ($x) ?>"><?php echo $x; ?></a>
                                                        </li>
                                                <?php
                                                    }
                                                }

                                                ?>

                                                <li class="page-item">
                                                    <a class="page-link" href="<?php if ($pageno >= $number_of_pages) {
                                                                                    echo ("#");
                                                                                } else {
                                                                                    echo "?page=" . ($pageno + 1);
                                                                                } ?>" aria-label="Next">
                                                        <span aria-hidden="true">&raquo;</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </nav>
                                    </div>
                                    <!--  -->
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