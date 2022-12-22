<header>
    <div id="leftHeader">
        <a href="index.php">
            <img src="/images/Economy_House-logos.jpg" alt="Economy_House-logos">
        </a>
    </div>
    <div id="midHeader">
        <form action="search.php" method="get" id="searchBoxForm">
            <label for="searchBox">
            </label>
            <input type="search" id="search-box" name="q" placeholder="Enter your search query">
            <input id="searchIcon" type="image"
                   src="/images/search.png" alt="search icon">
        </form>
        <div class="dropdown">
            <p class="dropdownSelect">Select Category</p>
            <div class="dropdownContent">
                <?php

                $categories = $_SESSION['categories'];
                if(isset($_SESSION['cartCount'])){
                    $cartCount= $_SESSION['cartCount'] ;
                }
                else{
                    $cartCount= 0 ;
                    $_SESSION['cartCount']  =  $cartCount;
                }

                if (isset($_GET['category'])) {
                    $selected_Category = $_GET['category'];
                } else {
                    $selected_Category = 1;
                }

                foreach ($_SESSION['categories'] as $category) {
                    echo "<a href='category.php?category=$category[categoryId]'</a>";
                    if ($category['categoryId'] == $selected_Category) {
                        echo "<p class='selected_drop_down'> " . $category['categoryName'] . "</p>";
                    } else {
                        echo "<p class='unselected_drop_down'>" . $category['categoryName'] . "</p>";
                    }
                }
                ?>
            </div>
        </div>
    </div>
    <div id="rightHeader">
        <div id="cartIcon"><a href="cart.php">
                <img src="/images/shopping-cart.png" alt="shopping cart icon"></a>
        </div>
        <div id="cartCount">
   <?php
   echo $cartCount;


   ?>
         </div>
        <div id="loginButton"><a href="login.php">login</a></div>
    </div>
</header>
