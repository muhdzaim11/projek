<!DOCTYPE html>
<html>
<head>
    <title>Complaint Dashboard</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid black;
        }

        th, td {
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    <?php
    session_start();

    if (isset($_SESSION['alert'])) {
        echo '<script>alert("' . $_SESSION['alert'] . '");</script>';
        unset($_SESSION['alert']);
    }
    ?>

    <h1>Complaint Dashboard</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Contact</th>
            <th>Email</th>
            <th>Date</th>
            <th>Location</th>
            <th>Complaint</th>
            <th>Image</th>
        </tr>

        <?php
        // Establish a MySQL connection
        $host = "localhost";
        $username = "root";
        $password = "root";
        $database = "formcompl";
        $conn = new mysqli($host, $username, $password, $database);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Retrieve complaints from the database
        $sql = "SELECT * FROM formaduan";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . $row["name"] . "</td>";
                echo "<td>" . $row["contact"] . "</td>";
                echo "<td>" . $row["email"] . "</td>";
                echo "<td>" . $row["date"] . "</td>";
                echo "<td>" . $row["location"] . "</td>";
                echo "<td>" . $row["complaint details"] . "</td>";
                echo '<td><img src="' . $row["image"] . '" alt="Complaint Image" width="100"></td>';
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='8'>No complaints found.</td></tr>";
        }

        // Close the MySQL connection
        $conn->close();
        ?>
    </table>
</body>
</html>
