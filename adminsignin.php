<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin Sign In | E-lap</title>

    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />
    <link rel="icon" href="resource/shop-logo.svg" />
</head>

<body style="background-color: #74EBD5;background-image: linear-gradient(90deg,#D7FF33 0%,#33F6FF  100%);">

            <div class="col-12 mt-lg-4">
                <div class="row">

                    <div class="col-12 logo"></div>
                    <div class="col-12 mt-lg-4 mt-2">
                        <p class="text-center title1"> Welcome to our E-lap Center.</p>
                    </div>

                </div>
            </div>

            <div class="col-12 p-5">
                <div class="row">

                    <div class="col-6 d-none d-lg-block backgroundadmin " style="margin-top: -30px;"></div>
                    <div class="offset-lg-1 col-12 col-lg-6 d-block">
                        <div class="row g-3">
                            <div class="col-12">
                                <p class="fs-3 fw-bold">Admin Sign In </p>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" placeholder="ex : abc@gmail.com" id="e" />
                            </div>
                            <div class="col-12 col-lg-6 d-grid">
                                <button class="btn btn-primary" onclick="adminverification();">Send Verification Code</button>
                            </div>
                            <div class="col-12 col-lg-6 d-grid">
                                <button class="btn btn-danger" onclick="window.location='index.php'; ">Back to Log In</button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <!--  -->

            <div class="modal" tabindex="-1" id="verificationModal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Admin Verification</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <label class="form-label">Enter Your Verification Code</label>
                            <input type="text" class="form-control" id="vcode">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" onclick="verify();">Verify</button>
                        </div>
                    </div>
                </div>
            </div>

            <!--  -->

            <div class="col-12 fixed-bottom text-center">
                <p>&copy; 2022 e-lap.lk | All Rights Reserved</p>
                <p class="fw-bold">E-lap &trade;</p>
            </div>

    <script src="bootstrap.bundle.js"></script>
    <script src="script.js"></script>
</body>

</html>