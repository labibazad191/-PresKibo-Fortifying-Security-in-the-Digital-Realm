<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

// Database configuration
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'pres_db';

// Backup location
$backupPath = '/Applications/XAMPP/xamppfiles/htdocs/Preskibo/backup/';

// Create a unique filename for the backup
$backupFilename = 'backup_' . date('Y-m-d_H-i-s') . '.sql';

// Full path to mysqldump executable
$mysqldumpPath = 'C:\xampp\mysql\bin\mysqldump';

// Command to perform the database backup using mysqldump
$command = "$mysqldumpPath --host=$host --user=$username --password=$password $database > $backupPath$backupFilename 2>&1";

// Execute the command
exec($command, $output, $returnCode);

// Check if the backup was successful
if ($returnCode === 0) {
    header("Location:admin.php");
    echo "Database backup successful. Backup saved to: $backupPath$backupFilename";
} else {
    echo "Error: Database backup failed. Error Code: $returnCode\n";
    echo "Check the error message: " . implode("\n", $output);
}

?>
