<!doctype html>
<html lang="en">
<head>
    <title>Economy House - Confirmation</title>

    <link rel="stylesheet" type="text/css" href="css/main.css"/>
    <link rel="stylesheet" type="text/css" href="css/confirmation.css"/>
    <link rel="stylesheet" href="css/index.css">
</head>
<body>
<?php
include('header.php');

?>

<main>
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
                              <div><p>This 220-square-foot room offers an amazing view of midtown and comes with complementary breakfast and enjoy your deluxe journey with your one deluxe Queen bed.</p>
                               <h1>total: $" .($diff*350)."</h1></div>";

        }elseif ($_GET["id"] == 4) {
            echo "<div class='each_book'><img src='images/Deluxe_King.png' width='400'
                              height='200'
                              alt='Deluxe King'><h4>Deluxe King</h4></div>
                              <div><p>This 220-square-foot room offers an amazing view of midtown and comes with complementary breakfast and enjoy your deluxe journey with your one deluxe King bed.</p>
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
                              alt='Suite Queen'><h4>Suite Queen</h4></div><div><p>Take in sweeping views of the Empire State Building and Midtown from this 195-square-foot room with Two queen bed and featuring a plush sitting area, modern decor and refrigerator.</p>
                              <h1>total: $" .($diff*250)."</h1></div>";
        }
        ?></div>
    <?php
    include 'hotelDatabase.php';
    $sql = "select * from book where room_type_id='".$_GET['id']."' and 'check_in_date'>='".$_GET['checkin']."' and 'check_out_date'>='".$_GET['checkout']."'";
    $result = $mysqli->query($sql);
    $a=0;
    while($arr = $result->fetch_assoc()){
        $a+=1;
    }
    $sql1="select * from room_type where room_type_id='".$_GET['id']."'";
    $result1 = $mysqli->query($sql1);
    $row1 = $result1->fetch_assoc();
    if ($row1["num_available_room"]<=$a){
        echo "<h1>Sorry, all the rooms have been reserved. Please select a new room</h1>
            <p><a href='index.php' class='commandButton'>Return to Home</a></p>";
    }else{
        $number=(int)$row1["num_available_room"];
        $a=$number;
        $sql1 = "insert into  book(check_in_date,check_out_date,room_type_id) values('".$_GET['checkin']."','".$_GET['checkout']."','".$_GET["id"]."')";
        $result = $mysqli->query($sql1);
        echo "<h1>Thank you for your order.  Have a great day!</h1>
            <p><a href='index.php' class='commandButton'>Return to Home</a></p>";
    }
    ?>
</main>
</body>
</html>
