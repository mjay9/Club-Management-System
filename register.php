<?php

$insert=false;
$showError=false;
include ('_security.php');
$ipaddress = get_client_ip();

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
  include '_dbconnect.php';
  include '_sanitization_tunnel.php';
  $name = xss($_POST['name']);
  $roll = xss($_POST['username']);
  $institute = xss($_POST['institute']);
  $course = xss($_POST['course']);
  $branch = xss($_POST['branch']);
  $year = xss($_POST['year']);
  $club = xss($_POST['club']);
  $domain = xss($_POST['domain']);
  $contact = xss($_POST['contact']);
  $email = xss($_POST['email']);
  $password = xss($_POST['password']);
  
  $cp = 1;
  $hash = password_hash($password, PASSWORD_DEFAULT);

  //check whether this username already exist in approved
  $existSql = "SELECT * FROM `tfc` WHERE `username`='$roll'";
  $result1 = mysqli_query($conn, $existSql);
  $numExistRows = mysqli_num_rows($result1);

  if($numExistRows > 0){
    //exists = true;
    $showError = true;
  }
  else {
      //exist = false;

        //$sql = "INSERT INTO tfc (Full Name, Roll No., Institute, Course, Branch, Year, Club, Domain, Contact, Email, Password) VALUES ('$name', '$roll', '$institute', '$course', '$branch', '$year', '$club', '$domain', '$contact', '$email', '$password')";
        $sql = "INSERT INTO `tfc` (`name`, `username`, `institute`, `course`, `branch`, `year`, `club`, `domain`, `contact`, `email`, `password`, `ip`, `cp`, `timestamp`) VALUES ('$name', '$roll', '$institute', '$course', '$branch', '$year', '$club', '$domain', '$contact', '$email', '$hash', '$ipaddress', '$cp', current_timestamp())";
        
        $result = mysqli_query($conn, $sql);
        //echo mysqli_error($conn);
        if($result)
        {
          $insert = true;
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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="_styleRegister.php">  

  <title>Register | TFC</title>

</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
    <a class="navbar-brand tfc" href="#">Tech Fusion Club</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
        aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="https://uca-srmu.000webhostapp.com/index.html">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="#">Blog</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="https://uca-srmu.000webhostapp.com/login">Login</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container my-3">

  <?php
    if ($insert)
    {
      echo "<div class='alert alert-success alert-dismissible fade show alert-box' role='alert'>
      <strong>Success! </strong>Your registration request is submitted successfully. You will be able to login using your credentials once your request will be approved by Chief Club Coordinator.
      <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
    </div>";
      $insert = false;
    }    

    else if ($showError)
    {
      echo "<div class='alert alert-warning alert-dismissible fade show alert-box' role='alert'>
      <strong>Member Already Exists</strong>
      <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
    </div>";
      $showError = false;
    }     
  ?>

  <div class="container mt-5">
        <h3 class = "alert-info text-center mb-5 p-3">
            TFC Membership Application
        </h3>
  </div>  
    <form class="row g-3 needs-validation" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

      <div class="col-md-6">
        <label for="inputName" class="form-label">Full Name</label>
        <input type="text" name="name" class="form-control" id="inputName" placeholder="TFC Member" required>       
      </div>

      <div class="col-md-6">
        <label for="inputRoll" class="form-label">University Roll Number</label>
        <input type="text" name="username" maxlength="15" class="form-control" id="inputRoll" placeholder="2020XXXXXXXXXXX" required>
      </div>

      <div class="col-md-4">
        <label for="inputInstitute" class="form-label">Institute</label>
        <select id="inputInstitute" class="form-select" name="institute" required>
          <option selected>---Choose---</option>
          <option>Institute of Technology</option>
          <option>Institute of Pharmacy</option>
          <option>Institute of Agricultural Sciences & Technology</option>
          <option>Institute of Architecture & Planning</option>
          <option>Institute of Bio-Sciences & Technology</option>
          <option>Institute of Legal Studies</option>
          <option>Institute of Education & Research</option>
          <option>Institute of Mgmt. Com. & Economics</option>
          <option>Institute of Diploma Studies</option>
          <option>Institute of Natural Sciences & Humanities</option>
          <option>Institute of Media Studies</option>
        </select>
      </div>
      <div class="col-md-2">
        <label for="inputCourse" class="form-label">Course</label>
        <select id="inputCourse" class="form-select" name="course" required> 
        <option selected>---Choose---</option>
          <option>Bachelor of Technology</option>
          <option>Bachelor of Computer Appications</option>
          <option>Bachelor of Science</option>
          <option>Master of Technology</option>
          <option>Master of Computer Application</option>
          <option>Master of Science</option>
          <option>Bachelor of Pharmacy</option>
          <option>Diploma in Pharmacy</option>
          <option>Bachelor of Architecture</option>
          <option>Bachelor of Interior Design</option>
          <option>Bacheor of Law (LLB)</option>
          <option>Bachelor of Education</option>
          <option>Bacelor of Business Administration</option>
          <option>Bacelor of Commerce</option>
          <option>Master of Business Administration</option>
          <option>Diploma in Engg.</option>
          <option>Bachelor of Journalism & Mass Com.</option>
          <option>Master of Journalism & Mass Com.</option>


        </select>
      </div>
      <div class="col-md-4">
        <label for="inputBranch" class="form-label">Branch/Stream</label>
        <select id="inputBranch" class="form-select" name="branch" required>
        <option selected>NA</option>
        <option>CSE</option>
        <option>ME</option>
        <option>ECE</option>
        <option>EE</option>
        <option>CE</option>
        <option>CA</option>
        </select>
      </div>
      <div class="col-md-2">
        <label for="inputYear" class="form-label">Year</label>
        <select id="inputYear" class="form-select" name="year" required>
          <option selected>Choose...</option>
          <option>1st</option>
          <option>2nd</option>
          <option>3rd</option>
          <option>4th</option>
          <option>5th</option>
        </select>
      </div>
      <!--- Selection for All Clubs 
      <div class="col-md-3">
        <label for="inputClub" class="form-label">Club Applying For</label>
        <select id="inputClub" class="form-select" name="club">
          <option>Choose...</option>
          <option selected>Tech Fusion Club</option>
          <option>Business Buzz Club</option>
          <option>Business Consultancy Club</option>
          <option>Expression Club</option>
          <option>Manch Club</option>
          <option>Razzmatazz Club</option>
          <option>Sur Jhankar Club</option>
          <option>Srijan Club</option>
          <option>Beat the Beats Club</option>
          <option>Sportizz Club</option>
          <option>Snapshot Club</option>
          <option>Golden Pen Club</option>
          <option>Ozone Club</option>
          <option>Spic Macay</option>
          <option>Positive Psychology</option>
          <option>NCC</option>
          <option>NSS</option>
          <option>1090</option>
          <option>Apni Pathsala</option>
        </select>
      </div>
      --->
      <div class="col-md-3">
        <label for="inputClub" class="form-label">Club Applying For</label>
        <input type="text" value="Tech Fusion Club" name="club" class="form-control" id="inputClub" readonly>
      </div>
      <div class="col-md-3">
        <label for="inputDomain" class="form-label">Technical Interests</label>
        <input type="text" name="domain" class="form-control" id="inputDomain" placeholder="Research & Development" required>
      </div>
      <div class="col-md-6">
        <label for="inputContact" class="form-label">Contact Number</label>
        <input type="text" name="contact" maxlength="10" class="form-control" id="inputContact" placeholder="Without prefix (+91)" required>
      </div>

      <div class="col-md-6">
        <label for="inputEmail" class="form-label">Email</label>
        <input type="email" name="email" class="form-control" id="inputEmail" placeholder="techfusion@srmu.ac.in" required>
      </div>

      <div class="col-md-6">
        <label for="inputPassword" class="form-label">Create Password</label>
        <input type="password" name="password" class="form-control" id="inputPassword" required>
      </div>



      <div class="col-12 text-center my-4">
        <button type="submit" class="w-50 btn btn-lg btn-primary">Register</button>
      </div>
    </form>
  </div>
  <div class="container-fluid">
      <hr>
      <div class="container text-center">
      <p class="mt-5 mb-3 text-muted">&copy; 2019–<?php echo date("Y");?> | Tech Fusion Club<br>Shri Ramswaroop Memorial University, Lucknow</p>
      </div>
  </div>   

  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW"
    crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
    crossorigin="anonymous"></script>

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