<?php
session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <title>Economy House - Confirmation</title>

    <link rel="stylesheet" type="text/css" href="/css/main.css"/>
    <link rel="stylesheet" type="text/css" href="/css/confirmation.css"/>
</head>
<body>
<?php
include('header.php')
?>

<main>
    <?php
    echo "<h1>Thank you for the order.  Have a great day!</h1>
    <p><a href='index.php' class='commandButton'>Return to Home</a></p>";
    ?>


    <?php
    session_destroy();
    ?>

</main>
</body>
</html>


