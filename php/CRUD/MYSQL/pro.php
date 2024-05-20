<?php

require 'config.php';

if (isset($_POST['submit'])) {
    try {
        $category = $_POST['category'];

        // $title = trim($_POST['title']); //We’ll use the trim() function to delete white spaces.
  //This function removes whitespace (or other characters) from both the beginning and end of a string.
        $title = trim($_POST['title'], FILTER_SANITIZE_STRING);
        //This is a filter used with the filter_var function to sanitize a string.
        //It removes or encodes any special characters that could be interpreted as HTML or PHP code.
        // $input = '<script>alert("Hello");</script>';
        // $sanitizedInput = filter_var($input, FILTER_SANITIZE_STRING);
        // echo $sanitizedInput; // Output: 'alert("Hello");'
        // Sanitizing input is important to prevent security vulnerabilities
        //  such as SQL injection or cross-site scripting (XSS).
        //  Always sanitize and validate user input before using it in your application.

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
            //The bind_param method is used to bind variables to a prepared statement
            // as parameters. It is commonly used in situations where you have placeholders
            // in an SQL query, and you want to replace those placeholders with actual values.
            // This process is important for preventing SQL injection by ensuring that user
            //inputs are properly sanitized and escaped before being used in a query.
            // Bind parameters
            //$statement->bind_param("ss", $title, $category);
            //$statement: This variable represents
            //the prepared statement that you obtained using $conn->prepare($sql).

            //bind_param("ss", $title, $category):
            //This method is called on the prepared statement,
            //and it binds parameters to the placeholders in the SQL query.

            //The first argument to bind_param is a string that
            //specifies the types of the variables being bound.
            //In your case, it's "ss," indicating that both $title and $category are strings.

            //The subsequent arguments are the variables to be bound to the placeholders in the
            // order they appear in the SQL query.
          //  INSERT INTO projects (title, category) VALUES (?, ?)
          //You have two placeholders (?) in this query, one for the title and one for the category.
          //You want to replace these placeholders with actual values when executing the query.



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

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Project Form</title>
    <style media="screen">
        label {
            display: block;
        }

        .message_ok {
            background-color: green;
            color: white;
            padding: 5px;
            margin-top: 10px;
        }

        .message_error {
            background-color: red;
            color: white;
            padding: 5px;
            margin-top: 10px;
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

<?php
// Display success or error message
if (isset($message)) {
    echo '<div class="message_ok">' . $message . '</div>';
} elseif (isset($error_message)) {
    echo '<div class="message_error">' . $error_message . '</div>';
}
?>

</body>
</html>
