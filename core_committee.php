<?php
include('_dbconnect.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="_core_committee_css1.php">
    <link rel="stylesheet" type="text/css" href="_core_committee_css2.php">
    <title>Core Committee | TFC</title>
</head>
<body>
    <?php
    include ('_txteffect.php');
    ?>

    <section>
    <div class="container">
        <div class="card">
            <div class="bg-image">
                <img src="img/cc/bg-image.jpg" alt="">
            </div>
            <div class="pic">
                <img src="img/cc/Er. Abhishek Kumar Saxena.jpeg" alt="">
            </div>
            <div class="info">
                <h3>Er. Abhishek Kumar Saxena</h3>
                <span><i class="fas fa-user-shield"></i> Faculty Club Coordinator</span>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident, sunt.</p>
                <div class="icons">
                    <a href="#" class="fab fa-facebook-f"></a>
                    <a href="#" class="fab fa-twitter"></a>
                    <a href="#" class="fab fa-instagram"></a>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="card">
            <div class="bg-image">
                <img src="img/cc/bg-image.jpg" alt="">
            </div>
            <div class="pic">
                <img src="img/cc/Muskan Budhraja.jpeg" alt="">
            </div>
            <div class="info">
                <h3>Muskan Budhraja</h3>
                <span><i class="fas fa-user-astronaut"></i> Veteran Club Coordinator</span>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident, sunt.</p>
                <div class="icons">
                    <a href="#" class="fab fa-facebook-f"></a>
                    <a href="#" class="fab fa-twitter"></a>
                    <a href="#" class="fab fa-instagram"></a>
                </div>
            </div>
        </div>
    </div> 

    <div class="container">
        <div class="card">
            <div class="bg-image">
                <img src="img/cc/bg-image.jpg" alt="">
            </div>
            <div class="pic">
                <img src="img/cc/Tushar Vats.jpeg" alt="">
            </div>
            <div class="info">
                <h3>Tushar Vats</h3>
                <span><i class="fas fa-user-astronaut"></i> Club Coordinator</span>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis, reiciendis.</p>
                <div class="icons">
                    <a href="#" class="fab fa-facebook-f"></a>
                    <a href="#" class="fab fa-twitter"></a>
                    <a href="#" class="fab fa-instagram"></a>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="bg-image">
                <img src="img/cc/bg-image.jpg" alt="">
            </div>
            <div class="pic">
                <img src="img/cc/user2.jpg" alt="">
            </div>
            <div class="info">
                <h3>Mritunjay Singh</h3>
                <span><i class="fas fa-user-astronaut"></i> Club Coordinator</span>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident, sunt.</p>
                <div class="icons">
                    <a href="#" class="fab fa-facebook-f"></a>
                    <a href="#" class="fab fa-twitter"></a>
                    <a href="#" class="fab fa-instagram"></a>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <?php
        $sql = "SELECT * FROM `cc` WHERE `designation` = 'Assistant Club Coordinator' ORDER BY RAND()";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result)) {
            $picture = "/img/cc/".$row['name'].".jpeg";
            echo "<div class='card'>
                <div class='bg-image'>
                    <img src='/img/cc/bg-image.jpg' alt=''>
                </div>
                <div class='pic'>
                    <img src = '$picture' alt=''>
                </div>
                <div class='info'>
                    <h3>".$row['name']."</h3>
                    <span><i class='fas fa-user-astronaut'></i> ".$row['designation']."</span>
                    <p>".$row['message']."</p>
                    <div class='icons'>
                        <a href='#' class='fab fa-facebook-f'></a>
                        <a href='#' class='fab fa-twitter'></a>
                        <a href='#' class='fab fa-instagram'></a>
                    </div>
                </div>
               </div>";
        }
        ?>
    </div>

    <div class="container">
        <?php
        $sql = "SELECT * FROM `cc` WHERE `designation` = 'Volunteer' ORDER BY RAND()";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result)) {
            $picture = "/img/cc/".$row['name'].".jpeg";
            echo "<div class='card'>
                    <div class='bg-image'>
                        <img src='/img/cc/bg-image.jpg' alt=''>
                    </div>
                    <div class='pic'>
                        <img src = '$picture' alt=''>
                    </div>
                    <div class='info'>
                        <h3>".$row['name']."</h3>
                        <span><i class='fas fa-user-astronaut'></i> ".$row['designation']."</span>
                        <p>".$row['message']."</p>
                        <div class='icons'>
                            <a href='#' class='fab fa-facebook-f'></a>
                            <a href='#' class='fab fa-twitter'></a>
                            <a href='#' class='fab fa-instagram'></a>
                        </div>
                    </div>
                   </div>";
        }
        ?>
    </div>
    </section>
</body>
</html>