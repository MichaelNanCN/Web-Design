<?php
session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <title>Economy House - Checkout</title>

    <link rel="stylesheet" type="text/css" href="/css/main.css"/>
    <link rel="stylesheet" type="text/css" href="/css/checkout.css"/>

</head>
<body>

<main>
    <?php
    include('header.php')
    ?>
    <section id="topSection">
        <h1>Checkout</h1>
    </section>

    <section id="bottomSection">
        <section id="dataForm">
            <p id="formTitleText">In order to purchase the items in your shopping cart, please provide the
                following information:</p>
            <!-- TODO Create a form for customer information -->
            <?php
            // define variables and set to empty values
            $nameErr = $emailErr = $addressErr = $phoneErr = $credit_card_Err = "";
            $name = $email = $address = $phone = $credit_card_number= "";

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $errors = false;
                if (empty($_POST["name"])) {
                    $nameErr = "Name is required";
                    $errors = true;
                } else {
                    $name = test_input($_POST["name"]);
                }
                if (empty($_POST["address"])) {
                    $addressErr = "address is required";
                    $errors = true;
                } else {
                    $address = test_input($_POST["address"]);
                }

                if (empty($_POST["phone"])) {
                    $phoneErr = "valid phone number is required";
                    $errors = true;
                } else {
                    $phone_number_validation_regex = "/^\\+?[1-9][0-9]{7,14}$/";
                    if (preg_match($phone_number_validation_regex, $_POST["phone"]) == 0) {
                        $phoneErr = "You should enter in form +1xxxxxxxxxx";
                        $errors = true;
                    }
                    else {
                        $phone = test_input($_POST["phone"]);
                    }
                }

                if (empty($_POST["email"])) {
                    $emailErr = "email address is required";
                    $errors = true;
                } else {
                    $email = test_input($_POST["email"]);
                }

                if (empty($_POST["credit_card_number"])) {
                    $credit_card_Err = "credit card number is required";
                    $errors = true;
                } else {
                    $credit_card_number_validation_regex = "/^[1-9][0-9]{15,15}$/";
                    if (preg_match($credit_card_number_validation_regex, $_POST["credit_card_number"]) == 0) {
                        $credit_card_Err = "You should enter 16 digits card number";
                        $errors = true;
                    }
                    else {
                        $credit_card_number = test_input($_POST["credit_card_number"]);
                    }
                }

                if ($errors == false){
                    header("Location: confirmation.php");
                }
            }

            function test_input($data) {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }
            ?>
            <div id="consumer_detail">
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                Customer Name: <input type="text" name="name" value="<?php echo $name;?>">
                <span class="error">* <?php echo $nameErr;?></span>
                <br><br>
                Address: <input type="text" name="address" value="<?php echo $address;?>">
                <span class="error">* <?php echo $addressErr;?></span>
                <br><br>
                Phone: <input type="text" name="phone" value="<?php echo $phone;?>">
                <span class="error">* <?php echo $phoneErr;?></span>
                <br><br>
                Email: <input type="email" name="email" value="<?php echo $email;?>">
                <span class="error">* <?php echo $emailErr;?></span>
                <br><br>
                Credit Card Number: <input type="number" name="credit_card_number" value="<?php echo $credit_card_number;?>">
                    <span class="error">* <?php echo $credit_card_Err;?></span>
                <br><br>
                Exp. Date:
                <select name='expireMM' id='expireMM'>
                    <option value=''>Month</option>
                    <option value='01'>January</option>
                    <option value='02'>February</option>
                    <option value='03'>March</option>
                    <option value='04'>April</option>
                    <option value='05'>May</option>
                    <option value='06'>June</option>
                    <option value='07'>July</option>
                    <option value='08'>August</option>
                    <option value='09'>September</option>
                    <option value='10'>October</option>
                    <option value='11'>November</option>
                    <option value='12'>December</option>
                </select>
                <select name='expireYY' id='expireYY'>
                    <option value=''>Year</option>
                    <option value='22'>2022</option>
                    <option value='23'>2023</option>
                    <option value='24'>2024</option>
                    <option value='25'>2025</option>
                    <option value='26'>2026</option>
                    <option value='27'>2027</option>
                    <option value='28'>2028</option>
                    <option value='29'>2029</option>
                    <option value='30'>2030</option>
                    <option value='31'>2031</option>
                </select>
                <br><br>
                    <input type="submit" name="submit" value="Submit">
                </form>

            </div>
        </section>
        <section id="checkoutSummary">
            <ul>
                <li>Next day delivery is guaranteed.</li>
                <li>A $5.00 shipping fee is applied to all orders</li>
            </ul>
            <div id="checkoutTotals">
                        <div>Cart Subtotal</div>
                        <div>
                            <?php
                            echo '$'.$_SESSION['cart_total'];

                            ?></div>

                        <div>Shipping Fee</div>
                        <div><?php
                            $_SESSION['shoppingFee'] = 5;
                            echo '$'.$_SESSION['shoppingFee'];

                            ?></div>

                        <div class="total">Total</div>
                        <div class="total"><?php
                            echo '$'.( $_SESSION['cart_total'] + $_SESSION['shoppingFee']);

                            ?></div>
            </div>
        </section>
    </section>
</main>
<?php
include('footer.php')
?>
</body>
</html>

