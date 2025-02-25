<?php
// Establish a MySQL connection
$host = "localhost";
$username = "root";
$password = "root";
$database = "formcompl";
$conn = new mysqli($host, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get user input from the form
$name = $_POST['name'];
$email = $_POST['email'];
$contact = $_POST['contact'];
$date = $_POST['date'];
$location = $_POST['location'];
$complaint = $_POST['complaint'];

// Handle file upload for the image
$targetDirectory = "img/"; // Create a directory to store uploaded files
$targetFile = $targetDirectory . basename($_FILES["image"]["name"]);

if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
    // File uploaded successfully, update the database with the file path
    $imagePath = $targetFile;

    // Insert the data into the database
    $sql = "INSERT INTO formaduan (name, email, contact, date, location, `complaint details`, image) VALUES ('$name', '$email', '$contact', '$date', '$location', '$complaint', '$imagePath')";
    
    if ($conn->query($sql) === TRUE) {
        // Set the alert message and redirect to dashboard.php
        session_start();
        $_SESSION['alert'] = 'Complaint submitted successfully!';
        header('Location: index.php');
    } else {
        // Set the alert message and redirect to index.php
        session_start();
        $_SESSION['alert'] = 'Error: ' . $sql . '<br>' . $conn->error;
        header('Location: formindex.php');
    }
}
// } else {
    // Handle the case where the file upload failed
//     session_start();
//     $_SESSION['alert'] = 'Error uploading the image.';
//     header('Location: index.php');
// }

// Close the MySQL connection
$conn->close();
?>
