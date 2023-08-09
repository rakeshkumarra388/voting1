<?php
    session_start();
    if(!isset($_SESSION['userdata'])){
        header("location: ../");
    }

   

    $userdata = $_SESSION['userdata'];
    $groupdata = $_SESSION['groupdata'];
    
    if($_SESSION['userdata']['status']==0){
        $status = '<b style="color:red">Not Voted</b>';

    }
    else{
        $status = '<b style="color:green">Voted</b>';
    }
   
?>





<html>
    <head>
        <title>Online Voting System - Dashboard</title>
        </head>
    <body>

<style>
    body{
        background-color: yellow;
    }


        #imagecss{
    padding: 10px;
    border: 2px solid black;
    border-radius: 5px;
    width: 30%;
}
#headerSection{
    padding: 10px;

}

#headerSection h1{
    font-family: cursive;
}
input{
    padding: 10px;
    border-radius: 5px;
}
#dropbox{
    padding: 10px;
    border-radius: 5px;
    width: 12%;

}
#loginbtn{
    padding: 5px;
    border-radius: 0px 10px 0px 10px; 
    background-color: rgb(81, 81, 121);
    color: white;
    font-size: 15px;  
    cursor: pointer;
    
}
        #backbtn{
            padding: 5px;
            border-radius: 5px; 
            background-color: rgb(81, 81, 121);
            color: white;
            font-size: 15px;  
            float: left;
            margin: 10px;
            cursor: pointer;
        }

        #logoutbtn{
            padding: 5px;
            border-radius: 5px; 
            background-color: rgb(81, 81, 121);
            color: white;
            font-size: 15px;  
            float: right;
            margin: 10px;
            cursor: pointer;
        }
        #profile{
            background-color: white;
            width: 25%;
            border-radius: 10px;
            padding: 20px;
            float: left;
        }
        #Group{
            background-color: white;
            width: 60%;
            border-radius: 10px;
            padding: 20px;
            float: right;
        }
        #votebtn{
            padding: 5px;
            border-radius: 5px; 
            background-color: blue;
            color: white;
            font-size: 15px;  
            
        }
        #mainpanel1{
            padding: 10px;
        }
        #photo5{
            mix-blend-mode: multiply;
            float:  right;
         
           

        }
        #photo6{
            mix-blend-mode: multiply;
            float: left;

   
            
        }

        </style>
 

    <div id="photo5">
        <img style="width: 100px;  " src="../photo/download.png">
    </div>
    <div id="photo6">
        <img style="width: 100px;  " src="../photo/download.png">
    </div>
    <div id="mainSection">
        <CENTER>

            <div id="headersection">
                 <a href="../"><button id="backbtn"> Back</button></a>
                 <a href="logout.php"><button id="logoutbtn"> Logout</button></a>
                 <h1>Online Voting System in Bihar</h1>
            </div>
        </CENTER>
            <hr>

            <div id="mainpanel1">
            <div id="Profile">
                <center><img src="../uploads/<?php echo $userdata['photo'] ?>" height="100"width="100"></center><br><br>
                <b>Name:-</b> <?php echo $userdata['name'] ?> <br><br>
                <b>Mobile:-</b> <?php echo $userdata['mobile'] ?><br><br>
                <b>Address:-</b> <?php echo $userdata['address'] ?><br><br>
                <b>Status:-</b> <?php echo $status?><br><br>

            </div>



            <div id="Group">
            <?php 
                    if($_SESSION['groupdata']){
                        for($i=0; $i<count($groupdata); $i++){
                            ?>
                            <div>
                                <img style="float: right" src="../uploads/<?php echo $groupdata[$i]['photo'] ?>"height="100" width="100">
                                <b>Group Name:-</b> <?php echo $groupdata[$i]['name']?><br><br>
                                
                                <b>Votes:-</b> <?php echo $groupdata[$i]['votes']?></a><br><br>
                                <form action="../api/vote.php" method="POST">
                                    <input type="hidden" name="gvotes" value="<?php echo $groupdata[$i]['votes'] ?>">
                                    <input type="hidden" name="gid" value="<?php echo $groupdata[$i]['id'] ?>">
                                    <input type="submit" name="votebtn" value="Vote" id="votebtn">
                                </form>
                            </div>
                        <hr>
                             <?php

                        }
                    }
                    else{
                    

                    }
                ?>
                </div>
            </div>

     </div>

    

        
        
    </body>
</html>
