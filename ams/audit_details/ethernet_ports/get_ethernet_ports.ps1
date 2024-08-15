# Retrieve all network adapters
$networkAdapters = Get-NetAdapter

# Filter for Ethernet adapters
$ethernetAdapters = $networkAdapters | Where-Object { $_.MediaType -eq '802.3' }

# Get the count of Ethernet adapters
$numberOfEthernetPorts = $ethernetAdapters.Count

# Output the number of Ethernet ports
Write-Output "$numberOfEthernetPorts"
