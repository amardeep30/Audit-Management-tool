# List of common antivirus software names to check for
$commonAntivirus = @(
    "Norton",
    "McAfee",
    "Kaspersky",
    "Bitdefender",
    "Trend Micro",
    "Avast",
    "AVG",
    "ESET",
    "Sophos",
    "Windows Defender"
)

# Get list of installed programs
$installedPrograms = Get-WmiObject -Class Win32_Product | Select-Object -Property Name

# Check if any common antivirus software is installed
$antivirusInstalled = $false
foreach ($program in $installedPrograms) {
    foreach ($name in $commonAntivirus) {
        if ($program.Name -like "*$name*") {
            Write-Output "Antivirus software detected: $($program.Name)"
            $antivirusInstalled = $true
        }
    }
}

if (-not $antivirusInstalled) {
    Write-Output "No common antivirus software detected."
}

# Check if Windows Defender is installed
$defenderStatus = Get-Service -Name WinDefend -ErrorAction SilentlyContinue
if ($defenderStatus) {
    if ($defenderStatus.Status -eq 'Running') {
        Write-Output "Windows Defender is installed and running."
    } else {
        Write-Output "Windows Defender is installed but not running."
    }
} else {
    Write-Output "Windows Defender is not installed."
}
