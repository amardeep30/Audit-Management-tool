# Define authorized USB serial numbers or models
$authorizedDevices = @(
    "AUTHORIZED_SERIAL_NUMBER_1", # Replace with actual serial numbers or models
    "AUTHORIZED_SERIAL_NUMBER_2"
)

# Get information about all connected USB drives
$usbDrives = Get-WmiObject -Query "SELECT * FROM Win32_DiskDrive WHERE InterfaceType='USB'"

if ($usbDrives.Count -eq 0) {
    Write-Output "No USB drives detected."
} else {
    foreach ($drive in $usbDrives) {
        Write-Output "Detected USB Drive: Model: $($drive.Model), PNPDeviceID: $($drive.PNPDeviceID)"
        $serialNumber = $drive.PNPDeviceID

        $partitions = Get-WmiObject -Query "ASSOCIATORS OF {Win32_DiskDrive.DeviceID='$($drive.DeviceID)'} WHERE AssocClass=Win32_DiskDriveToDiskPartition"
        foreach ($partition in $partitions) {
            $logicalDisks = Get-WmiObject -Query "ASSOCIATORS OF {Win32_DiskPartition.DeviceID='$($partition.DeviceID)'} WHERE AssocClass=Win32_LogicalDiskToPartition"
            foreach ($disk in $logicalDisks) {
                if ($authorizedDevices -contains $serialNumber) {
                    Write-Output "Authorized USB Drive: Drive Letter: $($disk.DeviceID), Model: $($drive.Model), Serial Number: $($serialNumber)"
                } else {
                    Write-Output "Unauthorized USB Drive Detected: Drive Letter: $($disk.DeviceID), Model: $($drive.Model), Serial Number: $($serialNumber)"
                }
            }
        }
    }
}
