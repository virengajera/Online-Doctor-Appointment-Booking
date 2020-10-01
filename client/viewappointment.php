<?php 
session_start();
require("db.php");
$u=$_SESSION["username"];
$sql="SELECT * FROM `clientlogin` WHERE clientname='$u'";
    $res = mysqli_query($con, $sql);
    if($res)
    {   
        if (mysqli_num_rows($res)) {
            while($row = mysqli_fetch_assoc($res)) {
                $uid=$row["clientid"];
                
            }
        }
    }
$_SESSION["clientid"]= $uid;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Appointment</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
<div class="container-fluid pt-2 pb-2" style="background-color:rgba(209, 209, 170,0.3);">
    <div class="row">
        <div class="col-sm-10 ">
            <img  width="150" class="ml-0 mt-2 mb-2" src="../images/logo.png">
        </div>
        <div class="col-sm-2">
            <h3 class="mr-0">Hey, <?php echo $_SESSION['username']; ?>!</h3>
            <a href="dashboard.php" class="btn btn-primary ">Go  to Dashboard</a>
        </div>
    </div>
</div>
<div class="container-fluid text-center" style="background-color:rgb(176, 192, 236);">
    <div class="">
        <h2 class="pt-3 pb-3">Users Appointment</h2>
    </div>
</div>

<div class="app">
    <div class="today">
        <div class="title">
            <h3 class='text-center'>TODAY</h3>
        </div>
        <div class="appt">
        <?php
        $tdt=date("Y-m-d");
        $cid=$_SESSION["clientid"];
        $sql="SELECT * FROM `appointment` WHERE date='$tdt' AND clientid='$cid'";
        $res = mysqli_query($con, $sql);
        if($res)
        {   
            if (mysqli_num_rows($res)) {
                echo "<table class='table table-hover'>  
                        <thead>
                        <tr>
                            <th>DATE</th>
                            <th>TIME</th>
                            <th>DESCRIPTION</th>
                            <th>DOCTOR</th>
                        </tr>
                        </thead>";
                while($row = mysqli_fetch_assoc($res)) {
                    echo "<tr>
                            <td>".$row["date"]." </td>
                            <td>".$row["timeslot"]." </td>
                            <td>".$row["description"]." </td>
                            <td>" . $row["doctorid"] . "</td>
                        </tr>";
                }
                echo "</table> ";
            }
            else{
                echo "<div class='text-center'> NO TODAY APPOINTMENT</div>";
            }
        }
        

        ?>
        </div>
    </div>
    <br> <br>
    <div class="future">
        <div class="title">
            <h3 class='text-center'>FUTURE</h3>
        </div>
        <div class="appt">
        <?php
        $cid=$_SESSION["clientid"];
        $tdt=date("Y-m-d");
        $sql="SELECT * FROM `appointment` WHERE  clientid='$cid' AND date>'$tdt'";
        $res = mysqli_query($con, $sql);
        if($res)
        {   
            if (mysqli_num_rows($res)) {
                echo "<table class='table table-hover'>  
                        <table>
                        <tr>
                            <th>DATE</th>
                            <th>TIME</th>
                            <th>DESCRIPTION</th>
                            <th> Load meDOCTOR ID</th>
                        </tr>
                        </thead>";
                while($row = mysqli_fetch_assoc($res)) {
                    echo "<tr>
                            <td>".$row["date"]." </td>
                            <td>".$row["timeslot"]." </td>
                            <td>".$row["description"]." </td>
                            <td>" . $row["doctorid"] . "</td>
                        </tr>";
                }
                echo "</table> ";
            }
            else{
                echo "<div class='text-center'> NO Future APPOINTMENT</div>";
            }

        }
       

        ?>
        </div>
    </div>
        <br> <br>
    <div class="past">
        <div class="title">
            <h3 class='text-center'>PAST</h3>
        </div>
        <div class="appt">
        <?php
        $cid=$_SESSION["clientid"];
        $tdt=date("Y-m-d");
        $sql="SELECT * FROM `appointment` WHERE date<'$tdt' AND clientid='$cid'";
        $res = mysqli_query($con, $sql);
        if($res)
        {   
            if (mysqli_num_rows($res)) {
                echo "<table class='table table-hover' >  
                        <thead>
                        <tr>
                            <th>DATE</th>
                            <th>TIME</th>
                            <th>DESCRIPTION</th>
                            <th>DOCTOR</th>
                        </tr>
                        </thead>";
                while($row = mysqli_fetch_assoc($res)) {
                    echo "<tr>
                            <td>".$row["date"]." </td>
                            <td>".$row["timeslot"]." </td>
                            <td>".$row["description"]." </td>" ?>
                            <td> <a href="" class="docidtable" data-toggle='modal' data-target='#docinfo' data-docid="<?php echo $row["doctorid"] ?>" > <?php echo $row["doctorid"] ?>  </a></td>
                            <?php 
                        echo "</tr>";
                }
                echo "</table> ";
            }
            else{
                echo "<div class='text-center'> NO Past APPOINTMENT</div>";
            }

        }
        

        ?>
        </div>


    </div>

    </div>
</div>



<!-- Modal -->
<div id="docinfo" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
      <h4 class="modal-title ">Doctor Info</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
      <span> Doctor ID :  <p id="slot"></p> </span>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
                    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
                    crossorigin="anonymous"></script>
                <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
                    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
                    crossorigin="anonymous"></script>
                <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
                    integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
                    crossorigin="anonymous"></script>


                    <script>
    $(".docidtable").click(function(){
        var docid=$(this).attr('data-docid'); //trigger event
        console.log(docid);
       $("#slot").html(docid); 
        $("#docinfo").modal("show");
    })
    </script>  
    
</body>
</html>