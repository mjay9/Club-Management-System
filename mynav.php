<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tech Fusion</title>
    <link rel="stylesheet" href="mynav.css">
    <script src="https://kit.fontawesome.com/463bfe9ee5.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="fixed-top">
        <nav>
            <div class="logo">Tech Fusion</div>
            <input type="checkbox" id="click">
            <label for="click" class="menu-btn">
                <i class="fas fa-bars"></i>
            </label>
            <?php  

    if($active==1){  
        echo '<ul>
            <li><a class="active" href="https://uca-srmu.000webhostapp.com/welcome">Home</a></li>
            <li><a href="#">Approval Request</a></li>
            <li><a href="https://uca-srmu.000webhostapp.com/members">View/Edit</a></li>
            <li><a href="#">Core Committee</a></li>
            <li><a href="https://uca-srmu.000webhostapp.com/logout">Logout</a></li>
        </ul>';
    }
    else if($active==2){  
        echo '<ul>
            <li><a href="https://uca-srmu.000webhostapp.com/welcome">Home</a></li>
            <li><a class="active" href="#">Approval Request</a></li>
            <li><a href="https://uca-srmu.000webhostapp.com/members">View/Edit</a></li>
            <li><a href="#">Core Committee</a></li>
            <li><a href="https://uca-srmu.000webhostapp.com/logout">Logout</a></li>
        </ul>';
    }
    else if($active==3){  
        echo '<ul>
            <li><a href="https://uca-srmu.000webhostapp.com/welcome">Home</a></li>
            <li><a href="#">Approval Request</a></li>
            <li><a class="active" href="https://uca-srmu.000webhostapp.com/members">View/Edit</a></li>
            <li><a href="#">Core Committee</a></li>
            <li><a href="https://uca-srmu.000webhostapp.com/logout">Logout</a></li>
        </ul>';
    }
    else if($active==4){  
        echo '<ul>
            <li><a href="https://uca-srmu.000webhostapp.com/welcome">Home</a></li>
            <li><a href="#">Approval Request</a></li>
            <li><a href="https://uca-srmu.000webhostapp.com/members">View/Edit</a></li>
            <li><a class="active" href="#">Core Committee</a></li>
            <li><a href="https://uca-srmu.000webhostapp.com/logout">Logout</a></li>
        </ul>';
    }

?>
        </nav>
    </div>
    </div>
    <div class="container cust">
    </div>

    </nav>
</body>
</html>