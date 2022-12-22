<!doctype html>
<html lang="en">
<head>
    <title>Economy House - Checkout</title>

    <link rel="stylesheet" type="text/css" href="css/main.css"/>
    <link rel="stylesheet" type="text/css" href="css/Reservation.css"/>

</head>
<body>

<main>
    <?php
    include('header.php');
    ?>

    <section id="topSection">
        <h1>Checkout</h1>
    </section>

    <section id="bottomSection1" style="width: 100%;float:left">
        <section id="dataForm">
          <h1>  <p id="formTitleText">Please provide personal information and your room option:</p></h1>
            <!-- TODO Create a form for customer information -->

        </section>
    </section>
    <div style="float: left;width: 30%">
        <?php
        // define variables and set to empty values
        $FirstnameErr = $LastnameErr = $Address1Err = $Address2Err = $CityErr = $ZipcodeErr = "";
        $Firstname =$Lastname = $Address1 = $Address2 = $City = $Zipcode= "";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $errors = false;
            if (empty($_POST["firstname"])) {
                $FirstnameErr = "FirstName is required";
                $errors = true;
            } else {
                $Firstname = test_input($_POST["firstname"]);
            }}
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $errors = false;
            if (empty($_POST["lastname"])) {
                $LastnameErr = "LastName is required";
                $errors = true;
            } else {
                $Lastname = test_input($_POST["lastname"]);
            }

            if (empty($_POST["address1"])) {
                $Address1Err = "address1 is required";
                $errors = true;
            } else {
                $address1 = test_input($_POST["address1"]);
            }

            if (empty($_POST["city"])) {
                $CityErr = "city is required";
                $errors = true;
            } else {
                $City = test_input($_POST["city"]);
            }


            if ($errors == false){
                header("Location: confirmation.php?checkin=". $_SESSION['checkin']."&checkout=". $_SESSION['checkout']."&id=".$_POST['id']);
            }
        }

        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        ?>
        <div id="consumer_detail" >
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <?php echo "<input style='display: none' type='text' name='id' value='".$_GET['id']."'>"?>

                Customer FirstName: <input type="text" name="firstname" value="<?php echo $Firstname;?>">
                <span class="error">* <?php echo $FirstnameErr;?></span>
                <br><br>
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    Customer LastName: <input type="text" name="lastname" value="<?php echo $Lastname;?>">
                    <span class="error">* <?php echo $LastnameErr;?></span>
                    <br><br>
                    Address1: <input type="text" name="address1" value="<?php echo $Address1;?>">
                    <span class="error">* <?php echo $Address1Err;?></span>
                    <br><br>
                    Address2: <input type="text" name="address2" value="<?php echo $Address2;?>">
                    <span class="error">* <?php echo $Address2Err;?></span>
                    <br><br>
                    City: <input type="text" name="city" value="<?php echo $City;?>">
                    <span class="error">* <?php echo $CityErr;?></span>
                    <br><br>
                    Credit Card Number: <input type="text" name="city" value="<?php echo $City;?>">
                    <span class="error">* <?php echo $CityErr;?></span>
                    <br><br>
                    Exp.Date:
                    <select name='expireYY' id='expireYY'   >
                        <option value=''>Month</option>
                        <option value='01'>1</option>
                        <option value='02'>2</option>
                        <option value='03'>3</option>
                        <option value='04'>4</option>
                        <option value='05'>5</option>
                        <option value='06'>6</option>
                        <option value='07'>7</option>
                        <option value='08'>8</option>
                        <option value='09'>9</option>
                        <option value='10'>10</option>
                        <option value='11'>11</option>
                        <option value='12'>12</option>
                    </select>
                    <select name='year' id='expireYY'   >
                        <option value=''>year</option>
                        <option value='22'>22</option>
                        <option value='23'>23</option>
                        <option value='24'>24</option>
                        <option value='25'>25</option>
                        <option value='26'>26</option>
                        <option value='27'>27</option>
                        <option value='28'>28</option>
                        <option value='29'>29</option>
                        <option value='30'>30</option>
                        <option value='31'>31</option>
                    </select>
                    <br><br>
                    State:
                    <select name='expireMM' id='expireMM'>
                        <option value=''>State</option>
                        <option value='01'>AL</option>
                        <option value='02'>AK</option>
                        <option value='03'>AZ</option>
                        <option value='04'>AR</option>
                        <option value='05'>CA</option>
                        <option value='06'>CO</option>
                        <option value='07'>CZ</option>
                        <option value='08'>CT</option>
                        <option value='09'>DE</option>
                        <option value='10'>DC</option>
                        <option value='11'>FL</option>
                        <option value='12'>GA</option>
                        <option value='13'>GU</option>
                        <option value='14'>HI</option>
                        <option value='15'>ID</option>
                        <option value='16'>IL</option>
                        <option value='17'>IN</option>
                        <option value='18'>IA</option>
                        <option value='19'>KS</option>
                        <option value='20'>KY</option>
                        <option value='21'>LA</option>
                        <option value='22'>ME</option>
                        <option value='23'>MD</option>
                        <option value='24'>MA</option>
                        <option value='25'>MI</option>
                        <option value='26'>MN</option>
                        <option value='27'>MS</option>
                        <option value='28'>MO</option>
                        <option value='29'>MT</option>
                        <option value='30'>NE</option>
                        <option value='31'>NV</option>
                        <option value='32'>NH</option>
                        <option value='33'>NJ</option>
                        <option value='34'>NM</option>
                        <option value='35'>NY</option>
                        <option value='36'>NC</option>
                        <option value='37'>OH</option>
                        <option value='38'>OK</option>
                        <option value='39'>OR</option>
                        <option value='40'>PA</option>
                        <option value='41'>PR</option>
                        <option value='42'>RI</option>
                        <option value='43'>SC</option>
                        <option value='44'>SD</option>
                        <option value='45'>TN</option>
                        <option value='46'>TX</option>
                        <option value='47'>UT</option>
                        <option value='48'>VT</option>
                        <option value='49'>VA</option>
                        <option value='51'>VI</option>
                        <option value='52'>WA</option>
                        <option value='53'>WV</option>
                        <option value='54'>WI</option>
                        <option value='55'>WY</option>
                    </select>
                    <br><br>
                    Bed Type:
                    <select name='expireYY' id='expireYY' disabled  >
                        <?php
                            $sql = "select * from room_type where room_type_id='".$_GET["id"]."'";
                            $result = $mysqli->query($sql);
                            $row = $result->fetch_assoc();
                            echo " <option value=''>".$row["type"]."</option>"
                      ?>
                    </select>
                    <br><br>
                    Somke Option:
                    <select name='smoke' id='smoke'>
                        <option value=''>Select</option>
                        <option value='59'>Yes</option>
                        <option value='60'>No</option>
                    </select>
                    <br><br>
                    Loyal Member Number:
                    <input type="text" name="loyal_number" value="<?php echo $City;?>">
                    <br><br>
                    <input type="submit" name="submit" value="Submit" >
                </form>
        </div>
    </div>
    <div  style="float: left;border: 1px solid black;width: 69%">
        <div class="date_box" style=""><?php
            $strtotime = strtotime($_GET['checkout']);
            $strtotime1 = strtotime($_GET['checkin']);
            $a= $strtotime-$strtotime1;
            $diff=$a/86400;
            if (!isset($_GET['checkin'])){
                echo "<span>Checkin Date: ".$_GET['checkin']."</span>";
                echo "<span>Checkout Date:".$_GET['checkout']."</span>";
                echo "<span>Length of Stay:".$diff."</span>";
            }else{
                echo "<span>Checkin Date: ".$_GET['checkin']."</span>";
                echo "<span>Checkout Date:".$_GET['checkout']."</span>";
                echo "<span>Length of Stay:".$diff."</span>";
            }
            ?>
        </div>
        <?php

        if ($_GET["id"] == 1) {
            echo "<div class='each_book'><img src='images/Suite_Queen.jpg' width='400'
                              height='200'
                              alt='Suit Queen'><h4>Suit Queen</h4></div><div><p>This 378-square-foot room offers a spectacular vantage point of the Empire State Building and separate living, dining and Two Superior Queen bedroom areas.</p>
                              <h1>total: $" .($diff*500)."</h1></div>";
        } elseif ($_GET["id"] == 2) {
            echo "<div class='each_book'><img src='images/Suite_King.png' width='400'
                              height='200'
                              alt='Suit King'><h4>Suit King</h4></div><div><p>This 378-square-foot room offers a spectacular vantage point of the Empire State Building and separate living, dining and One Superior King bedroom areas. SMOKE ONLY ALLOWED IN 5TH FLOOR</p>
                              <h1>total: $" .($diff*500)."</h1></div>";
        } elseif ($_GET["id"] == 3) {
            echo "<div class='each_book'><img src='images/Deluxe_Queen.jpg' width='400'
                              height='200'
                              alt='Deluxe Queen'><h4>Deluxe Queen</h4></div>
                              <div><p>This 220-square-foot room offers an amazing view of midtown and comes with complementary breakfast and enjoy your deluxe journey with your Two deluxe Queen bed</p>
                               <h1>total: $" .($diff*350)."</h1></div>";

        }elseif ($_GET["id"] == 4) {
            echo "<div class='each_book'><img src='images/Deluxe_King.png' width='400'
                              height='200'
                              alt='Deluxe King'><h4>Deluxe King</h4></div>
                              <div><p>This 220-square-foot room offers an amazing view of midtown and comes with complementary breakfast and enjoy your deluxe journey with your One deluxe King bed</p>
                              <h1>total: $" .($diff*350)."</h1></div>";
        }elseif ($_GET["id"] == 5) {
            echo "<div class='each_book'><img src='images/Superior_Queen.png' width='400'
                              height='200'
                              alt='Superior Queen'><h4>Superior Queen</h4></div>
                              <div><p>Take in sweeping views of the Empire State Building and Midtown from this 195-square-foot room with Two queen bed and featuring a plush sitting area, modern decor and refrigerator.</p>
                                <h1>total: $" .($diff*250)."</h1></div>";
        }elseif ($_GET["id"] == 6) {
            echo "<div class='each_book'><img src='images/Superior_King.png' width='400'
                              height='200'
                              alt='Superior King'><h4>Superior King</h4></div>
                              <div><p>Take in sweeping views of the Empire State Building and Midtown from this 195-square-foot room with One king bed and featuring a plush sitting area, modern decor and refrigerator.</p>
                            <h1>total: $" .($diff*250)."</h1></div>";
        }else{
            echo "<div class='each_book'><img src='images/Superior_Queen.png' width='400'
                              height='200'
                              alt='Suite Queen'><h4>Suite Queen</h4></div><div><p>Take in sweeping views of the Empire State Building and Midtown from this 195-square-foot room with one queen bed and featuring a plush sitting area, modern decor and refrigerator.</p>
                              <h1>total: $" .($diff*500)."</h1></div>";
        }
        ?></div>

</main>
<?php
include('footer.php')
?>
</body>
</html>