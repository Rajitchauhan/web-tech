<!-- View to display the list of projects -->
<?php include 'MVC/view/projects-list.php'; ?>
<h2>Projects List</h2>
<ul>
    <?php foreach ($data as $project): ?>
        <li><?php echo $project['title']; ?></li>
    <?php endforeach; ?>
</ul>
