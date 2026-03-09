<?php
session_start();
include '../admin/conntion.php';

// check if cart exists
if (empty($_SESSION['cart'])) {
    echo "<div class='container mt-5'><div class='alert alert-warning'>⚠ No items in your cart.</div></div>";
    exit;
}

// Calculate totals
$subtotal = 0;
$shipping = 125; // flat shipping
$totalItems = 0;

foreach ($_SESSION['cart'] as $item) {
    // Ensure product data exists
    if (!isset($item['price']) || !isset($item['qty'])) continue;
    $subtotal += $item['price'] * $item['qty'];
    $totalItems += $item['qty'];
}

$total = $subtotal + $shipping;

// handle order submit
if (isset($_POST['place_order'])) {
    $fullname = $_POST['fullname'];
    $province = $_POST['province'];
    $phone = $_POST['phone'];
    $city = $_POST['city'];
    $house = $_POST['house'];
    $area = $_POST['area'];
    $colony = $_POST['colony'];
    $address = $_POST['address'];

    // save each product
   foreach ($_SESSION['cart'] as $item) {
    //  Safely get product details
    $pid = isset($item['id']) ? $item['id'] : 0;
    $pname = isset($item['p_name']) ? $item['p_name'] : '';
    $price = isset($item['price']) ? $item['price'] : 0;
    $qty = isset($item['qty']) ? $item['qty'] : 1;
    $image = isset($item['image']) ? $item['image'] : ''; //  added image

    //  Insert product with image
    $query = "INSERT INTO buynow (product_id, p_name, image, price, fullname, province, phone, city, house, area, colony, address, qty)
              VALUES ('$pid', '$pname', '$image', '$price', '$fullname', '$province', '$phone', '$city', '$house', '$area', '$colony', '$address', '$qty')";
    mysqli_query($conn, $query);
}


   // clear cart after placing order
unset($_SESSION['cart']);

// success message (optional)
echo "<script>alert('✅ Order placed successfully!');</script>";

// redirect to index page after 2 seconds
echo "<script>
    setTimeout(function() {
        window.location.href = './index.php';
    }, 2000);
</script>";
exit;

}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Checkout</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; }
        .checkout-container { margin-top: 50px; }
        .order-summary { background: #fff; border-radius: 10px; padding: 20px; box-shadow: 0 2px 8px rgba(0,0,0,0.1); }
        .btn-orange { background-color: #ff6f00; color: #fff; font-weight: bold; }
        .btn-orange:hover { background-color: #e65c00; }
    </style>
</head>
<body>

<div class="container checkout-container">
    <div class="row g-4">
        <!-- LEFT SIDE: DELIVERY FORM -->
        <div class="col-lg-8">
            <div class="bg-white p-4 shadow-sm rounded">
                <h4 class="mb-4">Delivery Information</h4>
                <form method="post">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Full name</label>
                            <input type="text" name="fullname" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Province</label>
                            <input type="text" name="province" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Phone</label>
                            <input type="text" name="phone" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">City</label>
                            <input type="text" name="city" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Building / House No.</label>
                            <input type="text" name="house" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Area</label>
                            <input type="text" name="area" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Colony / Locality</label>
                            <input type="text" name="colony" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Address</label>
                            <input type="text" name="address" class="form-control" required>
                        </div>
                    </div>
                    <button type="submit" name="place_order" class="btn btn-orange w-100 mt-4 py-2">PLACE ORDER</button>
                </form>
            </div>
        </div>

        <!-- RIGHT SIDE: ORDER SUMMARY -->
        <div class="col-lg-4">
            <div class="order-summary">
                <h5 class="fw-bold mb-3">Order Summary</h5>

                <?php foreach ($_SESSION['cart'] as $item): ?>
                    <div class="d-flex align-items-center mb-3">
                        <img src="../admin/upload/<?php echo $item['image']; ?>" width="60" height="60" class="rounded me-3" alt="Product">
                        <div>
                            <p class="mb-1 fw-semibold"><?php echo $item['p_name']; ?></p>
                            <small>Qty: <?php echo $item['qty']; ?></small><br>
                            <small>Rs. <?php echo number_format($item['price']); ?></small>
                        </div>
                    </div>
                    <hr>
                <?php endforeach; ?>

                <div class="d-flex justify-content-between mb-2">
                    <span>Subtotal (<?php echo $totalItems; ?> items)</span>
                    <span>Rs. <?php echo number_format($subtotal); ?></span>
                </div>
                <div class="d-flex justify-content-between mb-2">
                    <span>Shipping Fee</span>
                    <span>Rs. <?php echo number_format($shipping); ?></span>
                </div>
                <div class="d-flex justify-content-between fw-bold mb-3">
                    <span>Total</span>
                    <span class="text-danger">Rs. <?php echo number_format($total); ?></span>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
