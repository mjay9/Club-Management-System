<?php
session_start();
$unapprove = false;
$wrong_pass = false;
$not_exist = false;
$alreadyLoggedin = false;

include ('_security.php');
$ipaddress = get_client_ip();

if(isset($_SESSION["loggedin"])){
    header ("location: https://uca-srmu.000webhostapp.com/welcome");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    include '_dbconnect.php';
    include '_sanitization_tunnel.php';
    $username = xss($_POST['username']);
    $password = xss($_POST['password']);
  
    $sql = "SELECT * FROM tfc WHERE `username` = '$username'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);

    if($num == 1){
        while($row = mysqli_fetch_assoc($result)){
            if (password_verify($password, $row['password'])){
                    // $name = $row['name'];
                    $cp = $row['cp'];
                    $username = $row['username'];
                    $name = $row['name'];
                    $approval = $row['approval'];
                    $status = $row['login_status'];

                if ($approval == 1){
                    if($cp == 0){
                        // session_start();    //remove this second session_start() if any issue arises
                        $_SESSION['cp'] = true;
                        $_SESSION['username'] = $username;
                        $_SESSION['name'] = $name;
                        header ("location: https://uca-srmu.000webhostapp.com/ch_pass");
                        exit;
                    }

                    else{

                        if($status == 1){
                            $alreadyLoggedin = true;
                        }

                        else{
                            $login = true;
                            // session_start();    //remove this second session_start() if any issue arises
                            $_SESSION["loggedin"] = true;
                            $_SESSION['username'] = $username;
                            $_SESSION['name'] = $name;

                            $name = $_SESSION['name'];
                            $username = $_SESSION['username'];
                            $sql1 = "UPDATE `tfc` SET `login_status` = '1' WHERE `tfc`.`username` = '$username'";
                            $result1 = mysqli_query($conn, $sql1);
                            $sql2 = "INSERT INTO `session` (`name`, `username`, `ip`, `timestamp`) VALUES ('$name', '$username', '$ipaddress', current_timestamp())";        
                            $result2 = mysqli_query($conn, $sql2);

                            header ("location: https://uca-srmu.000webhostapp.com/welcome");
                            exit;
                        }
                    } 
                }
                else{
                    $unapprove = true;
                }  
            }
            else{
                $wrong_pass = true ;
            }
        }  
    }
    else{
        $not_exist = true;
    }
}    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login | TFC</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sign-in/">

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">


    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>


    <!-- Custom styles for this template -->
    <link href="https://uca-srmu.000webhostapp.com/login.css" rel="stylesheet">
</head>

<body class="text-center">

    <main class="form-signin">
        <form action="<?php echo "https://uca-srmu.000webhostapp.com".htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        
        <?php
          
            if ($not_exist)
            {
                echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                <strong>Oops! </strong>User does not exist
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>";
                $not_exist = false;
            }
            else if ($wrong_pass)
            {
                echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                <strong>Oops! </strong>Password mismatch
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>";
                $wrong_pass = false;
            }
            else if ($unapprove)
            {
                echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                <strong>Oops! </strong>Your registration request is still pending for approval
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>";
                $unapprove = false;
            }
            else if ($alreadyLoggedin)
            {
            echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
            <strong>Session Already Active</strong>
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
            $$alreadyLoggedin = false;
            }  

        ?>
            <img class="mb-4" src="/img/login.png" alt="" width="100" height="140">
            <h1 class="h3 mb-3 fw-normal">University Club Alliance</h1>

            <div class="form-floating">
                <input type="text" class="form-control" name="username" maxlength="15" id="floatingInput"
                    placeholder="2020XXXXXXXXXXX" required>
                <label for="floatingInput">Username</label>
            </div> <br>
            <div class="form-floating">
                <input type="password" class="form-control" name="password" autocomplete="on" id="floatingPassword"
                    placeholder="Password" required>
                <label for="floatingPassword">Password</label>
            </div>
<br>
            <button class="w-100 btn btn-lg btn-primary" type="submit">Sign In</button>
            <p class="mt-5 mb-3 text-muted">&copy; 2019–<?php echo date("Y");?> | Tech Fusion Club</p>
        </form>
    </main>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    -->
    <script>
      if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
      }
    </script>
    
</body>

</html>
