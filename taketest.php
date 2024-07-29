<?php
    session_start();
    include 'connection.php';
    include 'functions.php' ;
    $user_data = check_login($con);
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width-device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
    <title>Ravenclaw - The Knights Radiant Quiz</title>
</head>
<body>
<div class="margin-container">
</div>
<?php
    if ($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $sums = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
        $query = "select * from usersquestions where userid=".$user_data['ID'];
        $rows = mysqli_query($con, $query);
        $val = 0;
        while ($row = mysqli_fetch_assoc($rows)) {
            $val++;
            for ($i = 1; $i <= 10; $i++) {
                $sums[$i] += pow($row["Value".$i] - $_POST["slider".$val], 2);
            }
        }
        $result = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
        $ids = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10);
        $names = array("", "Windrunner", "Skybreaker", "Dustbringer", "Edgedancer", "Truthwatcher",
                   "Lightweaver", "Elsecaller", "Willshaper", "Stoneward", "Bondsmith");
        for ($i = 1; $i <= 10; $i++) {
            $result[$i] = ($val * 3333.33 - $sums[$i]) / ($val * 33.33);
            if ($result[$i] < 0)
                $result[$i] = 0;
        }
        for ($i = 1; $i < 10; $i++) {
            for ($j = $i + 1; $j <= 10; $j++) {
                if ($result[$i] < $result[$j]) {
                    $aux = $result[$i]; $result[$i] = $result[$j]; $result[$j] = $aux;
                    $aux = $ids[$i]; $ids[$i] = $ids[$j]; $ids[$j] = $aux;
                }
            }
        }
        echo "You are a ".$names[$ids[1]]."!<br>\n";
        echo "<table noborder width=\"550\">\n";
        for ($i = 1; $i <= 10; $i++) {
            $width = floor($result[$i] * 4);
            $complwidth = 400 - $width;
            echo "<tr><td colspan=\"2\" style=\"text-align: left;\">".$names[$ids[$i]]. "</td></tr>\n";
            echo "<tr><td style=\"text-align: left;\"><image src=\"assets\bar".$ids[$i].".png\" style=\"height: 30px; width: ".$width."px;\">";
            echo "<image src=\"assets\back.png\" style=\"height: 30px; width: ".$complwidth."px;\"></td>\n";
            echo "<td style=\"text-align: right\">".floor($result[$i])."%</td></tr>\n";
        }
        echo "</table>\n";
    } else {
        echo "<div class=\"margin-container\">\n";
        echo "THE OFFICIAL KNIGHTS RADIANT ORDER QUIZ\n";
        echo "</div>\n";
        echo "<div class=\"margin-container\">\n";
        echo "The fate of Roshar hangs in the balance, and once again radiant spren seek to bond with humankind. The Knights Radiant must stand again!<br>\n";
        echo "Move the sliders toward the attributes you most identify with, and the quiz will sort you into the Order of ".
             "Knights Radiant you would most likely belong to, along with the likelihoods of your belonging to the other ".
             "Orders. This quiz will only take a few minutes.<br>\n";
        echo "</div>\n";
        echo "<form method=\"post\">\n";
        $query = "select * from usersquestions where userid=" . $user_data['ID'];
        $rows = mysqli_query($con, $query);
        $val = 0;
        while ($row = mysqli_fetch_assoc($rows)) {
            $val++;
            echo "<div class=\"range-slider-container\">\n";
            echo "<table border=0 width=\"550\">\n";
            echo "<tr height=\"40\"><td>&nbsp;&nbsp;</td><td style=\"text-align: left;\" width=\"50%\">" . $row['LeftText'] . " <span id=\"colleft" . $val . "\" style=\"font-weight:bold;\">50%</span></td>\n";
            echo "<td style=\"text-align: right;\" width=\"50%\"><span id=\"colright" . $val . "\" style=\"font-weight:bold;\">50%</span> " . $row['RightText'] . "</td><td>&nbsp;&nbsp;</td></tr>\n";
            echo "<tr height=\"50\"><td colspan=\"4\"><input type=\"range\" name=\"slider" . $val . "\" min=\"0\" max=\"100\" onchange=\"changeValue(this.value," . $val . ")\"/></td></tr>\n";
            echo "</table>\n";
            echo "</div>\n";
        }
    }
?>
<div class="margin-container">
    <table noborder width="550"><tr><td style="width: 170px;"></td><td><input type="image" src="assets\say.png" style="height: 54px; width: auto;" alt="submit"></td><td style="width: 170px;"></td></tr></table>
</div>
</form>
</body>
</html>
