<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="card shadow-sm p-4" style="max-width: 400px; width: 100%;">
            <h4 class="text-primary fw-bold mb-3"># DASHMIN <span class="text-dark fw-normal">Sign Up</span></h4>

            <form action="" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <input type="text" class="form-control"name="username" placeholder="Username" required>
                </div>
                <div class="mb-3">
                    <input type="email" class="form-control" name="e_address" placeholder="Email address" required>
                </div>
                <div class="mb-3">
                    <input type="password" class="form-control" name="password" placeholder="Password" required>
                </div>
                <div class="mb-3">
            Reference: <input type="file" class="form-control" name="image" placeholder="Reference" required>
            </div>

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="checkMe">
                        <label class="form-check-label" for="checkMe">Check me out</label>
                    </div>
                    <a href="#" class="text-decoration-none small">Forgot Password</a>
                </div>

                <button type="submit" class="btn btn-primary w-100" name="submit">Sign Up</button>
            </form>

            <div class="text-center mt-3">
                <small>Already have an account? <a href="./signin.php" class="text-primary">Sign In</a></small>
            </div>
        </div>
    </div>



    <?php

    // connection include 

    
    include 'conntion.php';

    // condition 

    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $e_address = $_POST['e_address'];
        $password = $_POST['password'];
        $image = $_FILES['image'];
        $filename = $image['name'];
        move_uploaded_file($image['tmp_name'],'upload/'.$filename);

        // Insert Query 

        $insertquery = "INSERT INTO `signup`(`username`, `e_address`, `password`, `image`) 
                VALUES ('$username','$e_address','$password','$filename')";


         $result = mysqli_query($conn, $insertquery);

         if($result){
            header('location:signin.php');
         }else {
            ?>
            <script>
                alert("Sorry! User Registration Unsuccessful..");
            </script>


    <?php
         }
    }

  ?>






    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>