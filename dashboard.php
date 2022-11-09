<?php
session_start();
if(!isset($_SESSION['mobile'])){
    header("location:../root.html");
}
$userdata=$_SESSION['userdata'];



if($_SESSION['status']==0){
    $status='<b style="color : red">Not voted</b>';
}
else{
    $status='<b style="color : green">voted</b>';
}

?>


<html>
    <head>
        <title>
            Dashborad
        </title>
        <link rel="stylesheet" href="../css/stylesheet.css">
        <style>
            #backbutton{
                float: left;
                margin: 15px;
            
                padding: auto;
            }
            #logoutbutton{
                float: right;
                margin: 15px;
                padding: auto;
            }
                    
        #profile{
            float: left;
            text-align: left;
            background-color:white;
            width:30%;
            padding:20px;

      

        }
        #group{
            float: right;
            text-align: left;

            background-color:white;
            
            width:56%;
            padding:20px;

        }
       #bodycontent{
        padding: 14px;
       }

        </style>
    </head>     
    <body>
        <div id="mainsection">
            <div id="headersection">
               <a href="../root.html"> <button id="backbutton">back</button></a>
                <a href="logout.php"><button id="logoutbutton">logout</button></a><br><br>
                <h1>Online voting system</h1><br><br>
                <hr>
                <div id="bodycontent">
                <div id="profile" >
                    <img src="../uploades/<?php echo $userdata['photo']?>" hight="100"  width="100"  ><br><br>
                    <b>Name : </b><?php echo $userdata['name'] ?><br><br>
                    <b>Mobile : </b><?php echo $userdata['mobile'] ?><br><br>
                    <b>Address : </b><?php echo $userdata['address'] ?><br><br>
                    <b>status: </b><?php echo $status ?><br><br>

                </div>
                <div id="group">
                <?php
                  if(isset($_SESSION['groupsdata'])){
                    $groupsdata=$_SESSION['groupsdata'];
                    for($i=0; $i<count($groupsdata); $i++){
                        ?>
                          <div>
                          <img src="../uploades/<?php echo $groupsdata[$i]['photo']?>" height="100"  width="100"  ><br><br>
                    <b>Name : </b><?php echo $groupsdata[$i]["name"] ?><br><br>
                 
                   
                      
                    <form action="../api/vote.php" method='POST' enctype="multipart/form-data">
                        <input type="hidden" name="gvotes" value="<?php echo $groupsdata[$i]['votes']?>">
                        <input type="hidden" name="gid" value="<?php echo $groupsdata[$i]['mobile']?>">
                        <input type="submit" name="votebutton" value="Vote" id="votebutton">
                    </form>

                          </div>
                          <hr>
                        <?php
                        
                    }
                  }
                ?>

                </div>
             </div>
        </div>

        </div>
    </body>
</html>

