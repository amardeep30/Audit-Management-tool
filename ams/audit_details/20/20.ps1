# List of known licensed software (you can customize this list)
$licensedSoftware = @(
    "Microsoft Office",
    "Adobe Photoshop",
    "Autodesk AutoCAD"
)

# Get list of installed programs
$installedPrograms = Get-WmiObject -Class Win32_Product | Select-Object -Property Name

# Check for unlicensed software
$unlicensedFound = $false
foreach ($program in $installedPrograms) {
    if ($licensedSoftware -notcontains $program.Name) {
        Write-Output "Potential unlicensed software detected: $($program.Name)"
        $unlicensedFound = $true
    }
}

if (-not $unlicensedFound) {
    Write-Output "No potential unlicensed software detected."
}
# Check Windows license status
$licenseStatus = Get-WmiObject -Query "SELECT LicenseStatus FROM SoftwareLicensingProduct WHERE PartialProductKey IS NOT NULL"

if ($licenseStatus.LicenseStatus -eq 1) {
    Write-Output "Windows is licensed."
} else {
    Write-Output "Windows is not licensed."
}
