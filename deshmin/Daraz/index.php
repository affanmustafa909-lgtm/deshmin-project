<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daraz Online Shopping</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css">
    <link rel="stylesheet" href="./style.css">
</head>

<body>


    <div class="top-bar">
        <div class="container d-flex justify-content-end">
            <ul class="nav">
                <li class="nav-item"><a class="nav-link" href="#">SAVE MORE ON APP</a></li>
                <li class="nav-item"><a class="nav-link" href="#">SELL ON DARAZ</a></li>
                <li class="nav-item"><a class="nav-link" href="#">HELP & SUPPORT</a></li>
                <li class="nav-item"><a class="nav-link" href="./login.html" target="_blank">LOGIN</a></li>
                <li class="nav-item"><a class="nav-link" href="./signp.html" target="_blank">SIGN UP</a></li>
                <li class="nav-item"><a class="nav-link" href="#">زبان تبدیل کریں</a></li>
            </ul>
        </div>
    </div>

    <div class="bottom-bar pb-4">
        <div class="container d-flex align-items-center justify-content-between">

            <a class="navbar-brand" href="./index.php" target="_blank">
                <img src="./image/logo2.png" alt="Daraz">
            </a>
            <form class="d-flex flex-grow-1 mx-3 search-box" style="max-width: 700px;">
                <input class="form-control" type="search" placeholder="Search in Daraz">
                <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>

            <a href="./addtocart.html" target="_blank" class="text-white fs-4 ms-2">
                <i class="fa-solid fa-cart-shopping"></i>
            </a>
        </div>
    </div>


    <div class="color-first">

        <div class="container">
            <div class="row g-3">
                <div class="col-lg-9 col-md-8 col-12">
                    <div id="carouselExample" class="carousel slide">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="./image/first.webp" class="d-block w-100 img-fluid rounded" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="./image/second.webp" class="d-block w-100 img-fluid rounded" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="./image/four.webp" class="d-block w-100 img-fluid rounded" alt="...">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon"></span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon"></span>
                        </button>
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 col-12 d-flex justify-content-center align-items-center p-0">
                    <img src="./image/image1.png" alt="Daraz Ad">
                </div>
            </div>
        </div>


        <div class="container">
            <div class="row">
                <div class="col-12 text-center shopnowtop">
                    <img src="./image/shopnow.webp" alt="Shop Now" class="img-fluid">
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="flash">
                        <p class="m-0">Flash Sale</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="box-color">


                <div class="container mt-4">
                    <div class="row align-items-center shopnow">
                        <div class="col-6 col-md-6 shopall">
                            <p class="m-0">On Sale Now</p>
                        </div>
                        <div class="col-6 col-md-6 text-end shopbutton mt-3">
                            <button class="btn btn-outline-danger">SHOP ALL PRODUCT</button>
                        </div>
                    </div>
                </div>
                <hr>

                <!-- first card start  -->


                <?php

                include '../admin/conntion.php';

                $view = "SELECT * FROM add_product WHERE category = 'Flash Sale'";


                $result = mysqli_query($conn, $view);

                ?>

                <div class="container">
                    <div class="color-foryoucard">
                        <div class="container my-4">
                            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-6 g-3">
                                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                                    <div class="col">
                                        <a href="product_detail.php?id=<?php echo $row['id']; ?>" target="_blank" class="card-link">

                                            <div class="card h-100">
                                                <img src="../admin/upload/<?php echo $row['image']; ?>" class="card-img-top"
                                                    alt="">
                                                <div class="card-body">
                                                    <h6 class="card-title">
                                                        <?php echo $row['p_name']; ?>
                                                    </h6>
                                                    <p class="mb-1"><span class="text-danger fw-bold">Rs.
                                                            <?php echo $row['price']; ?>
                                                        </span> <del class="text-muted">
                                                            <?php echo $row['p_des']; ?>
                                                        </del></p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>

                                <?php } ?>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="container my-4">
            <div class="categories mb-3">
                <h4>Categories</h4>
            </div>


            <?php
            $view = "SELECT * FROM add_product WHERE category = 'Categories'";


            $result = mysqli_query($conn, $view);

            ?>

            <div class="row g-2">
                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                    <div class="col-6 col-md-3 col-lg-2">
                        <div class="cat-box text-center p-3">
                            <img src="../admin/upload/<?php echo $row['image']; ?>" class="img-fluid" alt="">
                            <p><?php echo $row['p_name']; ?></p>
                        </div>
                    </div>

                <?php } ?>

            </div>
        </div>

        <div class="container">
            <div class="justfor">
                <p>JUST FOR YOU</p>
            </div>
        </div>


        <?php
        $view = "SELECT * FROM add_product WHERE category = 'JUST FOR YOU'";


        $result = mysqli_query($conn, $view);

        ?>
        <div class="container">
            <div class="color-foryoucard">


                <div class="container my-4">
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-6 g-3">

                        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                            <div class="col">
                                <a href="product_detail.php?id=<?php echo $row['id']; ?>" target="_blank" class="card-link">
                                    <div class="card h-100">
                                        <img src="../admin/upload/<?php echo $row['image']; ?>" class="card-img-top"
                                            alt="">
                                        <div class="card-body">
                                            <h6 class="card-title">
                                                <?php echo $row['p_name']; ?>
                                            </h6>
                                            <p class="mb-1"><span class="text-danger fw-bold">Rs.
                                                    <?php echo $row['price']; ?>
                                                </span> <del class="text-muted">
                                                    <?php echo $row['p_des']; ?>
                                                </del></p>
                                        </div>
                                    </div>
                                </a>
                            </div>

                        <?php } ?>

                    </div>
                </div>
            </div>
        </div>




        <div class="load-more">
            <div class="d-grid gap-5 col-6 mx-auto">
                <button class="btn btn-outline-secondary" type="button">LOAD MORE </button>
            </div>

        </div>

        <!-- footer  -->
        <div class="container mt-5">
            <footer class="pt-4">
                <div class="row">


                    <div class="col-md-3 col-6 mb-4">
                        <h5 class="text-primary">Customer Care</h5>
                        <ul class="list-unstyled text-primary">
                            <li><a href="#" class="text-dark text-decoration-none">Help Center</a></li>
                            <li><a href="#" class="text-dark text-decoration-none">How to Buy</a></li>
                            <li><a href="#" class="text-dark text-decoration-none">Corporate & Bulk Purchasing</a></li>
                            <li><a href="#" class="text-dark text-decoration-none">Returns & Refunds</a></li>
                            <li><a href="#" class="text-dark text-decoration-none">Daraz Shop</a></li>
                            <li><a href="#" class="text-dark text-decoration-none">Contact Us</a></li>
                            <li><a href="#" class="text-dark text-decoration-none">Purchase Protection</a></li>
                            <li><a href="#" class="text-dark text-decoration-none">Daraz Pick up Points</a></li>
                        </ul>
                    </div>

                    <div class="col-md-3 col-6 mb-4">
                        <h5 class="text-primary">Daraz</h5>
                        <ul class="list-unstyled">
                            <li><a href="#" class="text-dark text-decoration-none">About Us</a></li>
                            <li><a href="#" class="text-dark text-decoration-none">Digital Payments</a></li>
                            <li><a href="#" class="text-dark text-decoration-none">Daraz Donates</a></li>
                            <li><a href="#" class="text-dark text-decoration-none">Daraz Blog</a></li>
                            <li><a href="#" class="text-dark text-decoration-none">Terms & Conditions</a></li>
                            <li><a href="#" class="text-dark text-decoration-none">Privacy Policy</a></li>
                            <li><span class="text-dark">NTN Number : 4012118-6</span></li>
                            <li><span class="text-dark">STRN Number : 1700401211818</span></li>
                            <li><a href="#" class="text-dark text-decoration-none">Online Shopping App</a></li>
                            <li><a href="#" class="text-dark text-decoration-none">Online Grocery Shopping</a></li>
                            <li><a href="#" class="text-dark text-decoration-none">Daraz Exclusive</a></li>
                            <li><a href="#" class="text-dark text-decoration-none">Daraz University</a></li>
                            <li><a href="#" class="text-dark text-decoration-none">Sell on Daraz</a></li>
                            <li><a href="#" class="text-dark text-decoration-none">Join Daraz Affiliate Program</a></li>
                        </ul>
                    </div>


                    <div class="col-md-3 col-12 mb-4 d-flex align-items-start">
                        <img src="./image/footerlogo.png" alt="Logo" width="50" class="me-2">
                        <div>
                            <p class="text-danger mb-1 fw-bold">Happy Shopping</p>
                            <span class="text-primary">Download App</span>
                        </div>
                    </div>

                    <div class="col-md-3 col-12 mb-4">
                        <a href="https://apps.apple.com/us/app/daraz-online-shopping-app/id978058048"
                            target="_blank"><img src="./image/appsote.png" class="img-fluid mb-2" alt=""></a>
                        <a href="https://play.google.com/store/search?q=daraz&c=apps&hl=en" target="_blank"><img
                                src="./image/googleplay.png" class="img-fluid mb-2" alt=""></a><br>
                        <a href="https://appgallery.huawei.com/?spm=a2a0e.tm80335142.footer_top.huawei.62aa4076BRiSHF&scm=1003.4.icms-zebra-5029545-2832850.OTHER_5370750400_2485531#/app/C100948133"
                            target="_blank"><img src="./image/appgallery.png" alt=""></a>
                    </div>

                </div>
            </footer>
        </div>


    </div> <!--backgroung color div  -->



    <script src="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>


</body>

</html>