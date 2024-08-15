# Get all network adapters that are up and have an IP address assigned
$activeAdapters = Get-NetAdapter | Where-Object { $_.Status -eq "Up" } | Get-NetIPConfiguration | Where-Object { $_.IPv4Address -ne $null -or $_.IPv6Address -ne $null }

# Check the number of active network connections
if ($activeAdapters.Count -eq 1) {
    Write-Output "Yes, the endpoint system has only one active network connection."
} else {
    Write-Output "No, the endpoint system has more than one active network connection."
}
