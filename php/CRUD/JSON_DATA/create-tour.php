<?php

// $tourData = [];
//
// $tourData[] = [
//   'destination' => 'Agra' ,
//   'number_of_ticket' => 10 ,
//   'is_valid' => true
// ];
//
// // convert associated array data into json
//
// $jsonData =   json_encode($tourData , JSON_PRETTY_PRINT);
//
// $jsonFile = __DIR__.'/tour.json';
//
// file_put_contents($jsonFile , $jsonData);

$jsonFile = __DIR__.'/tour.json';

if (file_exists($jsonFile)) {
    // json data file exists, load all data
    $jsonDATA = file_get_contents($jsonFile);

    $tourData = json_decode($jsonDATA, true);
} else {
    // json data file doesn't exist, initialize an empty array
    $tourData = [];
}

// Add new data
$tourData[] = [
    'destination' => 'Agra',
    'number_of_ticket' => 10,
    'is_valid' => true
];

// Convert associated array data into JSON
$jsonData = json_encode($tourData, JSON_PRETTY_PRINT);

// Save the updated data back to the file
file_put_contents($jsonFile, $jsonData);


 ?>
