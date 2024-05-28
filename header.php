<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.15.5/dist/sweetalert2.min.css">
<link href="clients/libs/css/select2.min.css" rel="stylesheet" />
<!-- bootstrap fontawesome -->
<link rel="stylesheet" href="clients/fontawesome/css/fontawesome.css">
<link rel="stylesheet" href="clients/fontawesome/css/solid.css">
<link rel="stylesheet" href="clients/fontawesome/css/brands.css">
<!-- datatable -->
<link rel="stylesheet" href="vendor/DataTables/datatables.css">
<link rel="stylesheet" href="vendor/DataTables/datatables.min.css">
<!-- theme stylesheet-->
<link rel="stylesheet" href="css/style.default.css" id="theme-stylesheet">
<?php include "tet.php"?>
<header class="header">
    <nav class="navbar">
        <div class="container-fluid">
        <div class="navbar-holder d-flex align-items-center justify-content-between">
            <div class="navbar-header"><a id="toggle-btn" href="#" class="menu-btn"><i class="fa fa-bars" aria-hidden="true"></i></a><a href="index.php" class="navbar-brand">
                <div class="brand-text d-none d-md-inline-block"><span><strong>DIGITAL -</strong></span><strong class="text-primary">Banking<i class="fa fa-university" aria-hidden="true"></i></strong></div></a></div>
            <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
            <!-- Log out-->
            <li class="nav-item"><a href="lock.php
            " class="nav-link logout"> <span class="d-none d-sm-inline-block"><?php echo $username; ?> Logout</span><i class="fa fa-sign-out"></i></a></li>
            </ul>
        </div>
        </div>
    </nav>
</header>


    <!-- JavaScript files-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper.js/umd/popper.min.js"> </script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="js/grasp_mobile_progress_circle-1.0.0.min.js"></script>
    <script src="vendor/jquery-validation/jquery.validate.min.js"></script>
    <script src="vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
    <!-- datatable -->
    <script src="vendor/DataTables/datatables.js"></script>
    <script src="vendor/DataTables/datatables.min.js"></script>
    <script type="text/javascript" src="clients/libs/js/select2.min.js"></script>

    <script>
    $('#toggle-btn').on('click', function (e) {
    e.preventDefault();

    if ($(window).outerWidth() > 1194) {
        $('nav.side-navbar').toggleClass('shrink');
        $('.page').toggleClass('active');
    } else {
        $('nav.side-navbar').toggleClass('show-sm');
        $('.page').toggleClass('active-sm');
    }
    });
    </script>
    <!-- Main File-->

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.15.5/dist/sweetalert2.min.js"></script>