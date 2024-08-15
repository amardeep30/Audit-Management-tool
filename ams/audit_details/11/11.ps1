# Get the status of Windows Defender
$defenderStatistics = Get-MpThreat

if ($defenderStatistics) {
    foreach ($threat in $defenderStatistics) {
        Write-Output "Threat Detected: $($threat.ThreatName)"
        Write-Output "Severity: $($threat.Severity)"
        Write-Output "Action Taken: $($threat.ActionSuccess)"
        Write-Output "Detection Time: $($threat.DetectedTime)"
        Write-Output "----------------------------------"
    }
} else {
    Write-Output "No suspicious activity detected by Windows Defender."
}
