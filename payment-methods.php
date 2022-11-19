<?php
session_start();

require('core/db.php');

$db = new DatabaseClass();

$methods = $db->SelectAll("SELECT * FROM payment_methods");

//success / failure error
$msg = $success = '';
if (isset($_SESSION['success']) && isset($_SESSION['msg'])) {
    // || checks for boolean values only
    $success = $_SESSION['success'] || false;
    $msg = $_SESSION['msg'];
    //remove the session
    unset($_SESSION['success']);
    unset($_SESSION['msg']);
}
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['action']) && !empty($_POST['action'])) {
        $action = $_POST['action'];

        //add address
        if ($action == 'add-addr') {
            $db->Update(
                "UPDATE payment_methods SET addr = :addr WHERE method = :method",
                [
                    'addr' => $_POST['addr'],
                    'method' => $_POST['method']
                ]
            );
            $_SESSION['success'] = true;
            $_SESSION['msg'] = "Address has been updated successfully";
            //reset post array
            header("Location: ./payment-methods");
            exit();
        }
    }
}
//acc bal is sum of except 
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Bootstrap Material Admin by Bootstrapious.com</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="robots" content="all,follow">
    <!-- Google fonts - Poppins -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,700">
    <!-- Choices CSS-->
    <link rel="stylesheet" href="vendor/choices.js/public/assets/styles/choices.min.css">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/favicon.ico">
    <script src="./js/jquery-3.5.1.min.js"></script>
    <script src="./js/validate.js"></script>
    <link rel="stylesheet" href="./toastr/toastr.min.css" />
    <!-- Tweaks for older IEs-->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>

