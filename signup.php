<?php
	session_start();
	include("connection.php");
	include("functions.php");
	if ($_SERVER['REQUEST_METHOD'] == "POST")
	{
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];
		if (!empty($user_name) && !empty($password))
		{
			$pass = md5($password);
			$query = "insert into users (user_level, user_name, password) values (1, '$user_name', '$pass')";
			mysqli_query($con, $query);
            $getuser = "select * from users where user_name = '$user_name'";
            $resuser = mysqli_query($con, $getuser);
            $rowuser = mysqli_fetch_assoc($resuser);
            $query = "select * from defaultquestions";
            $res = mysqli_query($con, $query);
            while ($row = mysqli_fetch_assoc($res)) {
                $insertquery = "insert into usersquestions (userid,lefttext,righttext,questiontype,value1,value2,value3,value4,value5," .
                                "value6,value7,value8,value9,value10) values (".$rowuser['ID'].",'".$row['LeftText']."','".$row['RightText'] .
                                "',".$row['QuestionType'].",".$row['Value1'].",".$row['Value2'].",".$row['Value3'].",".$row['Value4']."," .
                                $row['Value5'].",".$row['Value6'].",".$row['Value7'].",".$row['Value8'].",".$row['Value9']."," .
                                $row['Value10'].")";
                mysqli_query($con, $insertquery);
            }
			header("Location: login.php");
			die;
		}
		else
		{
			echo "Please enter some data.";
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Sign up</title>
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
		width: 300px;
		padding: 20px;
	}
	</style>
	<div id="box">
		<form method="post">
			<div style="font-size:20px;">Sign up</div><br>
			<input id="text" type="text" name="user_name"><br>
			<input id="text" type="password" name="password"><br><br>
			<input id="button" type="submit" value="Signup"><br><br>
			<a href="login.php">Click to login</a><br>
		</form>
	</div>
</body>
</html>
