<?php

 include("connect.php");
 $name=$_POST["name"];
 $mobile=$_POST["mobile"];
 $password=$_POST["password"];
 $cpassword=$_POST["cpassword"];
 $address=$_POST["address"];
 $image=$_FILES["photo"]["name"];
 $tmp_name=$_FILES["photo"]["tmp_name"];
 $role=$_POST["role"];

 if($password==$cpassword){

    move_uploaded_file($tmp_name,"../uploades/$image");
    $insert=mysqli_query($connect,"insert into user(name,mobile,password,address,photo,role,status,votes) values('$name','$mobile','$password','$address','$image','$role','NULL','NULL')");
    if ($insert){
        echo '
        <script>
        alert("register successfully.....");
        window.location="../root.html";
        </script>
        ';
        
    }
    else{
        echo '
        <script>
        alert("please enter valid details !!!!!);
      
        ';
    }

 }
 else{
    echo '
    <script>
    alert("password and confirm password does not match");
    window.location="../routes/register.html";
    </script>
    ';
 }

?>
