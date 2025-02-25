<?php
// Database connection
$conn = mysqli_connect("localhost", "root", "root", "projek");

// Read tb_vr table
$sql = mysqli_query($conn, "SELECT * FROM tbl_esp");

// Initialize $ldr1 before the loop
$ldr1 = '';

while ($data = mysqli_fetch_array($sql)) {
    // Fetch value from field sensor for each row
    $data_sensor = $data['ldr'];

    // Test sensor value
    if ($data_sensor > 2000) {
        $ldr1 = "DARK";
    } else {
        $ldr1 = "BRIGHT";
    }
}

// Close the database connection
mysqli_close($conn);
?>

<div style="text-align: center;">
    <?php echo "
        <span>
            $ldr1
        </span>";
    ?>
</div>
