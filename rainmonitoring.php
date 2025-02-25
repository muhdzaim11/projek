<?php
$conn = mysqli_connect("localhost", "root", "root", "projek");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = mysqli_query($conn, "SELECT * FROM tbl_esp");

if (!$sql) {
    die("Query failed: " . mysqli_error($conn));
}

// Initialize the variable before the loop
$data_sensor1 = "";

while ($data = mysqli_fetch_array($sql)) {
    $data_sensor1 = $data['rain'];
}

mysqli_close($conn);
?>

<div style="text-align: center;">
    <?php echo "
        <span>
            $data_sensor1
        </span>";
    ?>
</div>
