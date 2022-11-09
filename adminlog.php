<?php
  session_start();
  include("connect.php");

  $mobile=$_POST["mob"];
  $password=$_POST["pass"];
  

  $adminlogin=mysqli_query($connect,"select * from admin where mobile='$mobile' and password='$password'");
  if(mysqli_num_rows($adminlogin)>0){
    $admindata=mysqli_fetch_array($adminlogin);
    
    $_SESSION['role']=$admindata['role'];
    if($_SESSION['role']==3){
        echo '
        <script>
        
        
        window.location="../routes/adminfile.php";
        </script>
        ';
    }
  }
  
  else{
    echo '
    <script>
    alert("login unsuccessfull.....");
    window.location="../root.html";
    </script>
    ';
  }
  ?>