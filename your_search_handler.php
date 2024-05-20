<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $searchType = $_POST["searchType"];
    $searchText = $_POST["searchText"];

    // Append the suffix based on the selected option
    $suffix = ($searchType === "normal") ? "EGA" : "EGAP";
    $searchText .= $suffix;

    // Now, you can use $searchText in your search query or perform any desired action
    echo "You searched for: $searchText";
}
?>
