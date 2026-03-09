<?php
session_start();
if (!isset($_SESSION['aid'])) {
    header('location:signin.php');
} else {
    $aid = $_SESSION['aid'];
    $username = $_SESSION['username'];
    $image = $_SESSION['image'];
}

include 'conntion.php';

// Fetch all orders
$query = "SELECT * FROM buynow ORDER BY order_date DESC";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>All Orders</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <?php include './common/links.php'; ?>
    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            margin-top: 50px;
        }

        table {
            background: #fff;
            border-radius: 10px;
            overflow: hidden;
            cursor: pointer;
        }

        th {
            background-color: #ff6f00;
            color: white;
            text-align: center;
        }

        td {
            vertical-align: middle;
            text-align: center;
        }

        tr:hover {
            background-color: #ffe0b2;
        }

        .modal-img {
            width: 120px;
            height: 120px;
            object-fit: cover;
            border-radius: 10px;
        }

        .status-wrapper {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
        }

        .form-select-sm {
            width: auto;
            padding: 2px 6px;
            font-size: 0.8rem;
        }
    </style>
</head>

<body>

    <div class="container-fluid">
        <div class="row">

            <!-- Sidebar -->
            <?php include './common/sidebar.php'; ?>

            <!-- Main content -->
            <div class="col-12 col-md-10 p-0">
                 <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom px-3">
                    <div class="container-fluid">
                        <a class="navbar-brand fw-bold text-primary" href="./dashmin.php">Dashboard</a>


                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarContent">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarContent">

                            <form class="d-flex mx-auto my-2 my-lg-0">
                                <div class="input-group">
                                    <span class="input-group-text bg-white border-end-0">
                                        <i class="fa-solid fa-search text-primary"></i>
                                    </span>
                                    <input class="form-control border-start-0" type="search" placeholder="Search">
                                </div>
                            </form>


                            <div class="ms-auto d-flex align-items-center">
                                <div class="dropdown me-3">
                                    <a class="nav-link dropdown-toggle" href="#" role="button"
                                        data-bs-toggle="dropdown">
                                        <i class="fa-solid fa-envelope text-primary"></i> Message
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#">Inbox</a></li>
                                        <li><a class="dropdown-item" href="#">Sent</a></li>
                                    </ul>
                                </div>
                                <div class="dropdown me-3">
                                    <a class="nav-link dropdown-toggle" href="#" role="button"
                                        data-bs-toggle="dropdown">
                                        <i class="fa-solid fa-bell text-primary"></i> Notification
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#">New Alerts</a></li>
                                        <li><a class="dropdown-item" href="./logout.php">Logout</a></li>
                                    </ul>
                                </div>
                                <div class="dropdown">
                                    <a class="nav-link d-flex align-items-center" href="#">
                                        <img src="upload/<?php echo $image; ?>" alt="" class="rounded-circle" width="30"
                                            height="30">
                                        <?php echo $username; ?>
                                    </a>

                                </div>
                            </div>
                        </div>
                    </div>
                </nav>





                
<?php



                // === Fetch Stats ===

$today = date('Y-m-d');


$today_orders_query = "SELECT COUNT(*) AS today_orders FROM buynow WHERE DATE(order_date) = '$today'";
$today_orders_result = mysqli_query($conn, $today_orders_query);
$today_orders = mysqli_fetch_assoc($today_orders_result)['today_orders'] ?? 0;


$today_sale_query = "SELECT SUM(price * qty) AS today_sale FROM buynow WHERE DATE(order_date) = '$today'";
$today_sale_result = mysqli_query($conn, $today_sale_query);
$today_sale = mysqli_fetch_assoc($today_sale_result)['today_sale'] ?? 0;

// 📦 Total Orders Count
$total_orders_query = "SELECT COUNT(*) AS total_orders FROM buynow";
$total_orders_result = mysqli_query($conn, $total_orders_query);
$total_orders = mysqli_fetch_assoc($total_orders_result)['total_orders'] ?? 0;

// 💵 Total Revenue (sum of price * qty)
$total_revenue_query = "SELECT SUM(price * qty) AS total_revenue FROM buynow";
$total_revenue_result = mysqli_query($conn, $total_revenue_query);
$total_revenue = mysqli_fetch_assoc($total_revenue_result)['total_revenue'] ?? 0;
?>

                <!-- Stats -->
               <!-- Stats -->
<div class="container my-4">
    <div class="row g-3">
        <div class="col-12 col-sm-6 col-md-3">
            <div class="stat-card">
                <i class="fa-solid fa-chart-line stat-icon"></i>
                <div class="stat-info">
                    <p class="stat-title">Today Orders</p>
                    <p class="stat-value">Rs. <?= number_format($today_orders) ?></p>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-3">
            <div class="stat-card">
                <i class="fa-solid fa-chart-column stat-icon"></i>
                <div class="stat-info">
                    <p class="stat-title">Today Sale</p>
                    <p class="stat-value">Rs. <?= number_format($today_sale, 2) ?></p>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-3">
            <div class="stat-card">
                <i class="fa-solid fa-chart-area stat-icon"></i>
                <div class="stat-info">
                    <p class="stat-title">Total Orders</p>
                    <p class="stat-value">Rs. <?= number_format($total_orders) ?></p>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-3">
            <div class="stat-card">
                <i class="fa-solid fa-chart-pie stat-icon"></i>
                <div class="stat-info">
                    <p class="stat-title">Total Revenue</p>
                    <p class="stat-value">Rs. <?= number_format($total_revenue, 2) ?></p>
                </div>
            </div>
        </div>
    </div>
