<?php
session_start();
if(isset($_GET["selectclinic"]) && !empty($_GET["clinicid"]))
{
    $_SESSION["clinicid"]=$_GET['clinicid'];
}
require("db.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
<div class="container-fluid pt-2 pb-2" style="background-color:rgba(209, 209, 170,0.3);">
    <div class="row">
        <div class="col-sm-10 ">
        <a href="dashboard.php"> <img  width="150" class="ml-0 mt-2 mb-2" src="../images/logo.png"> </a>
        </div>
        <div class="col-sm-2">
            <h3 class="mr-0">Hey, <?php echo $_SESSION['username']; ?>!</h3>
            <a href="logout.php" class="btn btn-primary ">Log Out</a>
        </div>
    </div>
</div>
<div class="container-fluid text-center" style="background-color:rgb(176, 192, 236);">
    <div class="">
        <h2 class="pt-3 pb-3">Available Doctors</h2>
    </div>
</div>
    <?php
    if(isset($_GET["selectclinic"]) && isset($_GET['clinicid']))
    {

        $sql="SELECT * FROM `doctorlogin` WHERE clinicid=".$_SESSION['clinicid'];
        $res = mysqli_query($con, $sql);
        if($res)
        {   
            if (mysqli_num_rows($res))
            {
                echo "<form action=book3.php class='text-center'>";
                echo "<div class='table-responsive'>
                    <table class='table table-hover'>
                    <thead>
                      <tr>
                        <th > </th>
                        <th> Doctor Name </th>
                        <th> Doctor E- mail</th>
                        <th> Doctor Phone No </th> 
                        <th> Speciality </th>
                        <th> Rating </th>
                        <th> degree </th>
                        <th> experience</th>
                        <th> Age </th>
                        <th> Fee </th>
                      </tr>
                      </thead>";
                while($row = mysqli_fetch_assoc($res))
                {
                    echo "<tr> 
                                <td> <input type=radio name=docid value=".$row['doctorid']."></td>
                                <td>". $row["doctorname"]." </td>
                                <td>". $row["doctoremail"]." </td>
                                <td>". $row["phoneno"]."</td>
                                <td>".$row["speciality"]." </td>
                                <td>".$row["rating"]." </td>
                                <td>". $row["degree"]."</td>
                                <td>".$row["experience"]." </td>
                                <td>".$row["age"]." </td>
                                <td>".$row["fee"]." </td>
                        </tr> ";

                }

                echo "</table> </div> <br> <br> <div class=ip> ";
                echo " <button type='submit' class='btn btn-primary ml-auto' value='SELECTDOCTOR' name='selectdoctor'>Select Doctor</button>";
                echo "</form> </div>";

            }
            else{
                echo " <h1> 0 results </h1>";
            }
        }



    }
    ?>
    
</body>
</html>