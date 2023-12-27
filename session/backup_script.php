<?php
 include 'db.php';

// Backup location
$backupDir = 'E:/Backup/';

// FTP configuration
$ftpHost = 'ftp.mediflowhub.online';
$ftpUsername = 'u804534960.u804534960';
$ftpPassword = 'MK,H|eJkf`iYEhI@1';
$ftpRemoteDir = '/public_html/path/to/ftp/directory/';

while (true) {
    // Timestamp for the current backup
    $timestamp = date("Y-m-d-H-i-s");

    // Backup file name
    $backupFile = $backupDir . $database . '-' . $timestamp . '.sql';

    // Database connection
    $mysqli = new mysqli($host, $username, $password, $database);

    // Check connection
    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    // Get all tables from the database
    $tables = [];
    $result = $mysqli->query("SHOW TABLES");
    while ($row = $result->fetch_row()) {
        $tables[] = $row[0];
    }

    // Iterate through each table and export data
    foreach ($tables as $table) {
        $result = $mysqli->query("SELECT * FROM $table");
        $tableData = [];

        while ($row = $result->fetch_assoc()) {
            $tableData[] = $row;
        }

        // Write table data to the backup file
        file_put_contents($backupFile, "-- Table structure for table `$table`\n", FILE_APPEND);
        file_put_contents($backupFile, "DROP TABLE IF EXISTS `$table`;\n", FILE_APPEND);
        $createTableQuery = $mysqli->query("SHOW CREATE TABLE $table");
        $createTableRow = $createTableQuery->fetch_row();
        file_put_contents($backupFile, $createTableRow[1] . ";\n\n", FILE_APPEND);

        file_put_contents($backupFile, "-- Data for the table `$table`\n", FILE_APPEND);
        foreach ($tableData as $row) {
            $rowValues = array_map('addslashes', array_values($row));
            file_put_contents($backupFile, "INSERT INTO `$table` VALUES ('" . implode("','", $rowValues) . "');\n", FILE_APPEND);
        }
        file_put_contents($backupFile, "\n", FILE_APPEND);
    }

    // Close the database connection
    $mysqli->close();

    echo "Backup completed. File: $backupFile\n";

    // FTP upload
    $ftpConnection = ftp_connect($ftpHost);
    $ftpLogin = ftp_login($ftpConnection, $ftpUsername, $ftpPassword);

    if ($ftpConnection && $ftpLogin) {
        ftp_put($ftpConnection, $ftpRemoteDir . basename($backupFile), $backupFile, FTP_BINARY);
        echo "Backup uploaded to FTP server.\n";
    } else {
        echo "FTP connection failed.\n";
    }

    // Close FTP connection
    ftp_close($ftpConnection);

    // Sleep for 24 hrs. before the next backup
    sleep(86400);
}
?>