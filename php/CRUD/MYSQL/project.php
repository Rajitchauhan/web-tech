<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <style media="screen">
        label{
          display: block;
          }

          .message_ok {
             background-color: green;
           }

        .message_error {
           background-color: red;
         }
    </style>
  </head>
  <body>
    <form method="post">
       <label for="title">Title</label>
       <input type="text" placeholder="New project" name="title" id="title">
       <label for="category">Category</label>
       <select name="category" id="category">
          <option value="">Select a category</option>
          <option value="Professional">Professional</option>
           <option value="Personal">Personal</option>
           <option value="Charity">Charity</option>
    </select>
    <input type="submit" name="submit" value="Add">
    </form>

  </body>
</html>

<?php

require 'config.php';

if (isset($_POST['submit'])) {
    try {
        $category = $_POST['category'];
        $title = trim($_POST['title'], FILTER_SANITIZE_STRING);

        if (empty($title) || empty($category)) {
            $error_message = "Title or category is empty";
        } else {
            $sql = "INSERT INTO projects (title, category) VALUES (?, ?)";

            // Prepare the statement
            $statement = $conn->prepare($sql);

            // Check if the preparation was successful
            if ($statement === false) {
                throw new Exception("Error preparing the SQL statement: " . $conn->error);
            }

            // Bind parameters
            $statement->bind_param("ss", $title, $category);

            // Execute the statement
            if ($statement->execute() === false) {
                throw new Exception("Error executing the SQL statement: " . $statement->error);
            }

            $message = "Added successfully";
        }
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}

?>



<?php

require 'config.php';

  if(isset($_POST['submit'])){
      try {

        // $title = trim($_POST['title']); //We’ll use the trim() function to delete white spaces.
        //This function removes whitespace (or other characters) from both the beginning and end of a string.
        $category = $_POST['category'];

        $title = trim($_POST['title'],  FILTER_SANITIZE_STRING);

        //This is a filter used with the filter_var function to sanitize a string.
        //It removes or encodes any special characters that could be interpreted as HTML or PHP code.
        // $input = '<script>alert("Hello");</script>';
        // $sanitizedInput = filter_var($input, FILTER_SANITIZE_STRING);
        // echo $sanitizedInput; // Output: 'alert("Hello");'
        // Sanitizing input is important to prevent security vulnerabilities
        //  such as SQL injection or cross-site scripting (XSS).
        //  Always sanitize and validate user input before using it in your application.

        $sql = "insert into table projects('title' , 'category') values(? , ?)";
        $statement = $conn->prepare($sql);

        if (empty($title) || empty($category)) {
        $error_message = "Title or category empty";}

        $new_project = array(
            'title' => $title,
            'category' => $category
          );

        $statement->execute($new_project);
        $message = "Added successful";
      } catch (\Exception $e) {
        echo $sql . "<br>".$err->getMessage();
      }

  }

 ?>
