# Check Event Log Service status
$eventLogService = Get-Service -Name EventLog
if ($eventLogService.Status -eq 'Running') {
    Write-Output "Event Log Service: Yes"
} else {
    Write-Output "Event Log Service: No"
}