</div>










                <div class="container">
                    <h3 class="text-center mb-4 fw-bold text-dark">🧾 All Orders</h3>

                    <table class="table table-bordered table-hover text-center align-middle" id="ordersTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Product Name</th>
                                <th>Price (Rs.)</th>
                                <th>Qty</th>
                                <th>Full Name</th>
                                <th>Phone</th>
                                <th>City</th>
                                <th>Status</th>
                                <th>Order Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (mysqli_num_rows($result) > 0) {
                                $i = 1;
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $data_json = htmlspecialchars(json_encode($row), ENT_QUOTES, 'UTF-8');

                                    // Default status and color
                                    $status = "Pending";
                                    $badge_class = "warning";

                                    echo "
                                    <tr onclick='showDetails(this)' data-info='{$data_json}'>
                                        <td>{$i}</td>
                                        <td>{$row['p_name']}</td>
                                        <td>{$row['price']}</td>
                                        <td>{$row['qty']}</td>
                                        <td>{$row['fullname']}</td>
                                        <td>{$row['phone']}</td>
                                        <td>{$row['city']}</td>
                                        <td>
                                            <div class='status-wrapper'>
                                                <span class='badge bg-{$badge_class} status-badge'>{$status}</span>
                                                <select class='form-select form-select-sm status-dropdown'>
                                                    <option selected>Pending</option>
                                                    <option>Processing</option>
                                                    <option>Delivered</option>
                                                    <option>Cancelled</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td>{$row['order_date']}</td>
                                    </tr>";
                                    $i++;
                                }
                            } else {
                                echo "<tr><td colspan='9' class='text-danger'>No orders found.</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>

                <!-- Bootstrap Modal for Details -->
                <div class="modal fade" id="orderModal" tabindex="-1" aria-labelledby="orderModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header bg-warning text-white">
                                <h5 class="modal-title fw-bold" id="orderModalLabel">Order Details</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row g-3">
                                    <div class="col-md-4 text-center">
                                        <img id="productImage" class="modal-img shadow-sm" src="" alt="Product">
                                    </div>
                                    <div class="col-md-8">
                                        <h5 id="productName" class="fw-bold text-dark"></h5>
                                        <p class="mb-1"><strong>Price:</strong> Rs. <span id="productPrice"></span></p>
                                        <p class="mb-1"><strong>Quantity:</strong> <span id="productQty"></span></p>
                                        <p class="mb-1"><strong>Full Name:</strong> <span id="fullName"></span></p>
                                        <p class="mb-1"><strong>Phone:</strong> <span id="phone"></span></p>
                                        <p class="mb-1"><strong>Province:</strong> <span id="province"></span></p>
                                        <p class="mb-1"><strong>City:</strong> <span id="city"></span></p>
                                        <p class="mb-1"><strong>House:</strong> <span id="house"></span></p>
                                        <p class="mb-1"><strong>Area:</strong> <span id="area"></span></p>
                                        <p class="mb-1"><strong>Colony:</strong> <span id="colony"></span></p>
                                        <p class="mb-1"><strong>Address:</strong> <span id="address"></span></p>
                                        <p class="mb-0"><strong>Order Date:</strong> <span id="orderDate"></span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div> <!-- /Main content -->
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // 🟢 Modal details
        function showDetails(row) {
            const data = JSON.parse(row.getAttribute('data-info'));

            document.getElementById('productName').innerText = data.p_name || 'N/A';
            document.getElementById('productPrice').innerText = data.price || '0';
            document.getElementById('productQty').innerText = data.qty || '1';
            document.getElementById('fullName').innerText = data.fullname || '-';
            document.getElementById('phone').innerText = data.phone || '-';
            document.getElementById('province').innerText = data.province || '-';
            document.getElementById('city').innerText = data.city || '-';
            document.getElementById('house').innerText = data.house || '-';
            document.getElementById('area').innerText = data.area || '-';
            document.getElementById('colony').innerText = data.colony || '-';
            document.getElementById('address').innerText = data.address || '-';
            document.getElementById('orderDate').innerText = data.order_date || '-';
            document.getElementById('productImage').src = "upload/" + (data.image || 'noimage.jpg');

            const modal = new bootstrap.Modal(document.getElementById('orderModal'));
            modal.show();
        }

        // 🟢 Status dropdown change — updates color + text instantly
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.status-dropdown').forEach(select => {
                select.addEventListener('change', function() {
                    const status = this.value;
                    const badge = this.closest('.status-wrapper').querySelector('.status-badge');
                    badge.textContent = status;

                    badge.className = 'badge status-badge';
                    if (status === 'Pending') badge.classList.add('bg-warning');
                    if (status === 'Processing') badge.classList.add('bg-info');
                    if (status === 'Delivered') badge.classList.add('bg-success');
                    if (status === 'Cancelled') badge.classList.add('bg-danger');
                });
            });
        });
    </script>

</body>
</html>
