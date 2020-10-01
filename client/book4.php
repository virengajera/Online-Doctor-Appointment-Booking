<?php
session_start();
include("db.php");
$di=$_SESSION["docid"];
$sql="SELECT * FROM `doctorlogin` WHERE doctorid='$di'";
$res = mysqli_query($con, $sql);
    if($res)
    {   
        if (mysqli_num_rows($res)) {
                while($row = mysqli_fetch_assoc($res)) {
                    $d=$row["doctorname"];
                    $f=$row["fee"];
                    $sp=$row["speciality"];
                    $deg=$row["degree"];
                    $exp=$row["experience"];
                }
        }
    }
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

    $ci=$_SESSION["clinicid"];
    $sql="SELECT * FROM `cliniclogin` WHERE clinicid='$ci'";
    $res = mysqli_query($con, $sql);
    if($res)
    {   
        if (mysqli_num_rows($res)) {
            while($row = mysqli_fetch_assoc($res)) {
                $cname=$row["clinicname"];
                $ph=$row["phoneno"];
                $cadd=$row["address"];
            }
        }
    }

$mysqli = new mysqli('localhost', 'root', '', 'de');
if(isset($_GET['date'])){
    $date = $_GET['date'];
    $stmt = $mysqli->prepare("select * from appointment where date = ?");
    $stmt->bind_param('s',$date);
    $bookings = array();
    if($stmt->execute()){
        $result = $stmt->get_result();
        if($result->num_rows>0){
            while($row = $result->fetch_assoc()){
                $bookings[] = $row['timeslot'];
            }
            $stmt->close();
        } 
    }
}

if(isset($_POST['submit'])){
    //include("db.php");
    $timeslot=$_POST["timeslot"];
    $descp=$_POST["decription"];
    global $uid,$di;
    echo $timeslot."".$descp."".$uid."".$di;
    $stmt = $mysqli->prepare("SELECT * FROM `appointment` WHERE date=? AND timeslot=?");
    $stmt->bind_param('ss',$date,$timeslot);
    //$bookings = array();
    if($stmt->execute())
    {
        $result = $stmt->get_result();
        if($result->num_rows>0){
            $msg = "<div class='alert alert-danger'>Already booked</div>"; 
        }
        else{
        $stmt = $mysqli->prepare("INSERT INTO appointment (date,timeslot,description,clientid,doctorid) VALUES (?,?,?,?,?)");
        $stmt->bind_param('sssii', $date,$timeslot,$descp,$uid,$di);
        $stmt->execute();
        $msg = "<div class='alert alert-success'>Booking Successfull</div>";
        $bookings[]=$timeslot;
        $stmt->close();
        $mysqli->close();
        header("Location: dashboard.php");
        } 
    }
    

    
}
$duration=20;
$cleanup=0;
$start="9:00";
$end="15:00";
function timeslots($duration,$cleanup,$start,$end)
{
    $start=new DateTime($start);
    $end=new DateTime($end);
    $interval=new DateInterval("PT".$duration."M");
    $cleanupInterval=new DateInterval("PT".$cleanup."M");
    $slots=array();

    for($intStart=$start;$intStart<$end;$intStart->add($interval)->add($cleanupInterval)){
        $endPeriod= clone $intStart;    
        $endPeriod->add($interval);
        if($endPeriod>$end){
        break;
        }
        $slots[]=$intStart->format("H:iA")."-".$endPeriod->format("H:iA");
    }
    return $slots;
    
}

?>
<!doctype html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title></title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/main.css">
    <style>
    .hm{
            float:right;
            padding: 25px 100px 0 0;
        }
    </style>
  </head>   

  <body>
  <div class="hm">
  <a href="dashboard.php" class="btn btn-primary">Go Dashboard</a>
  </div>

    <div class="container">
    <h1 class="text-center">Book for Date: <?php echo date('m/d/Y', strtotime($date)); ?></h1> <hr>
        <div class="row">
            <div class="col-md-12">
            <?php echo isset($msg)?$msg:""; ?>
            </div>

            <?php
            $timeslot=timeslots($duration,$cleanup,$start,$end);  
            foreach($timeslot as $ts){
            ?>
        
        <div class="col-md-2">
            <div class="form-group">
            <?php if(in_array($ts,$bookings)){ ?>
                <button class="btn btn-danger"> <?php echo $ts; ?></button>
                <?php
                }
                else{ ?>
                <button class="btn btn-success book" data-timeslot="<?php echo $ts; ?>"><?php echo $ts; ?></button>
                <?php } ?>
            </div>
        </div>
        <?php } ?>
        </div>
    </div>

    <div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h1 class="modal-title">Booking </h1>
      </div>

      <div class="modal-body">
      <h4>DATE : <?php echo date('m/d/Y', strtotime($date)); ?> <br> <br>TIME:  <span id="slot"></span><br><br>
      Name :  <?php   echo "$u"."(ID= "."$uid".")";  ?> <hr>
       Doctor :  <?php 
                
                echo "$d"."(ID= "."$di".") <br> <br>";
                echo "Fee : $f <br> <br>";
                echo "Speciality : $sp <br> <br>";
                echo "Degree : $deg <br> <br>";
                echo "Experience(in YEARS)  : $exp ";
       ?> <hr>
       Clinic Name :  <?php 
                
                echo "$cname"."(ID= "."$ci".") <br> <br>";
                echo "Address :  $cadd <br> <br>";
                echo "Clinic Contact Number : $ph <br> <br>";

       ?>
       </h4> 
        <div class="row">
            <div class="col-md-12">
            <form action="" method="POST">  
            <div class="form-group">
                <label for="">Timeslot</label>
                <input required type="text" readonly name='timeslot' id="timeslot" class="form-control">
            </div>

            <div class="form-group">
                <label for="message-text" class="col-form-label">DESCRIPTION / SYMPTOMS</label>
                <textarea class="form-control" rows="5" name="decription"></textarea>
               <!--  <input required type="text"  name="description" class="form-control"> -->
            </div>

            <div class="form-group pull-right">
                <button class="btn btn-primary" type="submit" name="submit">BOOK APPOINTMENT</button>
            </div>
            </form>
            </div>
        </div>
        
      </div>
    </div>

  </div>
</div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script>
    $(".book").click(function(){
        var timeslot=$(this).attr('data-timeslot'); //trigger event
        $("#slot").html(timeslot);
        $("#timeslot").val(timeslot);   
        $("#myModal").modal("show");
    })
    </script>  
</body>
</html>