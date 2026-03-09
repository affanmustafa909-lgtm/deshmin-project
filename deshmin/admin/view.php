<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Product</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./style.css">
</head>

<body>



    
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
                                        <?php echo $result['price']; ?>
                                    </td>
                                    <td> <a href="update.php?id=<?php echo $result['id']; ?>"><i class="far fa-edit ms-3"></i></a>
                            <a href="delete.php?id=<?php echo $result['id']; ?>"><i class="far fa-trash-alt ms-3 text-danger"></i></a></td>


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
</body>

</html>