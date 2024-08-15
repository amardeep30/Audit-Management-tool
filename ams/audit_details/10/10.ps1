# Get the status of Windows Defender
$defenderStatus = Get-MpComputerStatus

if ($defenderStatus) {
    # Last Quick Scan Date and Time
    $lastQuickScanTime = $defenderStatus.LastQuickScanEndTime
    
    if ($lastQuickScanTime) {
        Write-Output "Windows Defender last quick scan was on: $lastQuickScanTime"
    } else {
        Write-Output "Windows Defender has not performed a quick scan."
    }

    # Last Full Scan Date and Time
    $lastFullScanTime = $defenderStatus.LastFullScanEndTime
    
    if ($lastFullScanTime) {
        Write-Output "Windows Defender last full scan was on: $lastFullScanTime"
    } else {
        Write-Output "Windows Defender has not performed a full scan."
    }
} else {
    Write-Output "Windows Defender is not installed."
}
