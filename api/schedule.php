<?php
header('Content-Type: application/json');
header('Cache-Control: public, max-age=300');

require('../_config.php');

 $date = $_GET['date'] ?? date('Y-m-d');

if (!preg_match('/^\d{4}-\d{2}-\d{2}$/', $date)) {
    echo json_encode([]);
    exit;
}

 $cacheFile = __DIR__ . "/../cache/schedule_{$date}.json";
 $cacheTime = 300;

if (file_exists($cacheFile) && (time() - filemtime($cacheFile)) < $cacheTime) {
    readfile($cacheFile);
    exit;
}

 $apiUrl = "$api/api/v2/hianime/schedule?date={$date}";
 $context = stream_context_create([
    'http' => [
        'timeout' => 8,
        'method' => 'GET',
        'header' => 'Accept: application/json'
    ]
]);

 $json = @file_get_contents($apiUrl, false, $context);

if ($json === false) {
    echo json_encode([]);
    exit;
}

 $data = json_decode($json, true);
 $result = $data['data']['scheduledAnimes'] ?? [];

 $cacheDir = __DIR__ . '/../cache';
if (!is_dir($cacheDir)) {
    mkdir($cacheDir, 0755, true);
}
file_put_contents($cacheFile, json_encode($result));

echo json_encode($result);