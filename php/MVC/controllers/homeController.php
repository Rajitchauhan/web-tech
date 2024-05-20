<?php

require_once 'model/model.php';

class HomeController extends Model {
    public function index() {
        $projects = $this->getAllProjects();

        $view = 'view/projects-list.php';
        include 'view/layout.php';
    }

    public function addProject() {
        // Handle form submission to add a new project
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = $_POST['title'];
            $description = $_POST['description'];

            $this->insertProject($title, $description);
            header('Location: index.php');
            exit();
        }

        $view = 'view/add-project.php';
        include 'view/layout.php';
    }
}
