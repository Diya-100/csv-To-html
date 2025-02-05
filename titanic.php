<?php
// Define the CSV file path
$csvFile = 'Titanic-Dataset.csv'; // Replace with your CSV file path

// Check if the file exists
if (!file_exists($csvFile)) {
    die('CSV file does not exist.');
}

// Open the CSV file for reading
if (($handle = fopen($csvFile, 'r')) !== FALSE) {
    // Start the HTML table
    echo "<html><body><table border='1' cellpadding='5' cellspacing='0'>";
    
    // Loop through the rows in the CSV
    while (($data = fgetcsv($handle, 1000, ',')) !== FALSE) {
        echo "<tr>";
        
        // Loop through each column in the row
        foreach ($data as $column) {
            echo "<td>" . htmlspecialchars($column) . "</td>";
        }
        
        echo "</tr>";
    }
    
    // Close the table and the HTML tags
    echo "</table></body></html>";
    
    // Close the CSV file
    fclose($handle);
} else {
    die('Unable to open CSV file.');
}
?>
