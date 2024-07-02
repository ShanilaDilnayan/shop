<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>E-lap</title>

    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <link rel="icon" href="resource/shop-logo.svg" />

</head>

<body class="main-body">

    <div class="container-fluid vh-100 justify-content-center">
        <div class="row align-content-center">

            <div class="col-12 mb-5">
                <div class="col-12">
                    <div class="row mt-1  bg-light">

                        <div class=" offset-lg-1 col-3 col-lg-1  shop-logo" style="height: 60px;"></div>

                        <div class=" col-3 col-lg-2 align-self-start my-4 " style="margin-left: -25px;">
                            <span offset-lg-1><b>Welcom to Our Shop</b></span>
                        </div>

                        <div class="col-6 col-lg-5 text-center g-3 ">
                            <button class="btn btn-light" onclick="window.location='home.php';">HOME</button>
                            <button class="btn btn-light">ABOUT</button>
                            <button class="btn btn-light">SEVICES</button>
                            <button class="btn btn-light">SHOWCASE</button>
                            <button class="btn btn-light">BLOG</button>
                            <button class="btn btn-light">CONTACT</button>
                        </div>



                        <div class="col-3 col-lg-2 dropdown my-3">
                            <button class="btn btn-light dropdown-toggle fw-bold" type="button" onclick="f1();" data-bs-toggle="dropdown" aria-expanded="false">
                                E-lap
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">My Profile</a></li>
                                <li><a class="dropdown-item" href="#">My Sellings</a></li>
                                <li><a class="dropdown-item" href="myproduct.php">My Products</a></li>
                                <li><a class="dropdown-item" href="watchlist.php">Wishlist</a></li>
                                <li><a class="dropdown-item" href="#">Purchase History</a></li>
                                <li><a class="dropdown-item" href="#">Message</a></li>
                                <li><a class="dropdown-item" href="#">Saved</a></li>
                            </ul>
                        </div>

                        <div class=" col-6 col-lg-1 mt-3 mb-3">
                            <button class="btn btn-warning" onclick="window.location = 'adminsignin.php';">Admin</button>
                        </div>

                    </div>
                </div>
            </div>
            <!-- content -->
            <div class="col-12 p-3 mt-5">
                <div class="row">

                    <div class="col-12 col-lg-6" id="signupbox">
                        <div class="row g-2">
                            <div class="col-12">
                                <p class="title2">Create New Account</p>
                            </div>

                            <div class="col-12 d-none" id="msgdiv">
                                <div class="alert alert-danger" role="alert" id="alertdiv">
                                    <i class="bi bi-x-octagon-fill fs-5" id="msg">

                                    </i>

                                </div>
                            </div>

                            <div class="col-6">
                                <label class="form-lable">First Name</label>
                                <input type="text" class="form-control" id="f" />
                            </div>

                            <div class="col-6">
                                <label class="form-lable">Last Name</label>
                                <input type="text" class="form-control" id="l" />
                            </div>

                            <div class="col-12">
                                <label class="form-lable">Email</label>
                                <input type="email" class="form-control" id="e" />
                            </div>

                            <div class="col-12">
                                <label class="form-lable">Password</label>
                                <input type="password" class="form-control" id="p" />
                            </div>

                            <div class="col-6">
                                <label class="form-lable">Mobile</label>
                                <input type="text" class="form-control" id="m" />
                            </div>

                            <div class="col-6">
                                <label class="form-lable">Gender</label>
                                <select class="form-select" id="g">
                                    <?php

                                    require "connection.php";

                                    $rs = Database::search("SELECT * FROM `gender`");
                                    $n = $rs->num_rows;

                                    for ($x = 0; $x < $n; $x++) {
                                        $d = $rs->fetch_assoc();

                                    ?>

                                        <option value="<?php echo $d["id"]; ?>"><?php echo $d["gender_name"]; ?></option>

                                    <?php

                                    }

                                    ?>
                                </select>
                            </div>
                            <div class="col-12 col-lg-6 d-grid">
                                <button class="btn btn-primary" onclick="signup();">Sign Up</button>
                            </div>
                            <div class="col-12 col-lg-6 d-grid">
                                <button class="btn btn-primary" onclick="changeView();">Already have an account? Sign In</button>
                            </div>
                        </div>
                    </div>


                    <div class="col-12 col-lg-6  d-none" id="signinbox">
                        <div class="row g-2">
                            <div class="col-12">
                                <p class="title3">Sign In</p>
                                <span class="text-danger" id="msg2"></span>
                            </div>

                            <?php

                            $email = "";
                            $password = "";

                            if (isset($_COOKIE["email"])) {
                                $email = $_COOKIE["email"];
                            }

                            if (isset($_COOKIE["password"])) {
                                $password = $_COOKIE["password"];
                            }

                            ?>

                            <div class="col-12">
                                <label class="form-lable">Email</label>
                                <input type="email" class="form-control" id="email2" value="<?php echo $email; ?>" />
                            </div>
                            <div class="col-12">
                                <label class="form-lable">Password</label>
                                <input type="password" class="form-control" id="password2" value="<?php echo $password; ?>" />
                            </div>

                            <div class="col-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="rememberme">
                                    <label class="form-check-label"> Remember Me </label>
                                </div>
                            </div>

                            <div class="col-6 text-end">
                                <a href="#" class="link-primary" onclick="forgotPassword();">Forgot Password ?</a>
                            </div>

                            <div class="col-12 col-lg-6 d-grid">
                                <button class="btn btn-primary" onclick="signIn();">Sign In</button>
                            </div>
                            <div class="col-12 col-lg-6 d-grid">
                                <button class="btn btn-danger" onclick="changeView();">New to Electro? Join Now</button>
                            </div>

                        </div>
                    </div>
                    <div class="col-6 d-none d-lg-block background1"></div>

                </div>
            </div>
            <!-- content -->

            <!-- modal -->

            <div class="modal" tabindex="-1" id="forgotPasswordModal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Reset Password</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row g-3">

                                <div class="col-6">
                                    <label class="form-lable1">New Password</label>
                                    <div class="input-group mb-3">
                                        <input type="password" class="form-control" id="npi" />
                                        <button class="btn btn-outline-secondary" type="button" id="npb" onclick="showpassword1();"><i id="e1" class="bi bi-eye-slash-fill"></i></button>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <label class="form-lable1">Re-type Password</label>
                                    <div class="input-group mb-3">
                                        <input type="password" class="form-control" id="rnp" />
                                        <button class="btn btn-outline-secondary" type="button" id="rnpb" onclick="showpassword2();"><i id="e2" class="bi bi-eye-slash-fill"></i></button>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <label class="form-lable1">Verification code</label>
                                    <input type="text" class="form-control" id="vc" />
                                </div>

                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" onclick="resetpw();">Reset Password</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- modal -->

            <!-- footer -->

            <div class="col-12 fixed-bottom d-none d-lg-block">
                <p class="text-center">&copy; 2022 E-lap.lk || All Right Reserved</p>
            </div>

            <!-- footer -->

        </div>

    </div>

    <script src="script.js"></script>
    <script src="bootstrap.js"></script>
</body>

</html>