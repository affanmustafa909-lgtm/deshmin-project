<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Detail</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./style.css">
</head>

<body>
    <!-- header  -->

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

            <a class="navbar-brand" href="./index.html" target="_blank">
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
    <!-- header end  -->


<?php
include '../admin/conntion.php';
session_start();

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $query = "SELECT * FROM add_product WHERE id = $id";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
        $product = mysqli_fetch_assoc($result);
    } else {
        echo "<div class='container mt-5'><div class='alert alert-danger'>❌ Product not found!</div></div>";
        exit;
    }
} else {
    echo "<div class='container mt-5'><div class='alert alert-warning'>⚠ No product selected.</div></div>";
    exit;
}
?>

<div class="container py-5">
    <div class="row g-4" id="row-color">
        <div class="col-md-5">
            <img src="../admin/upload/<?php echo $product['image']; ?>" class="img-fluid rounded" alt="Product">
        </div>

        <div class="col-md-7">
            <h4 class="fw-bold"><?php echo $product['p_name']; ?></h4>
            <div class="rating mb-2">⭐⭐⭐⭐⭐ <span>(114 Ratings)</span></div>

            <div class="mb-3">
                <span class="price fw-bold fs-4 text-danger">Rs. <?php echo $product['price']; ?></span>
                <p class="text-muted"><?php echo $product['p_des']; ?></p>
            </div>

            <p><strong>Category:</strong> <?php echo $product['category']; ?></p>

            <form method="get" action="buynow.php">
                <input type="hidden" name="id" value="<?php echo $product['id']; ?>">
                <div class="d-flex align-items-center mb-3">
                    <label class="me-2"><strong>Quantity:</strong></label>
                    <input type="number" name="qty" value="1" min="1" class="form-control" style="width:80px;">
                </div>

                <div class="d-flex gap-3">
                    <!-- <button type="submit" class="btn btn-success px-4">Buy Now</button> -->
                    <a href="addtocart.php?action=add&id=<?php echo $product['id']; ?>&qty=1" class="btn btn-primary px-4 text-white">Buy Now</a>

                  <a href="addtocart.php?action=add&id=<?php echo $product['id']; ?>&qty=1" class="btn btn-warning px-4 text-white">Add to Cart</a>

                </div>
            </form>
        </div>
    </div>
</div>



    <div class="container">
        <div class="color-foryoucard">
            <div class="container my-4">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-6 g-3">
                    <div class="col">
                        <div class="card h-100">
                            <img src="./image/airbud.webp" class="card-img-top" alt="">
                            <div class="card-body">
                                <h6 class="card-title">Air buds/ Bluetooth -
                                    Earphones - Headphones..</h6>
                                <p class="mb-1"><span class="text-danger fw-bold">Rs.852</span> <del
                                        class="text-muted">Rs.950</del></p>
                                <div class="stars">★ ★ ★ ★ ☆</div>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card h-100">
                            <img src="./image/Dettol.webp" class="card-img-top" alt="">
                            <div class="card-body">
                                <h6 class="card-title">Dettol Antiseptic Liquid -
                                    250ml</h6>
                                <p class="mb-1"><span class="text-danger fw-bold">Rs.750</span> <del
                                        class="text-muted">Rs.1150</del></p>
                                <div class="stars">★ ★ ★ ★ ★</div>
                            </div>
                        </div>

                    </div>

                    <div class="col">

                        <div class="card h-100">
                            <img src="./image/dawlance.webp" class="card-img-top" alt="">
                            <div class="card-body">
                                <h6 class="card-title">Dawlance Air - Conditioner
                                    Mega T+ 10 - DC Inverter</h6>
                                <p class="mb-1"><span class="text-danger fw-bold">Rs.85,250</span> <del
                                        class="text-muted">Rs.101,101</del></p>
                                <div class="stars">★ ★ ★ ☆ ☆</div>
                            </div>
                        </div>
                    </div>

                    <div class="col">

                        <div class="card h-100">
                            <img src="./image/dawlance1.webp" class="card-img-top" alt="">
                            <div class="card-body">
                                <h6 class="card-title">Dawlance 8.5 KG top -
                                    Load full automati</h6>
                                <p class="mb-1"><span class="text-danger fw-bold">Rs.56,690</span> <del
                                        class="text-muted">Rs.89,999</del></p>
                                <div class="stars">★ ★ ★ ★ ☆</div>
                            </div>
                        </div>

                    </div>

                    <div class="col">
                        <div class="card h-100">
                            <img src="./image/durex.webp" class="card-img-top" alt="">
                            <div class="card-body">
                                <h6 class="card-title">Durex Very Cherry Lube -
                                    50ml</h6>
                                <p class="mb-1"><span class="text-danger fw-bold">Rs.825</span> <del
                                        class="text-muted">Rs.1,150</del></p>
                                <div class="stars">★ ★ ★ ★ ☆</div>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card h-100">
                            <img src="./image/shoes.webp" class="card-img-top" alt="">
                            <div class="card-body">
                                <h6 class="card-title">New Style Flip Flops - Slippers for Boys Stylist</h6>
                                <p class="mb-1"><span class="text-danger fw-bold">Rs.629</span> <del
                                        class="text-muted">Rs.999</del></p>
                                <div class="stars">★ ★ ★ ☆ ☆</div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
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
                    <a href="https://apps.apple.com/us/app/daraz-online-shopping-app/id978058048" target="_blank"><img
                            src="./image/appsote.png" class="img-fluid mb-2" alt=""></a>
                    <a href="https://play.google.com/store/search?q=daraz&c=apps&hl=en" target="_blank"><img
                            src="./image/googleplay.png" class="img-fluid mb-2" alt=""></a><br>
                    <a href="https://appgallery.huawei.com/?spm=a2a0e.tm80335142.footer_top.huawei.62aa4076BRiSHF&scm=1003.4.icms-zebra-5029545-2832850.OTHER_5370750400_2485531#/app/C100948133"
                        target="_blank"><img src="./image/appgallery.png" alt=""></a>
                </div>
            </div>
        </footer>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>