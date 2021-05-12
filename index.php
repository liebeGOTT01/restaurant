<?php
    include 'includes/dbh.inc.php';
    include 'includes/data.inc.php';
    include 'includes/viewData.inc.php';
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
        $users = new ViewData();
        $users->showAllUsers();
    ?>
</body>

</html>