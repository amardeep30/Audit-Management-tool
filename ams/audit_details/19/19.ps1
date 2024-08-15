# Check if there are any pending updates
$pendingUpdates = Get-WindowsUpdateLog | Where-Object { $_.Category -eq "Critical Updates" -and $_.Status -ne "Installed" }

if ($pendingUpdates) {
    Write-Output "There are pending updates. The OS is not up-to-date."
} else {
    Write-Output "The OS is up-to-date. No pending critical updates."
}
