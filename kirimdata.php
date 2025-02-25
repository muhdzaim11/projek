<?php
    $conn = mysqli_connect("localhost", "root", "root", "projek");

    //dpt value dri dht11 sensor dri arduino
    $temp = $_GET['temp'];
    $hum = $_GET['hum'];
    $ldr = $_GET['ldr'];
    $rain = $_GET['rain'];
    $date = date("Y-m-d H:i:s");

    mysqli_query($conn, "ALTER TABLE tbl_esp AUTO_INCREMENT=1");

    // Insert the data into the database
    $stmt = mysqli_prepare($conn, "INSERT INTO tbl_esp (temperature, humidity, ldr, rain, date) VALUES (?, ?, ?, ?, ?)");
if ($stmt) {
    mysqli_stmt_bind_param($stmt, "sssss", $temp, $hum, $ldr, $rain, $date);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}

    if($stmt)
        echo "Success";
    else
        echo "Failed";
?>


