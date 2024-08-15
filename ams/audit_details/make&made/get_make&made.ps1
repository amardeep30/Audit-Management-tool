# Retrieve the manufacturer and model of the client's system
$computerSystem = Get-WmiObject -Class Win32_ComputerSystem
$manufacturer = $computerSystem.Manufacturer
$model = $computerSystem.Model

# Output the manufacturer and model
Write-Output "Manufacturer: $manufacturer"
Write-Output "Model: $model"
