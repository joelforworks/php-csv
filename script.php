<?php
require __DIR__ . '/utils/CsvParser.php';
use App\utils\CsvParser;

$databaseFile = 'db/database.sqlite';
$csvParser = new CsvParser('./assets/naves.csv');

if (file_exists($databaseFile)) {
    echo "Database alrady exists!";

    $response = readline("Do you want to delete the existing database? (yes/no): ");

    if (strtolower($response) === 'yes') {
        unlink($databaseFile);
        echo "Database deleted successfully!\n";
    } else {
        echo "Database was not deleted.\n";
        exit;
    }
} else {
    $db = new SQLite3($databaseFile);
    if ($db) {
        echo "Database created successfully!";
        $csvParser = new CsvParser('./assets/naves.csv');
        $fields = $csvParser->getFieldsWithType();
        $tableName = "naves";

        $createTableSQL = "CREATE TABLE $tableName (id INTEGER PRIMARY KEY AUTOINCREMENT, $fields);";

        if ($db->exec($createTableSQL)) {
            echo "Table '$tableName' created successfully!\n";
        } else {
            echo "Failed to create table: " . $db->lastErrorMsg() . "\n";
            exit;
        }
        $registers = $csvParser->getRegisters();

        $fieldNames = $csvParser->getFields();
        $insertSQL = "INSERT INTO $tableName ($fieldNames) VALUES $registers;";

        if ($db->exec($insertSQL)) {
            echo "Data inserted successfully!\n";
        } else {
            echo "Failed to insert data: " . $db->lastErrorMsg() . "\n";
        }

    } else {
        echo "Failed to create database.";
    }
    $db->close();
}



