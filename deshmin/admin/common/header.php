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






                 <!-- Stats -->
                <div class="container my-4">
                    <div class="row g-3">
                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="stat-card">
                                <i class="fa-solid fa-chart-line stat-icon"></i>
                                <div class="stat-info">
                                    <p class="stat-title">Today Order</p>
                                    <p class="stat-value">$1234</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="stat-card">
                                <i class="fa-solid fa-chart-column stat-icon"></i>
                                <div class="stat-info">
                                    <p class="stat-title">Today Sale</p>
                                    <p class="stat-value">$1234</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="stat-card">
                                <i class="fa-solid fa-chart-area stat-icon"></i>
                                <div class="stat-info">
                                    <p class="stat-title">Total sale</p>
                                    <p class="stat-value">$1234</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="stat-card">
                                <i class="fa-solid fa-chart-pie stat-icon"></i>
                                <div class="stat-info">
                                    <p class="stat-title">Total Revenue</p>
                                    <p class="stat-value">$1234</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

































