

<?php
//                        (Session)
session_start();

 
include('conntion.php');

if(isset($_POST['login'])){
    $email= $_POST['e_address'];
    $password= $_POST['password'];

//  Query

$sql = "SELECT * FROM `signup` WHERE e_address = '$email' AND password = '$password' ";

    $result = mysqli_query($conn, $sql);
    
    $row = mysqli_num_rows($result);

   if($row > 0){ 
     $row1 = mysqli_fetch_assoc($result);
    $_SESSION['aid'] = $row1['id'];
    $_SESSION['username'] = $row1['username'];
    $_SESSION['image'] = $row1['image'];
    header('location:dashmin.php');   
   }
   else{
    ?>
    <script>
            alert("User name & Email not match");
    </script>
    <?php
   }
}
 
?>







<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign in</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="card shadow-sm p-4" style="max-width: 400px; width: 100%;">
            <h4 class="text-primary fw-bold mb-3"># DASHMIN <span class="text-dark fw-normal">Sign In</span></h4>

            <form action="" method="POST" >

                <div class="mb-3">
                    <input type="email" class="form-control" name="e_address" placeholder="Email address" required>
                </div>
                <div class="mb-3">
                    <input type="password" class="form-control" name="password" placeholder="Password" required>
                </div>


                <button type="submit" class="btn btn-primary w-100" name="login">Sign In</button>
                <p class="outer-link">Don't have an account? <a href="signup.php">Register here </a>
                            </p>
            </form>

            <div class="text-center mt-3">
                <small>Already have an account? <a href="./signup.php" class="text-primary">Sign up</a></small>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>