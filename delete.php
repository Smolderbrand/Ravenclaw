<?php
	session_start();
	include("connection.php");
	include("functions.php");
    $user_data = check_login($con);
	if ($_SERVER['REQUEST_METHOD'] == "POST")
	{
        $query = "delete from usersquestions where id=".$_POST['deleteindex'];
        mysqli_query($con, $query);
        echo "Record deleted successfully<br>\n";
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
			<div style="font-size:20px;">Delete question</div><br>
            Question name: <select name="deleteindex" id="deleteindex">
                <?php
                    $query = "select * from usersquestions where userid=".$user_data['ID'];
                    $result = mysqli_query($con, $query);
                    while($row = mysqli_fetch_array($result)) {
                        echo "<option value=\"".$row['ID']."\">".$row['LeftText']." - ".$row['RightText']."</option>\n";
                    }
                ?>
            </select><br><br>
            <input class="button" type="submit" value="Delete">
		</form>
	</div>
</body>
</html>
