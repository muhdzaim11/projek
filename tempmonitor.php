<?php
    //connection to database
    $conn = mysqli_connect("localhost", "root", "root", "projek");

    //read data from table
    $sql = mysqli_query($conn, "select * from tbl_esp order by ID desc");

    //read data paling atas
    $data = mysqli_fetch_array($sql);

    // Check if $data is not null before accessing its elements
    if ($data !== null) {
        $temperature = $data['temperature'];

        //test when value temperature not reading
        if ($temperature == "") {
            $temperature = 0;
        }

        //display temperature value
        echo $temperature;
    }
?>
