# Check if PowerShell Remoting (WinRM) is enabled
$winRMService = Get-Service -Name WinRM -ErrorAction SilentlyContinue
if ($winRMService -and $winRMService.Status -eq 'Running') {
    $psRemotingEnabled = "Yes"
} else {
    $psRemotingEnabled = "No"
}

# Check if Remote Desktop is enabled
$remoteDesktopEnabled = (Get-ItemProperty -Path 'HKLM:\System\CurrentControlSet\Control\Terminal Server\' -Name "fDenyTSConnections").fDenyTSConnections
if ($remoteDesktopEnabled -eq 0) {
    $rdpEnabled = "Yes"
} else {
    $rdpEnabled = "No"
}

# Check if WinRM is enabled
try {
    Test-WSMan -ComputerName localhost -ErrorAction Stop
    $winRMEnabled = "Yes"
} catch {
    $winRMEnabled = "No"
}

# Output the results
Write-Output "PowerShell Remoting Enabled: $psRemotingEnabled"
Write-Output "Remote Desktop Enabled: $rdpEnabled"
Write-Output "WinRM Enabled: $winRMEnabled"
