<?php
session_start();
session_regenerate_id (true);
include '_dbconnect.php';
$active=3;

    $update=false;
    $delete = false;

if (!isset($_SESSION['loggedin']) || $_SESSION ['loggedin'] != true){
    header("location: login");
    exit;
}
else{
    if (isset($_POST['delete'])){
        $username = $_POST['delete'];
        $delete = true;
        $sql = "DELETE FROM `tfc` WHERE `username` = '$username'";
        $result = mysqli_query($conn, $sql);
    }        

    if ($_SERVER['REQUEST_METHOD']=='POST'){
        if(isset($_POST['snoEdit'])){
            //Update the record
            $sno = $_POST['snoEdit'];
            $name = $_POST['name'];
            $username = $_POST['username'];
            $institute = $_POST['institute'];
            $course = $_POST['course'];
            $branch = $_POST['branch'];
            $year = $_POST['year'];
            $club = $_POST['club'];
            $domain = $_POST['domain'];
            $contact = $_POST['contact'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            $hash = password_hash($password, PASSWORD_DEFAULT);

            //SQL query to be executed
            $sql = "UPDATE `tfc` SET `name` = '$name' , `institute` = '$institute' , `course` = '$course' , `branch` = '$branch' , `year` = '$year' , `club` = '$club' , `domain` = '$domain' , `contact` = '$contact' , `email` = '$email' , `password` = '$hash' WHERE `tfc`.`username` = '$username'";
            $result = mysqli_query($conn, $sql);

            if($result){
                $update = true ;
            }
            else {
                echo "We couldn't update the record successfully...";
            }
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
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

    <title>Members | Tech Fusion</title>

    <style>
    @media (max-width:920px){
        div.scroll{
            margin: 4px, 4px;
            padding: 4px;
            background-color: white;
            width: 400px;
            overflow-x: auto;
            overflow-y: hidden;
            white-space: nowrap;
        }
    }    
    </style>

</head>

<body>

    <!-- Edit modal -->
    <!--- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal">
        Edit
    </button> --->

    <!--Edit Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Member Records</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <form class="row g-3" method="POST" action="members">
                        <input type="hidden" name="snoEdit" id="snoEdit">

                        <div class="col-md-6">
                            <label for="editName" class="form-label">Full Name</label>
                            <input type="text" name="name" class="form-control" id="editName" placeholder="TFC Member">
                        </div>
                        <div class="col-md-6">
                            <label for="editUsername" class="form-label">University Roll Number</label>
                            <input type="text" name="username" class="form-control" id="editUsername"
                                placeholder="2020XXXXXXXXXXX" readonly>
                        </div>

                        <div class="col-md-4">
                            <label for="editInstitute" class="form-label">Institute</label>
                            <select id="editInstitute" class="form-select" name="institute">
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
                            <label for="editCourse" class="form-label">Course</label>
                            <select id="editCourse" class="form-select" name="course">
                                <option selected>Choose...</option>
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
                            <label for="editBranch" class="form-label">Branch</label>
                            <select id="editBranch" class="form-select" name="branch">
                                <option selected>---Choose---</option>
                                <option>Not Applicable</option>
                                <option>CSE</option>
                                <option>ME</option>
                                <option>ECE</option>
                                <option>EE</option>
                                <option>CE</option>
                                <option>CA</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label for="editYear" class="form-label">Year</label>
                            <select id="editYear" class="form-select" name="year">
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
                            <label for="editClub" class="form-label">Club Applying For</label>
                            <select id="editClub" class="form-select" name="club">
                                <option selected>Choose...</option>
                                <option>Tech Fusion Club</option>
                                <option>Expression Club</option>
                                <option>Manch Club</option>
                                <option>Razzmatazz</option>
                                <option>Sur Jhankar Club</option>
                            </select>
                        </div>
                        --->
                        <div class="col-md-3">
                            <label for="editClub" class="form-label">Club Applying For</label>
                            <input type="text" id="editClub" value="Tech Fusion Club" name="club" class="form-control" id="inputClub" readonly>
                        </div>
                        <div class="col-md-3">
                            <label for="editDomain" class="form-label">Interested Domain</label>
                            <input type="text" name="domain" class="form-control" id="editDomain"
                                placeholder="Research & Development">
                        </div>
                        <div class="col-md-6">
                            <label for="editContact" class="form-label">Contact Number</label>
                            <input type="text" name="contact" class="form-control" id="editContact"
                                placeholder="Without prefix (+91)">
                        </div>

                        <div class="col-md-6">
                            <label for="editEmail" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" id="editEmail"
                                placeholder="techfusion@srmu.ac.in">
                        </div>

                        <div class="col-md-6">
                            <label for="editPassword" class="form-label">Create Password</label>
                            <input type="password" name="password" class="form-control" id="editPassword"
                                placeholder="assign a default password" required>
                        </div>

                </div>
                <div class="modal-footer d-block mr-auto">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <?php 
  include 'mynav.php';  
  ?> 

    <?php
     if($update){
        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
          <strong>Success!</strong> Record updated successfully.
          <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>";
        //$update = false;
       }
    ?>
    <?php
     if($delete){
        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
          <strong>Success!</strong> Member has been suspended successfully...
          <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>";
        //$delete = false;
       }
    ?>

    <div class="container-fluid my-3">
        <h3>TFC Member Data</h3>
        <div class="scroll">
        <table class="table table-stripped" id="myTable">
            <thead>
                <tr>
                    <th scope="col">S. No</th>
                    <th scope="col">Name</th>
                    <th scope="col">Roll</th>
                    <th scope="col">Institute</th>
                    <th scope="col">Course</th>
                    <th scope="col">Branch</th>
                    <th scope="col">Year</th>
                    <th scope="col">Club</th>
                    <th scope="col">Domain</th>
                    <th scope="col">Contact</th>
                    <th scope="col">Email</th>
                    <th scope="col">Actions</th>

                </tr>
            </thead>
            <tbody>

                <?php
                $sql = "SELECT * FROM `tfc`";
                $result = mysqli_query($conn, $sql);
                $n=0;
                while($row = mysqli_fetch_assoc($result)){
                    $n += 1;
                    echo "<tr>
                    <th scope='row'>$n</th>
                    <td>".$row['name']."</td>
                    <td>".$row['username']."</td>
                    <td>".$row['institute']."</td>
                    <td>".$row['course']."</td>
                    <td>".$row['branch']."</td>
                    <td>".$row['year']."</td>
                    <td>".$row['club']."</td>
                    <td>".$row['domain']."</td>
                    <td>".$row['contact']."</td>
                    <td>".$row['email']."</td>
                    <td>   
                          <div class='btn-group' role='group' aria-label='Action Edit/Suspend'>
                              <button type='button' class='edit btn btn-outline-primary' id='$n'>Modify</button>
                              <button type='button' class='delete btn btn-outline-danger' id=".$row['username'].">Suspend</button>  
                          </div> 
                    </td>
                </tr>";
                }
                ?>
            </tbody>
        </table>
        </div>
    </div>
    <hr>

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

    <script src="//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#myTable').DataTable({
                responsive: true
            });
        });
    </script>

    <script>
        edits = document.getElementsByClassName('edit');
        Array.from(edits).forEach((element) => {
            element.addEventListener("click", (e) => {
                console.log("edit",);
                tr = e.target.parentNode.parentNode.parentNode;
                Name = tr.getElementsByTagName("td")[0].innerText;
                Username = tr.getElementsByTagName("td")[1].innerText;
                Institute = tr.getElementsByTagName("td")[2].innerText;
                Course = tr.getElementsByTagName("td")[3].innerText;
                Branch = tr.getElementsByTagName("td")[4].innerText;
                Year = tr.getElementsByTagName("td")[5].innerText;
                Club = tr.getElementsByTagName("td")[6].innerText;
                Domain = tr.getElementsByTagName("td")[7].innerText;
                Contact = tr.getElementsByTagName("td")[8].innerText;
                Email = tr.getElementsByTagName("td")[9].innerText;
                console.log(Name, Username, Institute, Course, Branch, Year, Club, Domain, Contact, Email);
                editName.value = Name;
                editUsername.value = Username;
                editInstitute.value = Institute;
                editCourse.value = Course;
                editBranch.value = Branch;
                editYear.value = Year;
                editClub.value = Club;
                editDomain.value = Domain;
                editContact.value = Contact;
                editEmail.value = Email;
                snoEdit.value = e.target.id;
                console.log(e.target.id);
                $('#editModal').modal('toggle');
            })
        })

        deletes = document.getElementsByClassName('delete');
        Array.from(deletes).forEach((element) => {
            element.addEventListener("click", (e) => {
                console.log("edit",);

                //tr = e.target.id.substr(1,)    //Ignores the first character of the string and returns the remaining (to remove first char from id of delete button)
                Username = e.target.id;
                if (confirm("Are you sure you want to suspend the member")) {
                    console.log("yes");
                    window.location = `members?delete=${Username}`;        //`... = ${}` ---> variable
                    //TODO: Create a form and use POST request to submit a form
                }
                else {
                    console.log("no");
                }
            })
        })
    </script>


</body>

</html>