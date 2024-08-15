# Get the current user's identity
$currentUser = [System.Security.Principal.WindowsIdentity]::GetCurrent()
$userName = $currentUser.Name

# Check if the current user is in the Administrators group
$principal = New-Object System.Security.Principal.WindowsPrincipal($currentUser)
$isAdmin = $principal.IsInRole([System.Security.Principal.WindowsBuiltInRole]::Administrator)

if ($isAdmin) {
    Write-Output "Yes, the current user ($userName) is working in an Administrator account."
} else {
    Write-Output "No, the current user ($userName) is not working in an Administrator account."
}
