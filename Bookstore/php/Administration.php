<?php
include ('databaseFunctions.php');
initdb();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Welcome</title>
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/index.css">
    <link rel="stylesheet" href="/css/administration.css">
</head>
<body>
<?php
include ('header.php');
?>
<main>
    <div class="title_box">
        <div id="title">
            <h1>Welcome To Administration Page</h1>
        </div>
    </div>
    <div class="outer-container">
        <div class="introduction_box">
            <section id="mainLeft">
                <div class="detail_intro_box">
                    <h1>You Have Those Books In The Database</h1>
    <?php
    $query = mysqli_query($db,"SELECT * FROM book");
    $num_rows = mysqli_num_rows($query);
    while($row = mysqli_fetch_array($query)) {
        $bookId = $row['bookId'];
        $categoryId = $row['categoryId'];
        $title = $row['title'];
        $author = $row['author'];
        $price = $row['price'];
        $image = $row['image'];
        echo $bookId. ' '. $title .' '.$author .' '.$price. '<br />';
    }
    ?>
                </div>
            </section>
        </div>
        <div class="category_box">
            <section id="mainRight">
                <form action="add-book.php" method="post">
                    <label for="bookId">BookId:</label><br>
                    <input type="number" id="bookId" name="bookId"><br>
                    <label for="categoryId">CategoryId:</label><br>
                    <input type="number" id="categoryId" name="categoryId"><br>
                    <label for="title">Title:</label><br>
                    <input type="text" id="title" name="title"><br>
                    <label for="author">Author:</label><br>
                    <input type="text" id="author" name="author"><br>
                    <label for="price">Price:</label><br>
                    <input type="number" id="price" name="price"><br><br>
                    <label for="image">Image:</label><br>
                    <input type="text" id="image" name="image"><br><br>
                    <label for="readNow">Read Now:</label><br>
                    <input type="number" id="readNow" name="readNow"><br><br>
                    <input type="submit" value="Add book">
                </form>
                <form action="delete-book.php" method="post">
                    <label for="bookId">BookId:</label><br>
                    <input type="number" id="bookId" name="bookId"><br>
                    <input type="submit" value="Delete book">
                </form>


            </section>
        </div>
</main>

    <?php
    include ('footer.php');
    ?>
</body>
</html>