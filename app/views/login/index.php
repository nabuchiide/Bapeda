<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 maximum-scale=1, user-scalable=no">
    <title><?= $data['judul']; ?></title>
    <meta content="Admin Dashboard" name="description" />
    <meta content="Mannatthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <link rel="icon" href="<?= BASEURL ?>/assets/images/favicon-logo.ico">

    <link href="<?= BASEURL ?>/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="<?= BASEURL ?>/assets/css/icons.css" rel="stylesheet" type="text/css">
    <link href="<?= BASEURL ?>/assets/css/style.css" rel="stylesheet" type="text/css">

</head>

<body class="fixed-left ">
    <!-- Begin page -->
    <div class="wrapper-page ">
        <div class="card">
            <div class="card-body">
                <div class="col offset-md-2">
                    <div class="row justify-content-md-center">
                        <div class="col-md-2 mt-1">
                            <a href="index.html" class="logo logo-admin"><img src="<?= BASEURL ?>/assets/images/bappeda-logo.png" height="70" alt="logo"></a>
                        </div>
                        <div class="col mt-1">
                            <h3 class="mb-0">BAPPEDA</h3>
                            <h6 class="mt-0">Kabupaten Karawang</h6>
                        </div>
                    </div>
                </div>
                <?php Flasher::flashMsg(); ?>

                <div class="px-3 pb-3">
                    <form class="form-horizontal m-t-20" action="login/login_process" method="POST">

                        <div class="form-group row">
                            <div class="col-12">
                                <input class="form-control" type="text" required="" placeholder="" name="user_name">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-12">
                                <input class="form-control" type="password" required="" placeholder="" name="password">
                            </div>
                        </div>


                        <div class="form-group text-center row m-t-20">
                            <div class="col-12">
                                <button class="btn btn-danger btn-block waves-effect waves-light" type="submit">Log In</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>



    <!-- jQuery  -->
    <script src="<?= BASEURL ?>/assets/js/jquery.min.js"></script>
    <script src="<?= BASEURL ?>/assets/js/popper.min.js"></script>
    <script src="<?= BASEURL ?>/assets/js/bootstrap.min.js"></script>
    <script src="<?= BASEURL ?>/assets/js/modernizr.min.js"></script>
    <script src="<?= BASEURL ?>/assets/js/detect.js"></script>
    <script src="<?= BASEURL ?>/assets/js/fastclick.js"></script>
    <script src="<?= BASEURL ?>/assets/js/jquery.blockUI.js"></script>
    <script src="<?= BASEURL ?>/assets/js/waves.js"></script>
    <script src="<?= BASEURL ?>/assets/js/jquery.nicescroll.js"></script>

    <!-- App js -->
    <script src="<?= BASEURL ?>/assets/js/app.js"></script>

</body>

</html>