<?php
include 'config.php';

// Check if the user is logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: admin/login.php');
    exit;
}

$sql = "SELECT * FROM files";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Public Page</title>
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<!-- Optional JavaScript and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Files</h1>
        <div class="list-group">
            <?php while($row = $result->fetch_assoc()): ?>
                <a href="video/<?php echo $row['slug']; ?>" class="list-group-item list-group-item-action">
                    <h5 class="mb-1"><?php echo $row['title']; ?></h5>
                    <p class="mb-1">Slug: <?php echo $row['slug']; ?></p>
                    <small>Embed 1: <a href="<?php echo $row['embed_1']; ?>" target="_blank"><?php echo $row['embed_1']; ?></a></small><br>
                    <small>Embed 2: <a href="<?php echo $row['embed_2']; ?>" target="_blank"><?php echo $row['embed_2']; ?></a></small><br>
                    <small>Direct Link: <a href="<?php echo $row['direct_link']; ?>" target="_blank"><?php echo $row['direct_link']; ?></a></small>
                </a>
            <?php endwhile; ?>
        </div>
    </div>
</body>
</html>