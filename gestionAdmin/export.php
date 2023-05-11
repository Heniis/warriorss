<?php
/*
* iTech Empires:  Export Data from MySQL to CSV Script
* Version: 1.0.0
* Page: Export
*/

// Database Connection
require("functions.php");

// get admin
$query = "SELECT * FROM admin";
if (!$result = mysqli_query($con, $query)) {
    exit(mysqli_error($con));
}

$admin = array();
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $admin[] = $row;
    }
}

header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=admin.csv');
$output = fopen('php://output', 'w');
fputcsv($output, array(' nom', 'prenom', 'address', 'mail', 'status'));

if (count($admin) > 0) {
    foreach ($admin as $row) {
        fputcsv($output, $row);
    }
}
?>
