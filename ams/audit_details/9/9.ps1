# Check if Windows Defender is installed
$defenderStatus = Get-Service -Name WinDefend -ErrorAction SilentlyContinue

if ($defenderStatus) {
    # Get Windows Defender update status
    $defenderUpdates = Get-MpComputerStatus

    # Check if virus definitions are up-to-date
    if ($defenderUpdates.AntivirusSignatureLastUpdated -gt (Get-Date).AddDays(-1)) {
        Write-Output "Windows Defender definitions are up-to-date."
    } else {
        Write-Output "Windows Defender definitions are not up-to-date."
    }
} else {
    Write-Output "Windows Defender is not installed."
}
