<?php
    // connection
    $conn = mysqli_connect("localhost", "root", "root", "projek");

     //read data from tbl_esp table 
     $sql = mysqli_query($conn, "select * from tbl_esp order by ID desc"); 

     // baca ID tertinggi
    $sql_ID = mysqli_query($conn, "SELECT MAX(ID) FROM tbl_esp");
    // fetch the data
    $data_ID = mysqli_fetch_array($sql_ID) ;
    // ambil ID terakhir
    $ID_last = $data_ID['MAX(ID)'];
    $ID_awal = $ID_last - 7 ;
   

    // read 8 last data
    $date = mysqli_query($conn, "SELECT date FROM tbl_esp WHERE ID>='$ID_awal' 
        and ID<='$ID_last' ORDER BY ID ASC");
    $humi = mysqli_query($conn, "SELECT humidity FROM tbl_esp WHERE ID>='$ID_awal' 
        and ID<='$ID_last' ORDER BY ID ASC")
?>

    <!-- real-time dht11 -->
    <script type="text/javascript" src="assets/js/jquery-3.4.0.min.js"></script>  
    <script type="text/javascript" src="assets/js/mdb.min.js"></script>
    <script type="text/javascript" src="jquery/jquery-latest.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">


<!-- grafik display -->
<div class="panel panel-primary">
    <div class="panel-heading" style="color:black">
    <h1>Real-Time Humidity Data</h1>
    </div>

    <div class="panel-body">
        <!-- canvas for grafik -->
        <canvas id="myChart2"></canvas>

        <!-- gambar grafik -->
        <script type="text/javascript">
        // baca ID canvas tempat grafik akan diletakkan
        var canvas = document.getElementById('myChart2');
        // letakkan data date dan suhu untuk grafik
        var data = {
            labels : [
                <?php
                    while($data_date = mysqli_fetch_array($date))
                    {
                        echo '"'.$data_date['date'].'",' ;
                    }
                ?>
            ],
            datasets : [
            
            {
                label : "humidity",
                fill : true,
                backgroundColor : "rgba(21, 105, 199, 0.5)",
                borderColor : "rgba(0, 0, 0, 1)",
                lineTension : 0.5,
                pointRadius : 5, 

                data : [
                    <?php
                        while($data_humi = mysqli_fetch_array($humi))
                        {
                            echo $data_humi['humidity'].',' ;
                        }
                    ?>
                ]
            }
            ]

        } ;

        // option grafik
        var option = {
            showLines : true,
            animation : {duration : 0}
        } ;

        // cetak grafik kedalam canvas
        var myLineChart = Chart.Line(canvas, {
            data : data,
            options : option
        }) ;

       </script>

    </div>
</div>