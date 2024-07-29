<?php
	session_start();
	include("connection.php");
	include("functions.php");
	if ($_SERVER['REQUEST_METHOD'] == "POST")
	{
		$user_name = $_POST['user_name'];
		if (!empty($user_name))
		{
            $selquery = "select * from users where user_name='$user_name'";
            $res = mysqli_query($con, $selquery);
            $user_data  = mysqli_fetch_assoc($res);
			$query = "delete from users where user_name = '$user_name'";
			mysqli_query($con, $query);
            $query = "delete from usersquestions where userid=".$user_data['ID'];
            mysqli_query($con, $query);
			echo "User ".$user_data['User_Name']." deleted";
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
	<title>Login</title>
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
			<div style="font-size:20px;">Delete user</div><br>
			<input id="text" type="text" name="user_name"><br>
			<input id="button" type="submit" value="Delete"><br><br>
			<a href="signup.php">Back</a><br>
		</form>
	</div>
</body>
</html>
