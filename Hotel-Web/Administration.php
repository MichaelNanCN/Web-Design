<!DOCTYPE html>
<html lang="en">
<head>
    <title>Welcome</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/administration.css">
</head>
<body>
<?php
include ('header.php');
?>
<main>
    <div id = 'reserveBox'>
        <div>
            <?PHP
            include 'hotelDatabase.php';
            $sql = "select * from room_type";
            $result = $mysqli->query($sql);
            $roomTypes = array();
            while($arr = $result->fetch_assoc()){
                array_push($roomTypes, $arr);
            }
            echo "<div style='border: 1px solid black'>Date</div>";
            foreach ($roomTypes as $arr1){
                echo "<div style='border: 1px solid black;height: 30px'>".$arr1["type"]."</div>";
            }
            ?>
        </div>

            <table  border="1">
                <tr>
                    <?php


                    $arr222 = array();
                    $roomTypes12=array();
                    array_push($roomTypes12, "Monday");
                    array_push($roomTypes12, "Tuesday");
                    array_push($roomTypes12, "Wednesday");
                    array_push($roomTypes12, "Thursday");
                    array_push($roomTypes12, "Friday");
                    array_push($roomTypes12, "Saturday");
                    array_push($roomTypes12, "Sunday");
                    foreach ($roomTypes12 as $roomType) {
                        echo "<td  > " . $roomType . "</td>";

                    }
                    ?>
                </tr>





                <?php
                $result1123 = $mysqli->query("select * from room_type");
                while ($arr1 = $result1123->fetch_assoc()){
                        $roomTypes1 = array();
                        $roomTypes=array();
                        array_push($roomTypes1, "Monday");
                        array_push($roomTypes1, "Tuesday");
                        array_push($roomTypes1, "Wednesday");
                        array_push($roomTypes1, "Thursday");
                        array_push($roomTypes1, "Friday");
                        array_push($roomTypes1, "Saturday");
                        array_push($roomTypes1, "Sunday");
                        $as=array();
                        foreach ($roomTypes1 as $key => $value) {
                            $b=$key+1;
                            $be=$key+2;
                            $date1 = date("Y-m-d",strtotime("+".$b." day"));
                            $date = date("Y-m-d",strtotime("+".$be." day"));
                            $sql = "select * from book where room_type_id='".$arr1["room_type_id"]."' and check_in_date<='".$date1."' and check_out_date>='".$date."'";
                            $result = $mysqli->query($sql);
                            $a=0;
                            while($arr = $result->fetch_assoc()){
                                $a+=1;
                            }
                            $sql1="select * from room_type where room_type_id='".$arr1["room_type_id"]."'";
                            $result1 = $mysqli->query($sql1);
                            $row1 = $result1->fetch_assoc();
                            array_push($as, ($row1["num_available_room"]-$a));
                        }
                        array_push($arr222,$as);
                }

                ?>




                <?php
                include 'hotelDatabase.php';

                foreach ($arr222 as $key => $value) {
                    echo "<tr>";
                    foreach ($value as $t){
                        echo "<td  > " . $t . "</td>";
                    }
                    echo "<br>";
                    echo "</tr>";
                }
                ?>
                </table>
            </table>

    </div>
</main>
<?php
include ('footer.php');
?>
</body>
</html>
