<?php
$servername = "localhost";
$username = "root";  // Update with your MySQL username
$password = "";  // Update with your MySQL password
$dbname = "audit_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM audit_results";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Audit</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }
        h1 {
            text-align: center;
        }
        .output-section {
            background-color: #fff;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Audit Results</h1>

    <div class="output-section">
        <?php
        if ($result->num_rows > 0) {
            echo "<table>";
            echo "<tr><th>Serial Number</th><th>Make & Made</th><th>IP Address</th><th>MAC Address</th><th>Firewall Status</th><th>Ethernet Ports</th><th>Shared Folders</th></tr>";
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . htmlentities($row["serial_number"]) . "</td>";
                echo "<td>" . htmlentities($row["make_made"]) . "</td>";
                echo "<td>" . htmlentities($row["ip_address"]) . "</td>";
                echo "<td>" . htmlentities($row["mac_address"]) . "</td>";
                echo "<td>" . htmlentities($row["firewall_status"]) . "</td>";
                echo "<td>" . htmlentities($row["ethernet_ports"]) . "</td>";
                echo "<td>" . htmlentities($row["shared_folders"]) . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "<p>No audit results found.</p>";
        }
        $conn->close();
        ?>
    </div>
</body>
</html>