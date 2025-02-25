<?php
// Database connection
$conn = mysqli_connect("localhost", "root", "root", "projek");

// Read the latest rain status from tbl_esp table
$sql = mysqli_query($conn, "SELECT rain FROM tbl_esp ORDER BY ID DESC LIMIT 1");

// Initialize the variable
$rain = "";

// Fetch value from field sensor
$data_sensor = mysqli_fetch_array($sql);

// Test sensor value
if ($data_sensor['rain'] == 1) {
    $rain = "hujan";
} else {
    $rain = "xhujan";
}

// Close the database connection
mysqli_close($conn);
?>

<div style="text-align: center;">
    <?php
    echo "<span></span>";

    // Display the corresponding image based on rain status
    if ($rain == "hujan") {
        echo '<img src="images/rain.png" width="140">';
    } else {
        echo '<img src="images/sun.png" width="140">';
    }
    ?>
</div>
