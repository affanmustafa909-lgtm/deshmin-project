<?php
session_start();
include '../admin/conntion.php';

// Add item to cart
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $qty = isset($_GET['qty']) ? intval($_GET['qty']) : 1;

    $query = "SELECT * FROM add_product WHERE id = $id";
    $result = mysqli_query($conn, $query);
    $product = mysqli_fetch_assoc($result);

    if ($product) {
        $_SESSION['cart'][$id] = [
            'id' => $product['id'],
            'p_name' => $product['p_name'],
            'price' => $product['price'],
            'qty' => $qty,
            'image' => $product['image'] 
        ];
    }
}

// Delete one item
if (isset($_GET['remove'])) {
    $remove_id = intval($_GET['remove']);
    unset($_SESSION['cart'][$remove_id]);
    header("Location: cart.php");
    exit;
}

// Delete all
if (isset($_GET['clear'])) {
    unset($_SESSION['cart']);
    header("Location: cart.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Your Cart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: #f8f9fa; }
        .cart-item { transition: 0.3s; }
        .cart-item:hover { background: #f1f1f1; }
    </style>
</head>
<body>

<div class="container my-5">
    <h3 class="mb-4">🛒 Your Cart</h3>

    <form method="post" action="checkout.php" id="cartForm">
        <div class="row">
            <!-- CART ITEMS -->
            <div class="col-lg-8">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div>
                        <input type="checkbox" id="selectAll">
                        <label for="selectAll">SELECT ALL</label>
                    </div>
                    <a href="?clear" class="btn btn-sm btn-outline-danger">DELETE ALL</a>
                </div>

                <?php if (!empty($_SESSION['cart'])): ?>
                    <?php foreach ($_SESSION['cart'] as $item): ?>
                        <div class="cart-item d-flex align-items-center mb-3 p-2 border rounded bg-white shadow-sm">
                            <input type="checkbox" name="selected_items[]" value="<?php echo $item['id']; ?>" class="item-checkbox me-3">
                            <img src="../admin/upload/<?php echo $item['image']; ?>" alt="Product"
                                 style="width:100px; height:100px; object-fit:cover;">
                            <div class="ms-3 flex-grow-1">
                                <h6 class="fw-bold mb-1"><?php echo $item['p_name']; ?></h6>
                                <small class="text-muted d-block mb-2">Category Product</small>
                                <div class="d-flex align-items-center">
                                    <span class="text-danger fw-bold me-2">Rs. <?php echo number_format($item['price']); ?></span>
                                </div>
                            </div>
                            <div class="d-flex align-items-center">
                                <a href="?remove=<?php echo $item['id']; ?>" class="btn btn-outline-danger btn-sm me-2">🗑</a>
                                <div class="d-flex align-items-center">
                                    <button type="button" class="btn btn-outline-secondary btn-sm"
                                            onclick="updateQty(<?php echo $item['id']; ?>, -1)">-</button>
                                    <input type="text" id="qty-<?php echo $item['id']; ?>" name="qty[<?php echo $item['id']; ?>]"
                                           value="<?php echo $item['qty']; ?>"
                                           class="form-control form-control-sm mx-1 text-center" style="width: 50px;" readonly>
                                    <button type="button" class="btn btn-outline-secondary btn-sm"
                                            onclick="updateQty(<?php echo $item['id']; ?>, 1)">+</button>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="alert alert-warning">Your cart is empty!</div>
                <?php endif; ?>
            </div>

            <!-- ORDER SUMMARY -->
            <div class="col-lg-4">
                <div class="order-summary bg-white p-4 shadow-sm rounded">
                    <h5 class="fw-bold mb-3">Order Summary</h5>
                    <div id="summary-content">
                        <p>Select products to see total.</p>
                    </div>
                    <button type="submit" class="btn btn-warning w-100 text-white fw-bold mt-3">PROCEED TO CHECKOUT</button>
                </div>
            </div>
        </div>
    </form>
</div>

<script>
const selectAll = document.getElementById('selectAll');
const checkboxes = document.querySelectorAll('.item-checkbox');
const summaryDiv = document.getElementById('summary-content');

selectAll.addEventListener('change', function() {
    checkboxes.forEach(ch => ch.checked = this.checked);
    updateSummary();
});

checkboxes.forEach(ch => {
    ch.addEventListener('change', updateSummary);
});

function updateQty(id, change) {
    let qtyInput = document.getElementById('qty-' + id);
    let current = parseInt(qtyInput.value);
    qtyInput.value = Math.max(1, current + change);
    updateSummary();
}

// Calculate selected items total dynamically
function updateSummary() {
    let total = 0;
    let shipping = 125;
    let itemCount = 0;

    checkboxes.forEach(ch => {
        if (ch.checked) {
            let id = ch.value;
            let qty = parseInt(document.getElementById('qty-' + id).value);
            let price = parseFloat(<?php echo json_encode(array_column($_SESSION['cart'], 'price', 'id')); ?>[id]);
            total += price * qty;
            itemCount += qty;
        }
    });

    if (itemCount === 0) {
        summaryDiv.innerHTML = "<p>Select products to see total.</p>";
        return;
    }

    let grand = total + shipping;
    summaryDiv.innerHTML = `
        <div class="d-flex justify-content-between mb-2"><span>Subtotal (${itemCount} items)</span><span>Rs. ${total.toLocaleString()}</span></div>
        <div class="d-flex justify-content-between mb-2"><span>Shipping Fee</span><span>Rs. ${shipping.toLocaleString()}</span></div>
        <div class="d-flex justify-content-between fw-bold"><span>Total</span><span class="text-danger">Rs. ${grand.toLocaleString()}</span></div>
    `;
}
</script>

</body>
</html>
