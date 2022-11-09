
<?php
  


session_start();

include("../api/connect.php");
$groups=mysqli_query($connect,"select * from user where role=2");
$groupsdata=mysqli_fetch_all($groups,MYSQLI_ASSOC);

$_SESSION['groupsdata']=$groupsdata;

?>



<html>
    <head>
        <link rel="stylesheet" href="stylesheet.css">
        <style>
            #bodysection{
                background-color:rgb(206, 206, 189);
            }
            #main{
                
                margin-top:60px;
                margin-left:25px;
            }
            #backbutton{
                float: left;
                margin: 15px;
            
                padding: auto;
                padding: 10px;
                font: 1em sans-serif;
                border-radius: 5px;
                font: 0.8em sans-serif;
                background-color: rgb(164, 144, 117);
                color: rgb(28, 32, 32);
    
            }
            #logoutbutton{
                float: right;
                margin: 15px;
                padding: auto;
                padding: 10px;
                font: 0.8em sans-serif;
                border-radius: 5px;
                background-color: rgb(164, 144, 117);
                color: rgb(28, 32, 32);
                
            }
        </style>

    </head>


    <body id=bodysection>
    <a href="../adminlogin.html"> <button id="backbutton">back</button></a>
                <a href="logout.php"><button id="logoutbutton">logout</button></a><br><br>
  
    <?php
                  if(isset($_SESSION['groupsdata'])){
                    $groupsdata=$_SESSION['groupsdata'];
                    for($i=0; $i<count($groupsdata); $i++){
                        ?>
                          <div id=main>
                          <img src="../uploades/<?php echo $groupsdata[$i]['photo']?>" height="100"  width="100"  ><br><br>
                    <b>Name : </b><?php echo $groupsdata[$i]["name"] ?><br><br>
                    <b>Mobile : </b><?php echo $groupsdata[$i]["mobile"]?><br><br>
                    <b>Votes :</b><?php echo $groupsdata[$i]["votes"] ?><br><br>

                 
                   
                      
                    

                          </div>
                          <hr>
                        <?php
                        
                    }
                  }
                ?>

    </body>
</html>


