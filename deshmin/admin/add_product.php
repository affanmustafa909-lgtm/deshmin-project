<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">



<?php

include 'conntion.php'; 

if(isset($_POST['submit'])){
    $p_name = $_POST['p_name'];
    $p_des  = $_POST['p_des'];
    $category = $_POST['category'];
    $price  = $_POST['price'];
    $image = $_FILES['image'];
    $fileName = $image['name'];
    move_uploaded_file($image['tmp_name'],'upload/'.$fileName);
    
    $addRecord = "INSERT INTO `add_product`(`p_name`, `p_des`, `category`, `price`, `image`)
                  VALUES ('$p_name','$p_des', '$category','$price','$fileName')";

$query = mysqli_query($conn, $addRecord);

header("Location: dashmin.php");
exit();
}

?>




    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">

                <div class="card shadow-lg border-0 rounded-4">
                    <div class="card-body p-4">
                        <h3 class="text-center mb-4 text-primary">Add New Product</h3>

                        <form action="" method="POST" enctype="multipart/form-data">

                            <div class="mb-3">
                                <label class="form-label">Enter Product Name</label>
                                <input type="text" class="form-control" name="p_name" placeholder="Enter Name">
                            </div>


                            <div class="mb-3">
                                <label class="form-label">Enter Product Description</label>
                                <textarea class="form-control" name="p_des" rows="3"
                                    placeholder="Write a short description..."></textarea>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Select Category :</label>
                                <select class="form-select" name="category">
                                    <option value="All Categories">All Categories</option>
                                    <option value="Flash Sale">Flash Sale</option>
                                    <option value="Categories">Categories</option>
                                    <option value="Just For You">Just For You</option>
                                    

                                </select>
                            </div>


                            <div class="mb-3">
                                <label class="form-label">Enter Product Price</label>
                                <input type="number" class="form-control" name="price" placeholder="e.g. 1200">
                            </div>


                            <div class="mb-3">
                                <label class="form-label">Upload Product Image</label>
                                <input type="file" class="form-control" name="image">
                            </div>

                            <!-- Submit Button -->
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary btn-lg rounded-pill" name="submit">Submit
                                    Product</button>
                            </div>

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html> 