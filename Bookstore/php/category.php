<?php
session_start();
include ('databaseFunctions.php');
initdb();

?>

<!doctype html>
<html lang="en">
<head>
    <title>Economy House</title>
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/category.css">
</head>
<body>
<?php
include('header.php');
?>
<main>
    <?php

    $_SESSION['categories'] = getCategories($db);

    foreach ($_SESSION['categories'] as $category) {
    if ($category['categoryId'] == $selected_Category) {
        $_SESSION['selected_Category']= getBooks($db, $selected_Category);
    }
}

    ?>
    <div class="title_box">
        <div id="box1">
            <h1>Welcome to Hongyu Nan's World of Economy</h1>
        </div>
    </div>
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
                    foreach ($_SESSION['selected_Category'] as $book) {
                        extract($book);
                        if ($categoryId == $selected_Category) {
                            if($readNow == 1){
                                echo "
                                <div class='each_book'><img src='/images/$image' alt='$image'>
                                <div><h5>$title</h5>                   
                                <p>by $author</p>                        
                                <p>$price</p>              
                                <p class='cart'><a href='cart.php?bookId=$bookId&title=$title&price=$price&quantity=1'> Add to cart</a></p> 
                                <p class='read'><a href='category.php'> Read Now</a></p></div>
                                </div>";
                            }
                            else{echo "
                            <div class='each_book'><img src='/images/$image' alt='$image'>
                            <div><h5>$title</h5>                   
                                <p>by $author</p>                        
                                <p>$price</p>                       
                                <p class='cart'><a href='cart.php?bookId=$bookId&title=$title&price=$price&quantity=1'> Add to cart</a></p></div>
                            </div>";
                            }
                            }


                    }
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
