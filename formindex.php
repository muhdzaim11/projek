<?php
// Establish a MySQL connection
$host = "localhost";
$username = "root";
$password = "root";
$database = "formcompl";
$conn = new mysqli($host, $username, $password, $database);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Complaint Form</title>
    <link rel="stylesheet" type="text/css" >
    <style>
body {
    font-family: Arial, sans-serif;
    background-color: lightblue;
}

.container {
    max-width: 600px;
    margin: 0 auto;
    padding: 20px;
    background-color: #fff;
    border: 1px solid #ccc;
    border-radius: 5px;
}

h1 {
    text-align: center;
    color: #333;
}

label, input, textarea {
    display: block;
    margin-bottom: 10px;
}

input, textarea {
    width: 95%;
    padding: 10px;
}

input[type="submit"] {
    background-color: lightgreen;
    color: black;
    border: none;
    padding: 10px 15px;
    border-radius: 5px;
    cursor: pointer;
    opacity: 1;
}
input[type="submit"]:hover {
    opacity: 0.7;
}

    </style>
</head>
<body>
<div class="container">
    <h1>Complaint Form</h1>
    <form action="submitCompl.php" method="post" enctype="multipart/form-data">
        <label for="name">Name:</label>
        <input type="text" name="name" required><br>

        <label for="contact">Contact:</label>
        <input type="text" name="contact" required><br>

        <label for="email">Email:</label>
        <input type="email" name="email" required><br>

        <label for="date">Date:</label>
        <input type="date" name="date" required><br>

        <label for="location">Location:</label>
        <input type="text" name="location" required><br>

        <label for="complaint">Complaint Details:</label>
        <textarea name="complaint" rows="4" required></textarea><br>

        <label for="image">Image:</label>
        <input type="file" name="image" accept="image/*"><br>

        <input type="submit" value="Submit Complaint">
    </form>
</div>

    <!-- Add the hidden alert div -->
    <div id="alert" style="display:none;"></div>

    <!-- Add JavaScript to show and hide the alert -->
    <script>
        setTimeout(function () {
            document.getElementById('alert').style.display = 'none';
        }, 3000);
    </script>
    
</body>
</html>
