# Get the shared folders on the local computer
$sharedFolders = Get-WmiObject -Class Win32_Share

# Check if there are any shared folders
if ($sharedFolders.Count -gt 0) {
    # Output "Yes" and display only the shared folder names
    Write-Output "Shared Folders: Yes"
    $sharedFolders | ForEach-Object { $_.Name }
} else {
    # Output "No" if no shared folders are found
    Write-Output "No"
}
