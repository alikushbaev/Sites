<?php
$dataFile = 'downloads.json';
$versionFile = 'version.txt';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST['action'] === 'updateVersion') {
        $newVersion = $_POST['version'] ?? '';
        if (!empty($newVersion)) {
            file_put_contents($versionFile, $newVersion);
        }
    }
    echo json_encode(["status" => "success"]);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (file_exists($dataFile)) {
        echo file_get_contents($dataFile);
    } else {
        echo json_encode([]);
    }
    exit;
}
?>
