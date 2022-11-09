<?php
session_start();

include("connect.php");
$votes=$_POST['gvotes']; 

$total_votes=$votes+1;
$gid=$_POST['gid'];
$uid=$_SESSION['mobile'];

$update_votes=mysqli_query($connect,"update user set votes='$total_votes' where mobile='$gid'");
$update_user_status=mysqli_query($connect,"update user set status=1 where mobile='$uid'");

if($update_votes and $update_user_status){
    $groups=mysqli_query($connect,"select name,photo,votes from user where role='2'");
    $groupsdata=mysqli_fetch_all($groups,MYSQLI_ASSOC);
    $_SESSION['groupsdata']=$groupsdata;
    $_SESSION['status']=1;
    

    echo '
    <script>
    alert("voting successfull!!");
    window.location="../root.html";
    </script>
    ';
  }


else{

    echo '
    <script>
    alert("some error occured.....");
    window.location="../routes/dashboard.php";
    </script>
    ';
  }

?>