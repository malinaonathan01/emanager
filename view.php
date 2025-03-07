<?php
include 'config.php';

$slug = $_GET['slug'];
$sql = "SELECT * FROM files WHERE slug='$slug'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
} else {
    echo "File not found.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $row['title']; ?></title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        .iframe-container {
            position: relative;
            width: 100%;
            padding-bottom: 56.25%; /* 16:9 aspect ratio */
            margin-bottom: 20px;
        }
        .iframe-container iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border: none;
        }
        .dropdown-switcher {
            position: absolute;
            top: 10px;
            left: 10px;
            z-index: 10;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="mt-5"><?php echo $row['title']; ?></h1>

        <div class="iframe-container">
            <div class="dropdown dropdown-switcher">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Switch Content
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="#" id="embed1-btn">Embed 1</a>
                    <a class="dropdown-item" href="#" id="embed2-btn">Embed 2</a>
                    <a class="dropdown-item" href="#" id="directlink-btn">Direct Link</a>
                </div>
            </div>

            <iframe src="<?php echo $row['embed_1']; ?>" id="embed1-content"></iframe>
            <iframe src="<?php echo $row['embed_2']; ?>" id="embed2-content" style="display: none;"></iframe>
            <iframe src="<?php echo $row['direct_link']; ?>" id="directlink-content" style="display: none;"></iframe>
        </div>

        <a href="index.php" class="btn btn-secondary mt-3">Back to List</a>
    </div>

    <script>
        $(document).ready(function(){
            $('#embed1-btn').click(function(){
                $('#embed1-content').show();
                $('#embed2-content').hide();
                $('#directlink-content').hide();
            });

            $('#embed2-btn').click(function(){
                $('#embed1-content').hide();
                $('#embed2-content').show();
                $('#directlink-content').hide();
            });

            $('#directlink-btn').click(function(){
                $('#embed1-content').hide();
                $('#embed2-content').hide();
                $('#directlink-content').show();
            });
        });
    </script>
</body>
</html>