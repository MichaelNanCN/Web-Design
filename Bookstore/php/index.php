<?php
session_start();
include 'databaseFunctions.php';
initdb();
unset($_SESSION['selected_Category']);
$_SESSION['categories'] = getCategories($db);
$categories = $_SESSION['categories'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Economy House</title>
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/index.css">
</head>
<body>

<main>
    <?php
    include('header.php')
    ?>
    <div class="title_box">
        <div id="title">
            <h1>Welcome to Hongyu Nan's World of Economy</h1>
        </div>
    </div>
    <div class="outer-container">
        <div class="introduction_box">
            <section id="mainLeft">
                <div class="detail_intro_box">
                    <div id="intro_line1">
                        <h1>Welcome to the mine for all the Economy knowledge you need to know!</h1>
                    </div>
                    <div id="intro_line_2">
                        <h2>If you want to learn about how the economic system empower the world, here are answers</h2>
                    </div>
                    <div id="intro_line3">
                        <h2>If you want help in employing Economic theory in the real world, you have come to the right
                            place</h2>
                    </div>
                    <div id="intro_line4">
                        <h2>We have the most relative book selection online, and we keep our price as low as you can
                            imagine</h2>
                    </div>
                </div>
            </section>
        </div>
        <div class="category_box">
            <section id="mainRight">
                <h2>
                    Shop by Category:
                </h2>
                <div id="books_Grid">
                <?php
                foreach ($_SESSION['categories'] as $category) {
                    extract($category);
                        echo "<div class='category_title'><h3><p><a href='category.php?category=$categoryId'>$categoryName</a></p></h3>
                                <a href='category.php?category=$categoryId'><img src='/images/$categoryName.png' alt = '$categoryName'></a></div>";
                }
                ?>
                </div>
            </section>
    </div>
</main>
<?php
include('footer.php')
?>
</body>
</html>
