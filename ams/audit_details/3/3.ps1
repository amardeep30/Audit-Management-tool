# Replace 'username' with the actual username you want to check
$username = "username"

# Query the user account to check if it requires a password
$user = Get-WmiObject -Class Win32_UserAccount -Filter "Name='$username'"

if ($user.PasswordRequired) {
    Write-Output "Yes"
} else {
    Write-Output "No"
}
