<?php
session_start();
echo $_SESSION['cp'];
if (!isset($_SESSION['cp']) || $_SESSION ['cp'] != true){
    header ("location: login");
    exit;
}
else{
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
      include 'dbconnect.php';
      $password = $_POST['password'];
      $cpassword = $_POST['cpassword'];

        if($password == $cpassword){
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $username = $_SESSION['username'];
            $sql = "UPDATE `tfc` SET `password` ='$hash', `cp`= '1' WHERE `username` = '$username'";
            $result = mysqli_query($conn, $sql);

            if($result){
                $update = true;
                $_SESSION['loggedin'] = true;
                header ("location: welcome");
            }
        }
        else{
            $showError = "Passwords do not match";
        }
    }    
}   
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>Tech Fusion</title>

    <!-- Custom styles for this template -->
    <link href="login.css" rel="stylesheet">

</head>

<body class="text-center">

    <main class="form-signin">
        <form action="ch_pass.php" method="post">
            <img class="mb-4" src="logo1.png" alt="" width="100" height="100">
            <h1 class="h3 mb-3 fw-normal">Change Password</h1>

            <div class="form-floating">
                <input type="password" class="form-control" name="password" id="floatingInput"
                    placeholder="2020XXXXXXXXXXX">
                <label for="floatingInput">Create New Password</label>
            </div> <br>
            <div class="form-floating">
                <input type="password" class="form-control" name="cpassword" id="floatingPassword"
                    placeholder="Password">
                <label for="floatingPassword">Confirm New Password</label>
            </div>
            <br>
            <button class="w-100 btn btn-lg btn-primary" type="submit">Submit</button>
            <p class="mt-5 mb-3 text-muted">© 2019–2021 Tech Fusion Club</p>
        </form>
    </main>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf"
        crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    -->
</body>

</html>