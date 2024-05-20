<?php

require 'model/config.php';

// Load the required controller
require 'controllers/homeController.php';

// Instantiate the controller
$homeController = new HomeController();

// Determine the action to perform
$action = isset($_GET['action']) ? $_GET['action'] : 'index';

// Call the appropriate controller action
switch ($action) {
    case 'index':
        $homeController->index();
        break;
    case 'addProject':
        $homeController->addProject();
        break;
    default:
        echo "Invalid action";
}
?>
