<?php
	session_start();
	include("connection.php");
	include("functions.php");
    $user_data = check_login($con);
	if ($_SERVER['REQUEST_METHOD'] == "POST")
	{
        $query = "update usersquestions set lefttext = '".$_POST['left']."', righttext = '".$_POST['right']. "', questiontype = ".
                $_POST['qtype'].", value1 = ".$_POST['value1'].", value2 = ".$_POST['value2'].", value3 = ".$_POST['value3'].
                ", value4 = ".$_POST['value4'].", value5 = ".$_POST['value5'].", value6 = ".$_POST['value6'].
                ", value7 = ".$_POST['value7'].", value8 = ".$_POST['value8'].", value9 = ".$_POST['value9'].
                ", value10 = ".$_POST['value10']." where id=".$_POST['modifyindex'];
        mysqli_query($con, $query);
        echo "Record updated successfully<br>\n";
        echo "<a href=\"index.php\">Return to index</a>";
        die;
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Delete question</title>
</head>
<body>
	<style type="text/css">
	#text{
		height: 25px;
		border-radius: 5px;
		padding: 4px;
		border: solid thin #aaa;
		width: 95%;
	}
	#button{
		padding: 10px;
		width: 100px;
		color: white;
		background-color: lightblue;
	}
	#box{
		background-color: #ccc;
		margin: auto;
		width: 500px;
		padding: 20px;
	}
	</style>
	<div id="box">
		<form method="post">
			<div style="font-size:20px;">Modify question</div><br>
            Question to modify: <select name="modifyindex" id="modifyindex">
                <?php
                    $query = "select * from usersquestions where userid=".$user_data['ID'];
                    $result = mysqli_query($con, $query);
                    while($row = mysqli_fetch_array($result)) {
                        echo "<option value=\"".$row['ID']."\">".$row['LeftText']." - ".$row['RightText']."</option>\n";
                    }
                ?>
            </select><br><br>
            <div style="font-size:20px;">New values</div><br>
            Left text: <input class="text" type="text" name="left"><br>
            Right text: <input class="text" type="text" name="right"><br><br>
            Question type: <select name="qtype" id="qtype">
                <option value="1">Normal</option>
                <option value="2">Total time</option>
                <option value="3">Total deltas</option>
            </select><br><br>
            Windrunner value: <input class="text" type="number" name="value1"><br>
            Skybreaker value: <input class="text" type="number" name="value2"><br>
            Dustbringer value: <input class="text" type="number" name="value3"><br>
            Edgedancer value: <input class="text" type="number" name="value4"><br>
            Truthwatcher value: <input class="text" type="number" name="value5"><br>
            Lightweaver value: <input class="text" type="number" name="value6"><br>
            Elsecaller value: <input class="text" type="number" name="value7"><br>
            Willshaper value: <input class="text" type="number" name="value8"><br>
            Stoneward value: <input class="text" type="number" name="value9"><br>
            Bondsmith value: <input class="text" type="number" name="value10"><br><br>
            <input class="button" type="submit" value="Modify">
		</form>
	</div>
</body>
</html>
