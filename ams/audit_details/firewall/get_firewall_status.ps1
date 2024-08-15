# Get the status of the firewall for all profiles
$firewallStatus = Get-NetFirewallProfile

# Check if the firewall is enabled for any profile
$firewallEnabled = $firewallStatus | Where-Object { $_.Enabled -eq 'True' }

# Output the firewall status
if ($firewallEnabled) {
    Write-Output "Enabled"
} else {
    Write-Output "Disabled"
}