<body>
    <div class="page">
        <!-- Main Navbar-->
        <header class="header z-index-50">
            <nav class="nav navbar py-3 px-0 shadow-sm text-white position-relative">
                <!-- Search Box-->
                <div class="search-box shadow-sm">
                    <button class="dismiss d-flex align-items-center">
                        <svg class="svg-icon svg-icon-heavy">
                            <use xlink:href="#close-1"> </use>
                        </svg>
                    </button>
                    <form id="searchForm" action="#" role="search">
                        <input class="form-control shadow-0" type="text" placeholder="What are you looking for...">
                    </form>
                </div>
                <div class="container-fluid w-100">
                    <div class="navbar-holder d-flex align-items-center justify-content-between w-100">
                        <!-- Navbar Header-->
                        <div class="navbar-header">
                            <!-- Navbar Brand --><a class="navbar-brand d-none d-sm-inline-block" href="index.html">
                                <div class="brand-text d-none d-lg-inline-block"><span>Bootstrap
                                    </span><strong>Dashboard</strong></div>
                                <div class="brand-text d-none d-sm-inline-block d-lg-none"><strong>BD</strong></div>
                            </a>
                            <!-- Toggle Button--><a class="menu-btn active" id="toggle-btn"
                                href="#"><span></span><span></span><span></span></a>
                        </div>
                        <!-- Navbar Menu -->
                        <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
                            <!-- Search-->
                            <li class="nav-item d-flex align-items-center"><a id="search" href="#">
                                    <svg class="svg-icon svg-icon-xs svg-icon-heavy">
                                        <use xlink:href="#find-1"> </use>
                                    </svg></a></li>
                            <!-- Notifications-->
                            <li class="nav-item dropdown"> <a class="nav-link text-white" id="notifications" href="#"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <svg class="svg-icon svg-icon-xs svg-icon-heavy">
                                        <use xlink:href="#chart-1"> </use>
                                    </svg><span class="badge bg-red badge-corner fw-normal">12</span></a>
                                <ul class="dropdown-menu dropdown-menu-end mt-3 shadow-sm"
                                    aria-labelledby="notifications">
                                    <li><a class="dropdown-item py-3" href="#">
                                            <div class="d-flex">
                                                <div class="icon icon-sm bg-blue">
                                                    <svg class="svg-icon svg-icon-xs svg-icon-heavy">
                                                        <use xlink:href="#envelope-1"> </use>
                                                    </svg>
                                                </div>
                                                <div class="ms-3"><span
                                                        class="h6 d-block fw-normal mb-1 text-xs text-gray-600">You have
                                                        6 new
                                                        messages </span><small class="small text-gray-600">4 minutes
                                                        ago</small></div>
                                            </div>
                                        </a></li>
                                    <li><a class="dropdown-item py-3" href="#">
                                            <div class="d-flex">
                                                <div class="icon icon-sm bg-green">
                                                    <svg class="svg-icon svg-icon-xs svg-icon-heavy">
                                                        <use xlink:href="#chats-1"> </use>
                                                    </svg>
                                                </div>
                                                <div class="ms-3"><span
                                                        class="h6 d-block fw-normal mb-1 text-xs text-gray-600">New 2
                                                        WhatsApp
                                                        messages</span><small class="small text-gray-600">4 minutes
                                                        ago</small></div>
                                            </div>
                                        </a></li>
                                    <li><a class="dropdown-item py-3" href="#">
                                            <div class="d-flex">
                                                <div class="icon icon-sm bg-orange">
                                                    <svg class="svg-icon svg-icon-xs svg-icon-heavy">
                                                        <use xlink:href="#checked-window-1"> </use>
                                                    </svg>
                                                </div>
                                                <div class="ms-3"><span
                                                        class="h6 d-block fw-normal mb-1 text-xs text-gray-600">Server
                                                        Rebooted</span><small class="small text-gray-600">8 minutes
                                                        ago</small></div>
                                            </div>
                                        </a></li>
                                    <li><a class="dropdown-item py-3" href="#">
                                            <div class="d-flex">
                                                <div class="icon icon-sm bg-green">
                                                    <svg class="svg-icon svg-icon-xs svg-icon-heavy">
                                                        <use xlink:href="#chats-1"> </use>
                                                    </svg>
                                                </div>
                                                <div class="ms-3"><span
                                                        class="h6 d-block fw-normal mb-1 text-xs text-gray-600">New 2
                                                        WhatsApp
                                                        messages</span><small class="small text-gray-600">10 minutes
                                                        ago</small></div>
                                            </div>
                                        </a></li>
                                    <li><a class="dropdown-item all-notifications text-center" href="#"> <strong
                                                class="text-xs text-gray-600">view all notifications </strong></a></li>
                                </ul>
                            </li>
                            <!-- Messages                        -->
                            <li class="nav-item dropdown"> <a class="nav-link text-white" id="messages" rel="nofollow"
                                    href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                    <svg class="svg-icon svg-icon-xs svg-icon-heavy">
                                        <use xlink:href="#envelope-1"> </use>
                                    </svg><span class="badge bg-orange badge-corner fw-normal">10</span></a>
                                <ul class="dropdown-menu dropdown-menu-end mt-3 shadow-sm" aria-labelledby="messages">
                                    <li><a class="dropdown-item d-flex py-3" href="#"> <img
                                                class="img-fluid rounded-circle" src="img/avatar-1.jpg" alt="..."
                                                width="45">
                                            <div class="ms-3"><span
                                                    class="h6 d-block fw-normal mb-1 text-sm text-gray-600">Jason
                                                    Doe</span><small class="small text-gray-600"> Sent You
                                                    Message</small></div>
                                        </a></li>
                                    <li><a class="dropdown-item d-flex py-3" href="#"> <img
                                                class="img-fluid rounded-circle" src="img/avatar-2.jpg" alt="..."
                                                width="45">
                                            <div class="ms-3"><span
                                                    class="h6 d-block fw-normal mb-1 text-sm text-gray-600">Jason
                                                    Doe</span><small class="small text-gray-600"> Sent You
                                                    Message</small></div>
                                        </a></li>
                                    <li><a class="dropdown-item d-flex py-3" href="#"> <img
                                                class="img-fluid rounded-circle" src="img/avatar-3.jpg" alt="..."
                                                width="45">
                                            <div class="ms-3"><span
                                                    class="h6 d-block fw-normal mb-1 text-sm text-gray-600">Jason
                                                    Doe</span><small class="small text-gray-600"> Sent You
                                                    Message</small></div>
                                        </a></li>
                                    <li><a class="dropdown-item text-center" href="#"> <strong
                                                class="text-xs text-gray-600">Read all
                                                messages </strong></a></li>
                                </ul>
                            </li>
                            <!-- Languages dropdown    -->
                            <li class="nav-item dropdown"><a
                                    class="nav-link text-white dropdown-toggle d-flex align-items-center" id="languages"
                                    href="#" data-bs-toggle="dropdown" aria-expanded="false"><img class="me-2"
                                        src="img/flags/16/GB.png" alt="English"><span
                                        class="d-none d-sm-inline-block">English</span></a>
                                <ul class="dropdown-menu dropdown-menu-end mt-3 shadow-sm" aria-labelledby="languages">
                                    <li><a class="dropdown-item" rel="nofollow" href="#"> <img class="me-2"
                                                src="img/flags/16/DE.png" alt="English"><span
                                                class="text-xs text-gray-700">German</span></a></li>
                                    <li><a class="dropdown-item" rel="nofollow" href="#"> <img class="me-2"
                                                src="img/flags/16/FR.png" alt="English"><span
                                                class="text-xs text-gray-700">French </span></a></li>
                                </ul>
                            </li>
                            <!-- Logout    -->
                            <li class="nav-item"><a class="nav-link text-white" href="login.html"> <span
                                        class="d-none d-sm-inline">Logout</span>
                                    <svg class="svg-icon svg-icon-xs svg-icon-heavy">
                                        <use xlink:href="#security-1"> </use>
                                    </svg></a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
        <div class="page-content d-flex align-items-stretch">
            <!-- Side Navbar -->
            <nav class="side-navbar z-index-40">
                <!-- Sidebar Header-->
                <div class="sidebar-header d-flex align-items-center py-4 px-3"><img
                        class="avatar shadow-0 img-fluid rounded-circle" src="img/avatar-1.jpg" alt="...">
                    <div class="ms-3 title">
                        <h1 class="h4 mb-2">Mark Stephen</h1>
                        <p class="text-sm text-gray-500 fw-light mb-0 lh-1">Web Designer</p>
                    </div>
                </div>
                <!-- Sidebar Navidation Menus--><span
                    class="text-uppercase text-gray-400 text-xs letter-spacing-0 mx-3 px-2 heading">Main</span>
                <ul class="list-unstyled py-4">
                    <li class="sidebar-item"><a class="sidebar-link" href="index.html">
                            <svg class="svg-icon svg-icon-sm svg-icon-heavy me-xl-2">
                                <use xlink:href="#real-estate-1"> </use>
                            </svg>Home </a></li>
                    <li class="sidebar-item active"><a class="sidebar-link" href="./users">
                            <svg class="svg-icon svg-icon-sm svg-icon-heavy me-xl-2">
                                <use xlink:href="#users"> </use>
                            </svg>Users </a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="tables.html">
                            <svg class="svg-icon svg-icon-sm svg-icon-heavy me-xl-2">
                                <use xlink:href="#portfolio-grid-1"> </use>
                            </svg>Tables </a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="charts.html">
                            <svg class="svg-icon svg-icon-sm svg-icon-heavy me-xl-2">
                                <use xlink:href="#sales-up-1"> </use>
                            </svg>Charts </a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="forms.html">
                            <svg class="svg-icon svg-icon-sm svg-icon-heavy me-xl-2">
                                <use xlink:href="#survey-1"> </use>
                            </svg>Forms </a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="#exampledropdownDropdown"
                            data-bs-toggle="collapse">
                            <svg class="svg-icon svg-icon-sm svg-icon-heavy me-xl-2">
                                <use xlink:href="#browser-window-1"> </use>
                            </svg>Example dropdown </a>
                        <ul class="collapse list-unstyled " id="exampledropdownDropdown">
                            <li><a class="sidebar-link" href="#">Page</a></li>
                            <li><a class="sidebar-link" href="#">Page</a></li>
                            <li><a class="sidebar-link" href="#">Page</a></li>
                        </ul>
                    </li>
                    <li class="sidebar-item"><a class="sidebar-link" href="login.html">
                            <svg class="svg-icon svg-icon-sm svg-icon-heavy me-xl-2">
                                <use xlink:href="#disable-1"> </use>
                            </svg>Login page </a></li>
                </ul><span class="text-uppercase text-gray-400 text-xs letter-spacing-0 mx-3 px-2 heading">Extras</span>
                <ul class="list-unstyled py-4">
                    <li class="sidebar-item"> <a class="sidebar-link" href="#">
                            <svg class="svg-icon svg-icon-sm svg-icon-heavy me-xl-2">
                                <use xlink:href="#imac-screen-1"> </use>
                            </svg>Demo </a></li>
                    <li class="sidebar-item"> <a class="sidebar-link" href="#">
                            <svg class="svg-icon svg-icon-sm svg-icon-heavy me-xl-2">
                                <use xlink:href="#chart-1"> </use>
                            </svg>Demo </a></li>
                    <li class="sidebar-item"> <a class="sidebar-link" href="#">
                            <svg class="svg-icon svg-icon-sm svg-icon-heavy me-xl-2">
                                <use xlink:href="#quality-1"> </use>
                            </svg>Demo </a></li>
                    <li class="sidebar-item"> <a class="sidebar-link" href="#">
                            <svg class="svg-icon svg-icon-sm svg-icon-heavy me-xl-2">
                                <use xlink:href="#security-shield-1"> </use>
                            </svg>Demo </a></li>
                </ul>
            </nav>
            <div class="content-inner w-100">
                <!-- Page Header-->
                <header class="bg-white shadow-sm px-4 py-3 z-index-20">
                    <div class="container-fluid px-0">
                        <h2 class="mb-0 p-1">Users</h2>
                    </div>
                </header>
                <!-- Breadcrumb-->
                <div class="bg-white">
                    <div class="container-fluid">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 py-3">
                                <li class="breadcrumb-item"><a class="fw-light" href="index.html">Home</a></li>
                                <li class="breadcrumb-item active fw-light" aria-current="page">Payment Methods</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="container-fluid">
                    <div class="row mt-5">
                        <div class="col-4">&nbsp;</div>
                        <div class="col-8 text-end">
                            <button id="btn_upd_addr" class="btn btn-outline-info">
                                Update Address </button>
                        </div>
                    </div>
                    <section class="m-auto" style="max-width:500px">
                        <?php if (isset($methods) && count($methods)) { ?>
                        <div class="table-responsive">
                            <table class="table mb-0 table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Payment method</th>
                                        <th>Wallet Address</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                            foreach ($methods as $i => $method) {
                        ?>
                                    <tr>
                                        <th scope="row">
                                            <?php echo ++$i; ?>
                                        </th>
                                        <td>
                                            <?php (isset($method['method']) && !empty($method['method'])) ? print(stripslashes($method['method'])) : print('NOT SET'); ?>
                                        </td>
                                        <td>
                                            <?php (isset($method['addr']) && !empty($method['addr'])) ? print(stripslashes($method['addr'])) : print('NOT SET'); ?>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <?php } else { ?>
                        <div class="text-center" style="font-size: 1.2rem;">
                            <p><i class="fa-4x fas fa-exclamation-triangle text-warning"></i></p>
                            <p>No users found. <a href="./users.php">Try again?</a></p>
                        </div>
                        <?php } ?>
                </div>
            </div>
            <!-- Page Footer-->
            <footer class="position-absolute bottom-0 bg-darkBlue text-white text-center py-3 w-100 text-xs"
                id="footer">
                <div class="container-fluid">
                    <div class="row gy-2">
                        <div class="col-sm-6 text-sm-start">
                            <p class="mb-0">Your company &copy; 2017-2022</p>
                        </div>
                        <div class="col-sm-6 text-sm-end">
                            <p class="mb-0">Design by <a href="https://bootstrapious.com/p/admin-template"
                                    class="text-white text-decoration-none">Bootstrapious</a></p>
                            <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    </div>
    <!-- modal update password -->
    <div class="modal" id="modal_address" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add payment Method</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" id="form_address">
                        <input type="hidden" name="action" value="add-addr">
                        <div class="mb-2">
                            <label class="form-label">Select Payment Method</label>
                            <select id="inp_method" class="form-control" name="method" octavalidate="R">
                                <option value="">Select One</option>
                                <?php
                                        foreach ($methods as $i => $method) {
                                        ?>
                                <option>
                                    <?php print($method['method']); ?>
                                </option>
                                <?php }
                                        ?>
                            </select>
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Wallet Address</label>
                            <input id="inp_addr" class="form-control" name="addr" octavalidate="R">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button form="form_address" class="btn btn-success">Update Address</button>
                </div>
            </div>
        </div>
    </div>
    <!-- JavaScript files-->
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/just-validate/js/just-validate.min.js"></script>
    <script src="vendor/choices.js/public/assets/scripts/choices.min.js"></script>
    <!-- Main File-->
    <script src="js/front.js"></script>
    <script>
        // ------------------------------------------------------- //
        //   Inject SVG Sprite - 
        //   see more here 
        //   https://css-tricks.com/ajaxing-svg-sprite/
        // ------------------------------------------------------ //
        function injectSvgSprite(path) {

            var ajax = new XMLHttpRequest();
            ajax.open("GET", path, true);
            ajax.send();
            ajax.onload = function (e) {
                var div = document.createElement("div");
                div.className = 'd-none';
                div.innerHTML = ajax.responseText;
                document.body.insertBefore(div, document.body.childNodes[0]);
            }
        }
        // this is set to BootstrapTemple website as you cannot 
        // inject local SVG sprite (using only 'icons/orion-svg-sprite.svg' path)
        // while using file:// protocol
        // pls don't forget to change to your domain :)
        injectSvgSprite('https://bootstraptemple.com/files/icons/orion-svg-sprite.svg');
    </script>
    <!-- FontAwesome CSS - loading as last, so it doesn't block rendering-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <script src="./toastr/toastr.min.js"> </script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            $('#btn_upd_addr').on('click', function () {
                //show the modal
                new bootstrap.Modal('#modal_address').show()
            })
            const myForm = new octaValidate('form_address')
            $('#form_address').on('submit', (e) => {
                e.preventDefault()
                if (myForm.validate()) {
                    e.currentTarget.submit()
                }
            })
        })
    </script>
    <script>
            <?php
    if (isset($success) && isset($msg)) {
    if ($success && !empty($msg)) {
    ?>
                    toastr.success("<?php echo $msg; ?>")
                    <?php
        } elseif (!$success && !empty($msg)) { ?>
                toastr.error("<?php echo $msg; ?>")
                <?php
        }
}
    ?>
    </script>
</body>

</html>