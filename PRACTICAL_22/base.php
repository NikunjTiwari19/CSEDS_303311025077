<?php
$file = fopen("data.txt", "w");
fwrite($file, "Welcome to PHP File Handling");
fclose($file);

$file = fopen("data.txt", "r");
$data = fread($file, filesize("data.txt"));
fclose($file);

echo "File Content: " . $data;
?>