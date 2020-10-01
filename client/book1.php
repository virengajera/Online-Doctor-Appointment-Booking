<?php
session_start();
require('db.php');
if(isset($_GET["selectclinic"]))
{
    $_SESSION["clinicid"]=$row['clinicid'];
}
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
            <a href="dashboard.php">
            <img  width="150" class="ml-0 mt-2 mb-2" src="../images/logo.png">
            </a>
        </div>
        <div class="col-sm-2">
            <h3 class="mr-0">Hey, <?php echo $_SESSION['username']; ?>!</h3>
            <a href="logout.php" class="btn btn-primary ">Log Out</a>
        </div>
    </div>
</div>
<div class="container-fluid text-center" style="background-color:rgb(176, 192, 236);">
    <div class="">
        <h2 class="pt-3 pb-3">Search Clinic</h2>
    </div>
</div>

<form action="" class="w-50 m-auto">
<div class="form-group row" >
    <label class="align-self-center m-2">Enter Location</label>
    <input type="text" class="form-control w-50 align-self-center m-2" name="location" placeholder="Enter location here" >
    <button type="submit" class="btn btn-primary align-self-center m-2" value="Login" name="search">Search Clinics</button>
  </div>
</form>
    <hr>
    <h2 class="text-center">Available Clinic</h2>
    <hr>
    <?php
        if(isset($_GET['search']) && !empty($_GET['location']))
        {
            $loc=$_GET['location'];
            $sql="SELECT * FROM `cliniclogin` WHERE location='$loc'";
            $res = mysqli_query($con, $sql);
            if($res)
            {   
                if (mysqli_num_rows($res)) {
                        echo "<div class='table-responsive text-center'>";
                        echo "<table class='table table-hover'>
                        <thead>
                          <tr>
                            <th scope='col'> </th>
                            <th scope='col'> ID </th>
                            <th scope='col'> Name </th>
                            <th scope='col'> E- mail</th>
                            <th scope='col'> Phone No </th> 
                            <th scope='col'> Location </th>
                            <th scope='col'> Address </th>
                            <th scope='col'> Owner </th>
                          </tr>
                          </thead>";
                                
                    while($row = mysqli_fetch_assoc($res)) {
                        echo "<form action=book2.php class='text-center'>";
                        echo "<tr> 
                                <td> <input type=radio name=clinicid value=".$row['clinicid']."></td>
                                <td scope='row'>". $row["clinicid"]." </td>
                                <td>". $row["clinicname"]."</td>
                                <td>". $row["clinicemail"]."</td>
                                <td>".$row["phoneno"]." </td>
                                <td>".$row["location"]." </td>
                                <td>". $row["address"]."</td>
                                <td>".$row["owner"]." </td>
                               </tr> ";
                    }
                echo "</table>  <br> <br>";
                echo " <button type='submit' class='btn btn-primary ml-auto mb-50' value='selectclinic' name='selectclinic'>Select Clinics</button>";
                echo "</form> </div>";
                }
                else {
                    echo "<h5 class=text-center>0 Results </h5>";
                }

            }
            else{
                echo "<h5 class=text-center>Errorn </h5>";
            }
            
            
        }
        else{
            echo " <h5 class=text-center>Enter Valid Location </h5>";
        }
        mysqli_close($con);
    ?>
     <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
                    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
                    crossorigin="anonymous"></script>
                <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
                    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
                    crossorigin="anonymous"></script>
                <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
                    integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
                    crossorigin="anonymous"></script>


</body>
</html>