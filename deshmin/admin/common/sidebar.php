<div class="col-12 col-md-2 sidebar">
                <h4 class="text-primary fw-bold"># DASHMIN</h4>

                <div class="profile text-center my-3">
                    <div class="position-relative d-inline-block">
                        <img src="upload/<?php echo $image; ?>" alt="" class="rounded-circle" width="50" height="50">
                        <span
                            class="position-absolute bottom-0 end-0 translate-middle p-2 bg-success border border-white rounded-circle"></span>
                        <h6 class="mt-2 fw-bold">
                            <?php echo $username; ?>
                        </h6>
                        <small class="text-muted">Admin</small>
                    </div>
                </div>

                <a href="#" class="active"><i class="fa-solid fa-gauge"></i> Dashboard</a>
                <div class="dropdown me-3">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                        <i class="fa-solid fa-bell text-primary"></i> Products
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="add_product.php" target="blank">Add Product</a></li>
                        <li><a class="dropdown-item" href="./view.php" target="blank">View Products</a></li>
                    </ul>
                </div>

                <a href="./order.php" target="blank"><i class="fa-regular fa-folder"></i> Order</a>
                <a href="#"><i class="fa-solid fa-pen-to-square"></i> Forms</a>
                <a href="#"><i class="fa-solid fa-table"></i> Tables</a>
                <a href="#"><i class="fa-solid fa-chart-bar"></i> Charts</a>
                <a href="#"><i class="fa-solid fa-file"></i> Pages</a>
            </div>