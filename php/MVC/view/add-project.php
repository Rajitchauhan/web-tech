<!-- View to add a new project -->
<h2>Add Project</h2>
<form method="post" action="index.php?action=addProject">
    <label for="title">Title:</label>
    <input type="text" name="title" required>
    <br>
    <label for="description">Description:</label>
    <textarea name="description" required></textarea>
    <br>
    <input type="submit" value="Add Project">
</form>
