<!DOCTYPE html>
<html lang="en">
<head>
    <title>Welcome</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/index.css">
</head>
<body>
<?php
include ('header.php');
?>
<main>
    <div class="title_line">
        <div id="title">
            <p><h1>Welcome To Convenient And Cheap Hotel!</h1></p>
        </div>
    </div>
    <div class="outer-container">
        <div class="introduction_box">
            <section id="mainLeft">
                <div class="detail_intro_box">
                    <h1>ABOUT US</h1>
                    <div id="intro_line1">
                        <p>Are you looking for a <h1>CHEAP, CONVENIENT, NICE</h1> place to stay in NYC?</p>
                    </div>
                    <div id="intro_line2">
                        <p><h3>We devote ourselves for tourists like you to offer the best price in town!</h3></p>
                    </div>
                    <div id="intro_line3">
                        <p><h3>We are at the heart of Manhattan with the elite service!</h3></p>
                    </div>
                    <div id="intro_line4">
                        <p><h1>BOOK NOW AND ENJOY 20% OFF DISCOUNT!</h1></p>
                    </div>
                </div>
            </section>
        </div>
        <div class="category_container">
            <section id="mainRight">
                <div id="AttractionGrid">
                    <div><h3>ATTRACTION AROUND THE HOTEL</h3><img src="images/fifth-avenue.jpg"
                              width="400"
                              height="115"
                              alt="Fifth_Avenue"><h4>FIFTH AVENUE</h4></div>
                    <div><img src="images/TIMES-SQUARE.jpg"
                              width="400"
                              height="115"
                              alt="Times-Square"><h4>TIMES SQUARE</h4></div>
                    <div><img src="images/broadway.jpeg"
                              width="400"
                              height="115"
                              alt="Broadway"><h4>BROADWAY</h4></div>
                    <div><img src="images/rockefeller%20center.jpg"
                              width="400"
                              height="115"
                              alt="rockefeller_center"><h4>ROCKEFELLER CENTER</h4></div>
                </div>
            </section>
        </div>
    </div>
</main>
<?php
include ('footer.php');
?>
</body>
</html>