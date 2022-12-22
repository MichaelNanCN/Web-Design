<?php
session_start();
include 'hotelDatabase.php';
$sql = "select * from room_type";
$result = $mysqli->query($sql);
$roomTypes = array();
while($arr = $result->fetch_assoc()){
    array_push($roomTypes, $arr);
}
$_SESSION['roomTypes'] = $roomTypes;
?>
<!doctype html>
<html lang="en">
<head>
    <title>Economy House</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/roomtype.css">
</head>
<body>
<main>
    <?php
    include('header.php');
    if (isset($_GET["checkin"])){
        $_SESSION['checkin']=$_GET["checkin"];
        $_SESSION['checkout']=$_GET["checkout"];
    }else{

        $_SESSION['checkin']="";
        $_SESSION['checkout']="";
    }
    if (strcmp($_GET['roomtype'],"Select+Your+Bed+Type")){

    }else{

    }
    ?>
    <div class="title_box">
        <div id="box1">
            <h1>See Available Room Below</h1>
        </div>
    </div>
    <div class="outer-container">
        <div class="category_box" >
            <section id="mainLeft">
                <div class="subcategory-container">
                    <?php
                    if (isset($_SESSION['roomTypes'])) {
                        foreach ($_SESSION['roomTypes'] as $roomType) {
                            echo "<p  class='selected_main_category'><a href='roomtype.php?checkin=". $_SESSION['checkin']."&checkout=". $_SESSION['checkout']."&roomtype=" . $roomType['room_type_id'] . "'> " . $roomType['type'] . "</a></p>";
                        }
                    }
                    ?>
                </div>
            </section>
        </div>
        <?php $roomId="none"?>
        <?php
         $roomIds=2;
        if (!strcmp($_GET['roomtype'],"Select Your Bed Type")){
            $roomId="";
        }else{
            $roomIds= $_GET['roomtype'];
            $roomId="";
        }
        ;?>
        <div class="book_box" style="<?php echo 'width: 100%;display:'.$roomId.";'" ?>">

                <section id="mainRight">
                    <div class="date_box"><?php
                        if (isset($_GET['checkin'])) {
                            $_SESSION['roomDate'] = array('checkin' => $_GET['checkin'], 'checkout'=> $_GET['checkout']);
                            echo "<div>Checkin Date: ".$_SESSION['checkin']."</div>";
                            echo "<div>Checkout Date: ".$_SESSION['checkout']."</div>";
                            $checkin_date = strtotime($_SESSION['roomDate']['checkin']);
                            $checkout_date = strtotime($_SESSION['roomDate']['checkout']);
                            $diff = abs($checkout_date - $checkin_date);
                            $years = floor($diff / (365*60*60*24));
                            $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
                            $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
                            printf("Length of Stay: %d days\n", $days);
                        } else {
                            $strtotime = strtotime($_SESSION['checkout']);
                            $strtotime1 = strtotime($_SESSION['checkin']);
                            $a= $strtotime-$strtotime1;
                            $diff=$a/86400;
                            if (!isset($_SESSION['checkin'])){
                                echo "<div>Checkin Date: ".$_SESSION['checkin']."</div>";
                                echo "<div>Checkout Date:".$_SESSION['checkout']."</div>";
                                echo "<div>Length of Stay:".$diff."</div>";
                            }else{

                                echo "<div>Checkin Date: null "."</div>";
                                echo "<div>Checkout Date: null"."</div>";
                                echo "<div>Length of Stay: null"."</div>";
                            }
                        }
                        ?></div>
                    <div class="booksGrid">
                    <?php

                    if ($roomIds == 1) {
                        echo "<div class='each_book'><img src='images/Suite_Queen.jpg' width='400'
                              height='200'
                              alt='Suit Queen'><h4>Suit Queen</h4></div><div><p>This 378-square-foot room offers a spectacular vantage point of the Empire State Building and separate living, dining and Two Superior Queen bedroom areas.</p>
                              <h1>$ 500 / Per Night On Floor 2nd Or 3rd </h1></div>";
                    } elseif ($roomIds == 2) {
                        echo "<div class='each_book'><img src='images/Suite_King.png' width='400'
                              height='200'
                              alt='Suit King'><h4>Suit King</h4></div><div><p>This 378-square-foot room offers a spectacular vantage point of the Empire State Building and separate living, dining and One Superior King bedroom areas. SMOKE ONLY ALLOWED IN 5TH FLOOR</p>
                              <h1>$ 500 / Per Night On Floor 4th Or 5th </h1></div>";
                    } elseif ($roomIds == 3) {
                        echo "<div class='each_book'><img src='images/Deluxe_Queen.jpg' width='400'
                              height='200'
                              alt='Deluxe Queen'><h4>Deluxe Queen</h4></div>
                              <div><p>This 220-square-foot room offers an amazing view of midtown and comes with complementary breakfast and enjoy your deluxe journey with your Two deluxe Queen bed. SMOKE ONLY ALLOWED IN 5TH FLOOR</p>
                              <h1>$ 350 / Per Night On Floor 4th Or 5th</h1></div>";
                    }elseif ($roomIds == 4) {
                        echo "<div class='each_book'><img src='images/Deluxe_King.png' width='400'
                              height='200'
                              alt='Deluxe King'><h4>Deluxe King</h4></div>
                              <div><p>This 220-square-foot room offers an amazing view of midtown and comes with complementary breakfast and enjoy your deluxe journey with your One deluxe King bed. SMOKE ONLY ALLOWED IN 5TH FLOOR</p>
                              <h1>$ 350 / Per Night On Floor 4th Or 5th</h1></div>";
                    }elseif ($roomIds == 5) {
                        echo "<div class='each_book'><img src='images/Superior_Queen.png' width='400'
                              height='200'
                              alt='Superior Queen'><h4>Superior Queen</h4></div>
                              <div><p>Take in sweeping views of the Empire State Building and Midtown from this 195-square-foot room with Two queen bed and featuring a plush sitting area, modern decor and refrigerator.</p>
                              <h1>$ 250 / Per Night On Floor 2nd Or 3rd</h1></div>";
                    }elseif ($roomIds == 6) {
                        echo "<div class='each_book'><img src='images/Superior_King.png' width='400'
                              height='200'
                              alt='Superior King'><h4>Superior King</h4></div>
                              <div><p>Take in sweeping views of the Empire State Building and Midtown from this 195-square-foot room with One king bed and featuring a plush sitting area, modern decor and refrigerator.</p>
                              <h1>$ 250 / Per Night On Floor 2nd Or 3rd</h1></div>";
                    }else{
                        echo "<div class='each_book'><img src='images/Superior_Queen.png' width='400'
                              height='200'
                              alt='Suite Queen'><h4>Suite Queen</h4></div><div><p>Take in sweeping views of the Empire State Building and Midtown from this 195-square-foot room with one queen bed and featuring a plush sitting area, modern decor and refrigerator.</p>
                              <h1>$ 250 / Per Night On Floor 2nd Or 3rd</h1></div>";
                    }
                    ?></div>
                    <h1>Hotel Feature</h1>
                    <div class="hotel_feature">
                        <div><img src='images/wifi.png' width='40'
                             height='40'
                             alt='wifi'><h6>Free Internet Access</h6></div>
                        <div><img src='images/restaurant.png' width='40'
                             height='40'
                             alt='restaurant'><h6>On-Site Restaurant</h6></div>
                        <div><img src='images/room_service.png' width='40'
                             height='40'
                             alt='room_service'><h6>Room Service</h6></div>
                        <div><img src='images/gym.png' width='40'
                             height='40'
                             alt='gym'><h6>Fitness Center</h6></div>
                        <div><img src='images/digital_key.png' width='40'
                             height='40'
                             alt='digital_key'><h6>Digital Key</h6></div>
                        <div><img src='images/digital_check.ong.png' width='40'
                             height='40'
                             alt='digital_checkin'><h6>Digital Check-In</h6></div>
                        <div><img src='images/business_ser.png' width='40'
                             height='40'
                             alt='business_service'><h6>Business Services</h6></div>
                        <div><img src='images/Concierge.png' width='40'
                             height='40'
                             alt='Concierge'><h6>Concierge</h6></div>
                        <div><img src='images/meeting.png' width='40'
                             height='40'
                             alt='meeting'><h6>Meeting Facilities</h6></div>
                    </div>
                    <?php
                    echo "<div class='book_your_stay'>
                        <a class='button-87' role='button'  type='submit' href='Reservation.php?checkin=". $_SESSION['checkin']."&checkout=". $_SESSION['checkout']."&id=" .$roomIds."'>CLICK HERE TO BOOK YOUR STAY! </a>
                    </div>"
                    ?>
            </section>
        </div>
    </div>
</main>
<?php
include('footer.php')
?>
</body>
</html>
