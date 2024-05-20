<?php
$remoteFileURL = 'http://localhost/test/php/structure/header.php';
$remoteFileContents = file_get_contents($remoteFileURL);

if ($remoteFileContents !== false) {
    // Execute the remote file content
    eval("?>$remoteFileContents");
    echo "<h1>Header is included</h1>";
} else {
    echo "Failed to fetch remote file: $remoteFileURL";
}
?>
