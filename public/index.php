<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
    <?php
    require_once '../vendor/autoload.php';
    session_start();
    
    ?>
</head>
<body>
    <?php require_once '../routes/web.php';?>
</body>
</html>