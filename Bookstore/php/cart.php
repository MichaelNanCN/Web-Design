<?php
session_start();
if (isset($_SESSION['selected_Category'])) {
    $selected_Category = $_SESSION['selected_Category'];
}

if (isset($_GET['action'])) {
    $cartCount = 0;
    $_SESSION['cartCount'] = $cartCount;
    unset($_SESSION['cart_items']);
    $cart_items = array();
}

if (isset($_GET['bookId'])) {
    extract($_GET, EXTR_PREFIX_ALL, "get");
    $_SESSION['cartCount']++;
    if (!isset($_SESSION['cart_items'])) {
        $cart_items = array();
    } else {
        $cart_items = $_SESSION['cart_items'];
    }
}

if (isset($_GET['bookId'])) {

    if (isset($_SESSION['cart_items'])) {
        $items_id = array_column($_SESSION['cart_items'], 'bookId');
        if (!in_array($_GET['bookId'], $items_id)) {
            $cartCount = count($_SESSION['cart_items']);
            $items = array(
                'bookId' => $_GET['bookId'],
                'title' => $_GET['title'],
                'price' => $_GET['price'],
                'quantity' => 1
            );
            $_SESSION['cart_items'][$_GET['bookId']] = $items;

        } else {
            echo $_SESSION['cartCount'];
        }
    } else {
        $items = array('bookId' => $_GET['bookId'],
            'title' => $_GET['title'],
            'price' => $_GET['price'],
            'quantity' => 1);
        $_SESSION['cart_items'][$_GET['bookId']] = $items;
    }
    $cart_items = $_SESSION['cart_items'];
}
//process update quantity
if (isset($_POST['quantity'])){
    $cart_items = $_SESSION['cart_items'];
    $difference = $_POST['quantity'] - $cart_items[$_POST['bookId']]['quantity'];
    $cart_items[$_POST['bookId']]['quantity'] = $_POST['quantity'];
    $_SESSION['cartCount'] += $difference;
    if ($_POST['quantity'] == 0) {
        unset($cart_items[$_POST['bookId']]);
    }
    $_SESSION['cart_items'] = $cart_items;
}

?>
<!doctype html>
<html lang="en">
<head>
    <title>Economy House - cart</title>
    <meta charset="utf-8">

    <link rel="stylesheet" type="text/css" href="/css/main.css">
    <link rel="stylesheet" type="text/css" href="/css/cart.css">
</head>

<body>
<main>
    <?php
    include('header.php')
    ?>
    <div class="title_box">
        <h1>Your Shopping Cart</h1>
    </div>
    <div>
        <section id="topSection">

            <a href="cart.php?action=clear" class="commandButton">Clear Cart</a>

            <a href="checkout.php" class="commandButton">Proceed to Checkout</a>

            <a href="category.php" class="commandButton">Continue Shopping</a>
        </section>
    </div>
    <section id="midSection">
        <?php
        if ($cartCount == 0) {
            echo "<h1>There is nothing in the cart</h1>";
        } else {
            if (!isset($cart_items)) {
                $cart_items = $_SESSION ['cart_items'];
            }
        echo "
        <div id='cartGrid'>
            <div class='gridHeader gridTitle'>Title</div>
            <div class='gridHeader gridQuantity'>Quantity</div>
            <div class='gridHeader gridPrice'>Price</div>
            <div class='gridHeader gridTotal'>Total Price</div>
                ";
            $cart_total = 0;
            foreach ($cart_items as $cart_item) {
            extract($cart_item);
            echo "
            <div class='gridTitle'>$title
            </div>
            <div class='gridQuantity'>
                <form action='cart.php' method='post'>
                    <input type='hidden' name='bookId' value='$bookId'>
                    <input type='number' name='quantity' min='0' max='9999' style='width: 30px'
                           value='$quantity'>
                    <input type='submit' value='Update'>
                </form>
            </div>
            <div class='gridPrice'>$price</div>
            <div class='gridTotal'>".$price * $quantity."</div>";
            $cart_total += $price * $quantity;
            }
            echo "</div>";
            }?>
    </section>

    <section id="bottomSection">
        <!--                  Only show totals if something is in the cart-->
        <?php
        if ($cartCount > 0) {
         echo "  
        
        <h2>You have $cartCount
            item in the cart</h2>

        <h2>Cart Total: $cart_total</h2>";
         $_SESSION['cart_total'] = $cart_total;
        }
        ?>
    </section>
    <?php
    include('footer.php')
    ?>

</main>
</body>



