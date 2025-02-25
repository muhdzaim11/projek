<?php
    // connection
    $conn = mysqli_connect("localhost", "root", "root", "projek");

    // read the latest data from tbl_esp table 
    $ldr = mysqli_query($conn, "SELECT ldr FROM tbl_esp ORDER BY ID DESC LIMIT 1");
    
    // Fetch value from field sensor
    $data_ldr = mysqli_fetch_array($ldr);
    $ldr_value = $data_ldr['ldr'];

    // Determine status based on specific value ranges
    if ($ldr_value < 1600) {
        $ldr_status = "LIGHT";
    } elseif ($ldr_value >= 1600 && $ldr_value <= 2400) {
        $ldr_status = "DIM";
    } else {
        $ldr_status = "DARK";
    }

    // Calculate the percentage
    $percentage = ($ldr_value / 4000) * 100;
?>

<!-- Real-Time LDR Data using ApexCharts -->
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

<!-- Canvas for the gauge -->
<div id="gauge1"></div>

<!-- Script for the ApexCharts -->
<script type="text/javascript">
    // Options for the ApexCharts
    var options = {
        chart: {
            height: 200,
            type: 'radialBar',
        },
        plotOptions: {
            radialBar: {
                startAngle: -90,
                endAngle: 90,
                hollow: {
                    margin: 15,
                    size: '60%',
                },
                track: {
                    background: '#fff', // Set the background color of the gauge track
                },
                dataLabels: {
                    show: true,
                    name: {
                        show: false,
                    },
                    value: {
                        offsetY: 8,
                        fontSize: '20px',
                        formatter: function () {
                            return "<?php echo $ldr_status; ?>"; // Display the status
                        },
                    },
                },
            },
        },
        series: [<?php echo $percentage; ?>],
        labels: ['LDR'],
    };

    // Create the chart
    var chart = new ApexCharts(document.querySelector("#gauge1"), options);

    chart.render();
</script>
