<!DOCTYPE html>
<html lang="en">
<head>
    <title>Audit Results</title>
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
        <h2>Serial Number</h2>
        <pre><?php
        $serial_number = shell_exec('powershell.exe -ExecutionPolicy Bypass -File audit_details\\serial_number\\get_serial_number.ps1');
        echo htmlentities($serial_number);
        ?></pre>
    </div>

    <div class="output-section">
        <h2>Make & Made</h2>
        <pre><?php
        $scriptPath = "audit_details\\make&made\\get_make&made.ps1";
        $make_made = shell_exec("powershell.exe -ExecutionPolicy Bypass -File \"$scriptPath\"");
        echo htmlentities($make_made);
        ?></pre>
    </div>

    <div class="output-section">
        <h2>IP Address</h2>
        <pre><?php
        $command = 'powershell.exe -Command "Get-NetIPAddress -AddressFamily IPv4 | Where-Object { $_.InterfaceAlias -eq \'Wi-Fi\' } | ForEach-Object { \"IPAddress: $($_.IPAddress)`nInterfaceAlias: $($_.InterfaceAlias)`n\" }"';
        $ip_address = shell_exec($command);
        echo htmlentities($ip_address);
        ?></pre>
    </div>

    <div class="output-section">
        <h2>MAC Address</h2>
        <pre><?php
        $scriptPath = "audit_details\\mac_address\\get_mac_address.ps1";
        $mac_address = shell_exec("powershell.exe -ExecutionPolicy Bypass -File \"$scriptPath\"");
        echo htmlentities($mac_address);
        ?></pre>
    </div>

    <div class="output-section">
        <h2>Firewall Status</h2>
        <pre><?php
        $scriptPath = "audit_details\\firewall\\get_firewall_status.ps1";
        $firewall_status = shell_exec("powershell.exe -ExecutionPolicy Bypass -File \"$scriptPath\"");
        echo htmlentities($firewall_status);
        ?></pre>
    </div>

    <div class="output-section">
        <h2>Ethernet Ports</h2>
        <pre><?php
        $scriptPath = "audit_details\\ethernet_ports\\get_ethernet_ports.ps1";
        $ethernet_ports = shell_exec("powershell.exe -ExecutionPolicy Bypass -File \"$scriptPath\"");
        echo htmlentities($ethernet_ports);
        ?></pre>
    </div>

    <div class="output-section">
        <h2>Shared Folders</h2>
        <?php
        $scriptPath = "audit_details\\shared_folders\\get_shared_folders.ps1";
        $shared_folders = shell_exec("powershell.exe -ExecutionPolicy Bypass -File \"$scriptPath\"");

        // Debug: Display raw output
        echo "<pre>Raw output:<br>" . htmlentities($shared_folders) . "</pre>";

        // Database connection
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

        // Prepare and bind
        $stmt = $conn->prepare("INSERT INTO audit_results (serial_number, make_made, ip_address, mac_address, firewall_status, ethernet_ports, shared_folders) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssss", $serial_number, $make_made, $ip_address, $mac_address, $firewall_status, $ethernet_ports, $shared_folders);

        // Execute the query
        $stmt->execute();

        echo "<p>Data successfully stored in the database.</p>";

        // Close the connection
        $stmt->close();
        $conn->close();
        ?>
    </div>
</body>
</html>