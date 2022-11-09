<?php
  session_start();
  include("connect.php");

  $mobile=$_POST["mob"];
  $password=$_POST["pass"];
  $role=$_POST["role"];


  $check=mysqli_query($connect,"select * from user where mobile='$mobile' and password ='$password' and role='$role' ");

  $groups=mysqli_query($connect,"select * from user where role=2");
  if(mysqli_num_rows($check)>0){
    if(mysqli_num_rows($groups)>0){
      $groupsdata=mysqli_fetch_all($groups,MYSQLI_ASSOC);
   
      $_SESSION['groupsdata']=$groupsdata;
    
    }

    $userdata=mysqli_fetch_array($check);
    $_SESSION['mobile']=$userdata['mobile'];
   
    
    $_SESSION['status']=$userdata['status'];
    $_SESSION['userdata']=$userdata;
    if($_SESSION['status']==1){
      echo '
      <script>
      alert("you have already voted.....");
      window.location="../root.html";
      </script>
      ';

    }
    echo '
    <script>
    alert("login successfull");
    window.location="../routes/dashboard.php";
    </script>
    ';

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