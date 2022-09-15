<?php

if ($not_exist)
    {
        echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
        <strong>Oops! </strong>User does not exist
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>";
        $not_exist = false;
    } 

    if ($unapprove)
    {
        echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
        <strong>Oops! </strong>Your registration request is still pending for approval
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>";
        $unapprove = false;
    }    

    if ($wrong_pass)
    {
        echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
        <strong>Oops! </strong>Password mismatch
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>";
        $wrong_pass = false;
    }    

    if ($insert)
    {
      echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
      <strong>Success! </strong>Your registration request is submitted successfully. You will be able to login using your credentials once your request will be approved by Chief Club Coordinator.
      <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
    </div>";
      $insert = false;
    }    

    if ($showError)
    {
      echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
      <strong>Member Already Exists</strong>
      <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
    </div>";
      $showError = false;
    }    

?>