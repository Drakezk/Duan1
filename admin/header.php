<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <!-- CSS here -->
    <link rel="stylesheet" href="../site/assets/css/animate.css">
    <link rel="stylesheet" href="../site/assets/css/swiper-bundle.css">
    <link rel="stylesheet" href="../site/assets/css/slick.css">
    <link rel="stylesheet" href="../site/assets/css/magnific-popup.css">
    <link rel="stylesheet" href="../site/assets/css/font-awesome-pro.css">
    <link rel="stylesheet" href="../site/assets/css/flaticon_shofy.css">
    <link rel="stylesheet" href="../site/assets/css/spacing.css">
    <link rel="stylesheet" href="../site/assets/css/main.css">
    <link rel="stylesheet" href="style.css">
</head>
<style>
    .nav-pills li a:hover{
        background-color: rgb(66, 66, 243);
    }
</style>
<body class="d-flex">
    <!-- <nav class="navbar navbar-expand-lg bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="../">Shofy</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link green" aria-current="page" href="index.php?act=home">Home</a>
                    <a class="nav-link light" href="index.php?act=products">Products</a>
                    <a class="nav-link light" href="index.php?act=users">Users</a>
                    <a class="nav-link light" href="index.php?act=categories">Categories</a>
                    <a class="nav-link light" href="index.php?act=orders">Orders</a>
                </div>
            </div>
        </div>
    </nav> -->
    <div class="container-fluid bg-dark">
    <div class="row container-fluid bg-dark d-flex flex-column justify-content-between col-auto min-vh-100">
        <div class="d-flex flex-column justify-content-between col-auto min-vh-100">
            <div class="mt-4">
                <a class="d-flex text-decoration-none align-items-center ms-4" role="button">
                    <a class="fs-3 text-white d-none d-sm-inline" href="../">Shofy Admin</a>
                </a>
                <hr class="text-white d-none d-sm-block">
                <ul class="nav nav-pills flex-column mt-2 mt-sm-0" id="menu">
                    <li class="nav-item my-sm-1 my-2">
                        <a href="index.php?act=home" class="nav-link text-white text-center text-sm-start" aria-current="page">
                            <i class="fa fa-gauge"></i>
                            <span class="ms-2 d-none d-sm-inline">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item my-sm-1 my-2">
                        <a href="index.php?act=users" class="nav-link text-white text-center text-sm-start" aria-current="page">
                            <i class="fa fa-users"></i>
                            <span class="ms-2 d-none d-sm-inline">Users</span>
                        </a>
                    </li>
                    <li class="nav-item my-sm-1 my-2 disabled">
                        <a href="#sidemenu" data-bs-toggle="collapse" class="nav-link text-white  text-center text-sm-start" aria-current="page">
                            <i class="fa fa-table"></i>
                            <span class="ms-2 d-none d-sm-inline">Products</span>
                            <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="nav collapse ms-1 flex-column" id="sidemenu" data-bs-parent="#menu">
                            <li class="nav-item">
                                <a class="nav-link text-white" href="index.php?act=products" aria-current="page">Products</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="index.php?act=categories" aria-current="page">Categories</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item my-sm-1 my-2">
                        <a href="index.php?act=orders" class="nav-link text-white  text-center text-sm-start" aria-current="page">
                            <i class="fa fa-shopping-cart"></i>
                            <span class="ms-2 d-none d-sm-inline">Orders</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div>
                <div class="dropdown open">
                    <button
                        class="btn border-none outline-none text-white dropdown-toggle"
                        type="button"
                        id="triggerId"
                        data-bs-toggle="dropdown"
                        aria-haspopup="true"
                        aria-expanded="false"
                    >
                        <i class="fa fa-cog"></i><span class="ms-1 d-none d-sm-inline">Setting</span>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="triggerId">
                        <button class="dropdown-item"><a href="../">Home</a></button>
                        <button class="dropdown-item">
                            
                        </button>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    </div>
</body>

</html>