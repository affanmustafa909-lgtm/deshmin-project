<?php
session_start();
if (!isset($_SESSION['aid'])) {
    header('location:signin.php');
} else {
    $aid = $_SESSION['aid'];
    $username = $_SESSION['username'];
    $image = $_SESSION['image'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Layout</title>

    <?php
    include './common/links.php';
    ?>

</head>

<body>




    <div class="container-fluid">
        <div class="row">

            <!-- Sidebar -->

            <?php
            include './common/sidebar.php';
            ?>

            <!-- Main content -->
            <div class="col-12 col-md-10 p-0">

                <?php
            include './common/header.php';
            ?>

                <!-- Charts/Images -->
                <div class="container my-4">
                    <div class="row g-3">
                        <div class="col-12 col-md-6">
                            <img src="" class="card-img-top" alt="Chart 1">
                        </div>
                        <div class="col-12 col-md-6">
                            <img src="" class="card-img-top" alt="Chart 2">
                        </div>
                    </div>
                </div>

                <!-- Recent Sales Table -->



                <?php

include 'conntion.php';

$view = "SELECT * FROM `add_product`";

$query = mysqli_query($conn, $view);

while($result = mysqli_fetch_array($query)){




?>


                <div class="card-custom">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h6 class="mb-0">Recent Sales</h6>
                        <a href="#" class="text-primary small">Show All</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-middle">
                            <thead>
                                <tr>
                                    <th><input type="checkbox"></th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Category</th>
                                    <th>Price</th>

                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php

                            $i = 1;
                            while($result = mysqli_fetch_assoc($query)){
                                ?>

                                <tr>
                                    <td scope="row">
                                        <?php echo $i++; ?>
                                    </td>
                                    <td><img src="upload/<?php echo $result['image']; ?>" width="100px" alt=""></td>
                                    <td>
                                        <?php echo $result['p_name']; ?>
                                    </td>
                                    <td>
                                        <?php echo $result['p_des']; ?>
                                    </td>
                                    <td>
                                        <?php echo $result['category']; ?>
                                    </td>
                                    <td>
                                        <?php echo $result['price']; ?>
                                    </td>
                                    <td> <a href="update.php?id=<?php echo $result['id']; ?>"><i
                                                class="far fa-edit ms-3"></i></a>
                                        <a href="delete.php?id=<?php echo $result['id']; ?>"><i
                                                class="far fa-trash-alt ms-3 text-danger"></i></a>
                                    </td>


                                </tr>
                                <?php
                        }
                                ?>


                            </tbody>
                        </table>
                        <?php
                        }
                        ?>
                    </div>
                </div>

            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>