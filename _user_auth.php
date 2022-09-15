<?php

if(!isset($_SESSION)){
session_start();
}

if(isset($_POST['type'])){
    if((time()-$_SESSION['last_active_time'])>900){
        echo "logout";
    }

}
else{
    if(isset($_SESSION['last_active_time'])){
        if((time()-$_SESSION['last_active_time'])>900){
          header("location: https://uca-srmu.000webhostapp.com/logout2.php");
          die();
        }
      }  
    $_SESSION['last_active_time'] = time();
}

?>