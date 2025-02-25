<?php
    // connection
    $conn = mysqli_connect("localhost", "root", "root", "projek");

     //read data from tbl_dht table 
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
    // read information temperature for 8 last data
    $temp = mysqli_query($conn, "SELECT temperature FROM tbl_esp WHERE ID>='$ID_awal' 
        and ID<='$ID_last' ORDER BY ID ASC");
?>

    <!-- real-time dht11 -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


<!-- grafik display -->
<div class="panel panel-primary">
    <div class="panel-heading" style="color:black">
    <h1>Real-Time Temperature Data</h1>
    </div>

    <div class="panel-body">
        <!-- canvas for grafik -->
        <canvas id="myChart"></canvas>

        <!-- gambar grafik -->
        <script type="text/javascript">
        // baca ID canvas tempat grafik akan diletakkan
        var canvas = document.getElementById('myChart');
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
                label : "Temperature",
                fill : true,
                backgroundColor : "rgba(255, 255, 0, 0.5)",
                borderColor : "rgba(0, 0, 0, 1)",
                lineTension : 0.5,
                pointRadius : 5, 

                data : [
                    <?php
                        while($data_temp = mysqli_fetch_array($temp))
                        {
                            echo $data_temp['temperature'].',' ;
                        }
                    ?>
                ]
            },
            
            ]

        } ;

        // Options for the chart
        var options = {
                scales: {
                    y: {
                        beginAtZero: false, // Set this to true if you want the y-axis to start from zero
                        min: 20, // Set the minimum value for the y-axis
                        max: 40, // Set the maximum value for the y-axis
                        ticks: {
                            stepSize: 5, // Adjust the step size as needed
                        },
                        title: {
                            display: true,
                            text: 'Temperature (°C)',
                        },
                    },
                },
                animation: {
                    duration: 0,
                },
            };

            // Create the chart
            var myLineChart = new Chart(canvas, {
                type: 'line',
                data: data,
                options: options,
            });

       </script>

    </div>
</div>