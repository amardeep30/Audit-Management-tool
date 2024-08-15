# List of common P2P software names
$p2pPrograms = @(
    "uTorrent",
    "BitTorrent",
    "eMule",
    "Vuze",
    "qBittorrent",
    "FrostWire",
    "Shareaza",
    "Ares",
    "Deluge",
    "BitComet"
)

# Get list of installed programs
$installedPrograms = Get-WmiObject -Class Win32_Product | Select-Object -Property Name

# Check if any P2P software is installed
$p2pInstalled = $false
foreach ($program in $installedPrograms) {
    foreach ($name in $p2pPrograms) {
        if ($program.Name -like "*$name*") {
            Write-Output "P2P program detected: $($program.Name)"
            $p2pInstalled = $true
        }
    }
}

if (-not $p2pInstalled) {
    Write-Output "No P2P programs detected."
}
