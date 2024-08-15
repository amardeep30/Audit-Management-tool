# Get all network adapters
$networkAdapters = Get-NetAdapter | Where-Object { $_.Status -eq "Up" -and $_.MediaType -eq "802.11" }

if ($networkAdapters) {
    Write-Output "Wireless devices connected:"
    foreach ($adapter in $networkAdapters) {
        Write-Output "Adapter Name: $($adapter.Name)"
        Write-Output "Interface Description: $($adapter.InterfaceDescription)"
        Write-Output "MAC Address: $($adapter.MacAddress)"
        Write-Output "Link Speed: $($adapter.LinkSpeed / 1MB) Mbps"
        Write-Output "----------------------------------------"
    }
} else {
    Write-Output "No wireless devices connected."
}
