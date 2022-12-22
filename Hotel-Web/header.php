<?php
session_start();
?>
<header style="width: 100%;">
    <div id="leftHeader" style="width: 30%">
        <a href="index.php">
            <img src="images/convenient and Cheap Hotel-logos.jpeg"
                 width="100%"
                 height="300"
                 alt="logo"/>
        </a>
    </div>
    <div id="midHeader" style="width: 70%">
        <form action="roomtype.php" method="get" id="searchBoxForm">
            <div class="check_in">
                <label for="checkin-date">Check-in Date: </label>
                <?php
                if (isset($_SESSION['checkin'])) {
                    echo "<input type='date' id='checkin-date' name='checkin' VALUE='".$_SESSION['checkin']."'  >";
                } else {
                    echo "<input type='date' id='checkin-date'>";
                }
                ?>
            </div>
            <div class="check_out">
                <label for="checkout-date">Check-out Date: </label>
                <?php
                if (isset($_SESSION['checkout'])) {
                    echo "<input type='date' id='checkin-date' name='checkout' VALUE='".$_SESSION['checkout']."'  >";
                } else {
                    echo "<input type='date' id='checkin-date'>";
                }

                ?>
            </div>
            <div>
                <button class="button-87" role="button"  type="submit">
                    FIND YOUR STAY
                </button>
            </div>
            <div class="about_us">
                <a href='aboutUs.php'> ABOUT US</a>
            </div>
            <div class="login_in">
                <a href='login.php'><img src='images/login.png' width='150'
                                         height='100' alt='Login_in'></a>
            </div><br>
            <br><div><p>Hotel: Call 917-666-6666 to book!</p></div><br><br>
        </form>
        <div class="dropdown">
            <?php
            include 'hotelDatabase.php';
            $sql = "select * from room_type ";
            $result = $mysqli->query($sql);
            $roomTypes = array();
            while($arr = $result->fetch_assoc()){
                array_unshift($roomTypes, $arr);
            }
            if (isset($_GET['roomtype'])) {
                $selected_roomType = $_GET['roomtype'];
            } else {
                $selected_roomType = 1;
            }
            ?>
            <select name="roomtype" id="Bed_type" form="searchBoxForm">
                <option>Select Your Bed Type</option>
                <?PHP

                    foreach ($roomTypes as $roomType) {
                        echo "<option value='".$roomType['room_type_id']."'>". $roomType['type'] . "</a></option>";
                    }
                ?>
            </select>
        </div>
    </div>
    </div>
</header>