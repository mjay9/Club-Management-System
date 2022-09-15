<?php
session_start();
session_regenerate_id (true);
$active = 1;
require('_user_auth.php');

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true){
  header("location: https://uca-srmu.000webhostapp.com/login.php");
  exit;
}
else if ((isset($_SESSION['loggedin'])) || ($_SESSION ['loggedin'] = true)){ 
  include '_dbconnect.php';
  $username = $_SESSION['username'];
  $sql = "SELECT * FROM tfc WHERE `username` = '$username'";
  $result = mysqli_query($conn, $sql);
  $num = mysqli_num_rows($result); 

  if($num == 1){
    while($row = mysqli_fetch_assoc($result)){
      $_SESSION['username'] = $row['username'];
      $_SESSION['name'] = $row['name'];
      $_SESSION['institute'] = $row['institute'];
      $_SESSION['course'] = $row['course'];
      $_SESSION['branch'] = $row['branch'];
      $_SESSION['year'] = $row['year'];
      $_SESSION['club'] = $row['club'];
      $_SESSION['domain'] = $row['domain'];
      $_SESSION['contact'] = $row['contact'];
      $_SESSION['email'] = $row['email'];
      $_SESSION['mtype'] = $row['mtype'];
      $_SESSION['validity'] = $row['validity'];
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <title>Welcome | Tech Fusion</title>
   
  </head>
  <body>
      
  <?php 
  include 'mynav.php';  
  ?>  

 <div class="container my-4">
 <div class="alert alert-info" role="alert">
  <h4 class="alert-heading">Welcome - <?php echo $_SESSION['name']; ?></h4>
  <hr>
  <p>
  <?php 
  echo "University Roll No. : ".$_SESSION['username']."<br>"."Institute : ".$_SESSION['institute']."<br>"."Course Enrolled : ".$_SESSION['course']."<br>"."Year : ".$_SESSION['year']."<br>"."Domain : ".$_SESSION['domain']."<br>"."Contact : ".$_SESSION['contact']."<br>"."Email : ".$_SESSION['email']."<br>";

  if     ($_SESSION['mtype'] == "GEN"){ echo "Designation : General Member";}
  else if($_SESSION['mtype'] == "FCC"){ echo "Designation : Faculty Club Coordinator";}
  else if($_SESSION['mtype'] == "VCC"){ echo "Designation : Veteran Club Coordinator";}
  else if($_SESSION['mtype'] == "CC"){ echo "Designation : Club Coordinator";}
  else if($_SESSION['mtype'] == "ACC"){ echo "Designation : Assistant Club Coordinator";}
  else if($_SESSION['mtype'] == "CV"){ echo "Designation : Club Volunteer";}
  else if($_SESSION['mtype'] == "CFCC"){ echo "Designation : Central Faculty Club Coordinator";}
  else if($_SESSION['mtype'] == "UCCC"){ echo "Designation : Central Club Coordinator";}
  else {echo "Designation : Undefined";}
  
  echo "<br>";

  if ($_SESSION['validity'] == 9001) {echo "Membership Status : Permanent";}
  else if ($_SESSION['validity'] <= 90) {echo "Membership Status : Active (Expiring in ".$_SESSION['validity']." days)";}
  ?>
  </p>
  <hr>
  <p class="mb-0">For General Members & Club Volunteers <br> Make sure to participate/organize an event in every 90 days to keep your membership status active.</p>
</div>
 </div>

  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script>
    setInterval(function(){
      check_user();
    },5000);
    function check_user(){
      jQuery.ajax({
        url:"_user_auth.php",
        type:'POST',
        data:'type=ajax',
        success:function(result){
          if(result=='logout'){
            window.location.href='https://uca-srmu.000webhostapp.com/logout2.php';
          }
        }
      })
    }
  </script>  
  <!-- <script>
    $(document).ready(function(){
      var is_session_expired = 'no';
        function check_session()
        {
          $.ajax({
            url:"_check_session.php",
            method:"POST",
            success:function(data)
            {
              if(data=='1'){
                is_session_expired = 'yes';
                window.location.replace("/logout.php");
              }
            }
          })
        }
        var count_interval = setInterval(function(){
          check_session();
          if(is_session_expired = 'yes'){
            clearInterval(count_interval);
          }
        }, 5000);
    })
  </script> -->
</body>
</html>