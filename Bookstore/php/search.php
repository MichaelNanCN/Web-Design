<?php
session_start();
include ('databaseFunctions.php');
initdb();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Economy House</title>
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/index.css">
    <link rel="stylesheet" href="/css/search.css">
</head>
<body>

<main>
    <?php
    include('header.php')
    ?>
    <div class="outer-container">
        <div class="category_box">
            <section id="mainLeft">
                <div class="subcategory-container">
                    <?php
                    foreach ($_SESSION['categories'] as $category) {
                        if ($category['categoryId'] == $selected_Category) {
                            echo "<p class='selected_main_category'><a href='category.php?category=".$category['categoryId']."'> " . $category['categoryName'] . "</a></p>";
                        } else {
                            echo "<p class='unselected_main_category'><a href='category.php?category=".$category['categoryId']."'> " . $category['categoryName'] . "</a></p>";
                        }
                    }
                    ?>
                </div>
            </section>
        </div>
        <div class="book_box">
            <section id="mainRight">
                <div class="booksGrid">
        <?php
        $query = $_GET['q'];
        $sql = "SELECT * FROM book WHERE title LIKE '%$query%' OR author LIKE '%$query%'";
        $stmt = $db->query($sql);
        $results = $stmt->fetch_all(MYSQLI_ASSOC);
        if (empty($query)) {
            echo "<h1>Please Enter Your Search Information!</h1>";
        } else {
            if (!empty($results)){
                foreach ($results as $book) {
                    echo "<div class='each_book'><img src='/images/{$book['image']}' alt='{$book['image']}'>
            <div><p>{$book['title']} by {$book['author']} $ {$book['price']}
            <p class='cart'><a href='cart.php?bookId={$book['bookId']}&title={$book['title']}&price={$book['price']}&quantity=1'> Add to cart</a></p></div></div>";

                }
            }else {
                echo "<h1>Book You Search Does Not Exist!</h1>";
            }
        }


        // Loop through the results and display them

        ?>
                </div>
            </section>
        </div>
    </div>
</main>
<?php
include('footer.php')
?>
</body>
</html>
