# Retrieve all network adapters
$networkAdapters = Get-NetAdapter

# Display only the MAC address of each adapter
$networkAdapters | ForEach-Object { $_.MacAddress }
