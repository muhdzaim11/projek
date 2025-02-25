<?php
session_start();

// Check for an alert message
if (isset($_SESSION['alert'])) {
    echo '<script>alert("' . $_SESSION['alert'] . '");</script>';
    unset($_SESSION['alert']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap 4 Responsive Dashboard Card Design</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <!-- bootstrap link -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <!-- real-time dht11 -->
    <script type="text/javascript" src="assets/js/jquery-3.4.0.min.js"></script>  
    <script type="text/javascript" src="assets/js/mdb.min.js"></script>
    <script type="text/javascript" src="jquery/jquery-latest.js"></script>

    <!-- untuk ldr boostrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


    <!-- Add this to the head section of your HTML -->
    <script src="https://cdn.jsdelivr.net/gh/toorshia/justgage@1.4.0/dist/justgage.min.js"></script>

    <!-- ni yng bhgian bwah -->
    <script type="text/javascript" src="assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="bootstrap.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    <!-- ldr coding -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

<!-- test -->
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>


    <!-- call data grafik & real-time-->
    <script type="text/javascript">
        var refreshid = setInterval(function(){
            $("#tempmonitor").load("tempmonitor.php");
            $("#hummonitor").load("hummonitor.php");
            $("#chart").load("chart.php");
            $("#chart2").load("chart2.php");
            $("#rain").load("rainmonitoring.php");
            $("#rainstatus").load("rainstatus.php");

            // ldr
            $("#intensity").load("sensor.php");
            $("#intensity1").load("chart3.php");
            // $("#status").load("status.php");
        }, 5000);
    </script>

<style>
body {
    background-color: lightblue;
    margin: 0;
    padding: 0;
}
.card-box {
    position: relative;
    color: #fff;
    padding: 20px 10px 40px;
    margin: 10px 0px;
}
.card-box:hover {
    text-decoration: none;
    color: #f1f1f1;
}
.card-box:hover .icon i {
    font-size: 100px;
    transition: 1s;
    -webkit-transition: 1s;
}
.card-box .inner {
    padding: 5px 10px 0 10px;
}
.card-box h3 {
    font-size: 27px;
    font-weight: bold;
    margin: 0 0 8px 0;
    white-space: nowrap;
    padding: 0;
    text-align: left;
}
.card-box p {
    font-size: 15px;
}
.card-box .icon {
    position: absolute;
    top: auto;
    bottom: 5px;
    right: 5px;
    z-index: 0;
    font-size: 72px;
    color: rgba(0, 0, 0, 0.15);
}
.card-box .card-box-footer {
    position: absolute;
    left: 0px;
    bottom: 0px;
    text-align: center;
    padding: 3px 0;
    color: rgba(255, 255, 255, 0.8);
    background: rgba(0, 0, 0, 0.1);
    width: 100%;
    text-decoration: none;
}
.card-box:hover .card-box-footer {
    background: rgba(0, 0, 0, 0.3);
}
.bg-blue {
    background-color: #00c0ef !important;
}
.bg-green {
    background-color: #00a65a !important;
}
.bg-orange {
    background-color: #f39c12 !important;
}
.bg-red {
    background-color: #d9534f !important;
}
/* navbar */
@import url('https://fonts.googleapis.com/css?family=Rubik&display=swap');

body{
    margin: 0;
    font-family: 'Rubik', sans-serif;
    background: #f5f5f5;
}
.container {
    /* max-width: 100%; */
    max-width: 1200px;
    margin: 0 auto;
    overflow: hidden;
}
.sidebar{
   position: fixed;
   width: 250px;
   top:0;
   left: 0;
   bottom: 0;
   background: #111;
   padding-top: 50px;
}

.sidebar h1{
   display: block;
   padding: 10px 20px;
   color: #fff;
   text-decoration: none;
   font-family: "Rubik";
   letter-spacing: 2px;
   font-weight: 400;
   margin: 0;
   font-size: 25px;
   text-transform: uppercase;
}

.sidebar a{
   display: block;
   padding: 10px 20px;
   color: #bbb;
   text-decoration: none;
   font-family: "Rubik";
   letter-spacing: 2px;
   font-size: 15px;
}

.sidebar a:hover{
   color: #fff;
   margin-left: 20px;
   transition: 0.4s;
}
.main-content {
    margin-left: 25%;
    padding: 20px;
}
</style>

</head>
<body>
    <div class="container">
        <!-- logo  -->
        <div class="container" style="margin-left: 50%; margin-top:40px;">
            <img src="images/Gladiatorz.png" width="200">
        </div>
        <div class="sidebar">
            <img src="images/me.png" width="50" style="margin-left: 20px;">
            <h1>HOME</h1>
            <a href="https://zaimstylo.000webhostapp.com/resume.html">Portfolio</a>
            <a href="formindex.php">Complaint Form</a>
            <a href="dashboard.php">Form Dashboard</a>
            <a href="https://linktr.ee/zay.den">Contact</a>

        </div>
        <div class="main-content">
            <div class="row">
                <div class="col-sm-6" style="text-align: center;">
                    <div class="card-box bg-blue">
                        <div class="inner">
                            <h1 style="color:#111;"> Temperature Dashboard </h1>
                            <!-- h3 / h1 ade effect ye -->
                            <h1><span id="tempmonitor">0</span></h1>                    
                        </div>
                        <div class="icon">
                            <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                        </div>
                        <a href="chart.php" class="card-box-footer">View More <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <!-- style="margin-left:100px;" -->
                <div class="col-sm-6">
                    <div class="card-box bg-green" style="text-align: center;">
                        <div class="inner">
                            <h1 style="color:#111;"> Humidity Dashboard </h1>
                            <!-- h3 / h1 ade effect ye -->
                            <h1> <span id="hummonitor"> 0 </span> </h1>
                        </div>
                        <div class="icon">
                            <i class="fa fa-money" aria-hidden="true"></i>
                        </div>
                        <a href="chart2.php" class="card-box-footer">View More <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6" style="text-align: center;">
                    <div class="card-box bg-orange" style="padding: 18px;">
                        <div class="inner">
                            <h1 style="color:#111;"> LDR Dashboard </h1>
                            <!-- h3 / h1 ade effect ye -->
                            <h1> <span id="intensity"> 0 </span> </h1>
                            <h1><div id="intensity1"> Hello</div></h1>
                            <!-- <h1> <span id="status"> Hello </span> </h1> -->
                        </div>
                        <div class="icon">
                            <i class="fa fa-user-plus" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>


                <div class="col-sm-6" style="text-align: center;">
                    <div class="card-box bg-red" style="padding: 18px;">
                        <div class="inner">
                            <h1 style="color:#111;"> Rain Dashboard </h1>
                            <!-- h3 / h1 ade effect ye -->
                            <h1> <span id="rain"> 100 </span> </h1>
                            <h1> <span id="rainstatus"> xxxx </span> </h1>
                        </div>
                        <div class="icon">
                            <i class="fa fa-users" aria-hidden="true"></i>
                        </div>
                        <!-- <a href="#" class="card-box-footer">View More <i class="fa fa-arrow-circle-right"></i></a> -->
                    </div>
                </div>
            </div>

            <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
            
</body>
</html>