# Get the system drive (where Windows is installed)
$systemDrive = (Get-PSDrive -PSProvider FileSystem | Where-Object { $_.Name -eq "C" }).Root

# Get the current user profile path
$userProfile = [System.Environment]::GetFolderPath("UserProfile")

# Check if known data folders are on a different drive than the system drive
$documentsDrive = (Get-Item $userProfile\Documents).PSDrive.Root
$downloadsDrive = (Get-Item $userProfile\Downloads).PSDrive.Root

# Compare the drives
if ($documentsDrive -ne $systemDrive -or $downloadsDrive -ne $systemDrive) {
    Write-Output "Yes"
} else {
    Write-Output "No"
}
