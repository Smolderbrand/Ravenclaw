<?php
    session_start();
    include("connection.php");
    include("functions.php");
?>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="petraven.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Ravenclaw - Sign Up</title>
</head>
<body>
<div class="container" style="min-width: 900px; max-width: 900px;">
    <div class="header clearfix">
        <nav>
            <div class="d-flex justify-content-between">
                <div class="p-2 flex-fill">
                    <ul class="nav nav-pills float-left">
                        <li class="nav-item">
                            <h3 class="text-muted">Ravenclaw - Quiz platform</h3>
                        </li>
                    </ul>
                </div>
                <ul class="nav nav-pills align-items-center">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Index</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="taketest.php">Take test</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="create.php">Create</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="signup.php">Sign Up</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    <div class="w-100 p-3" style="background-color: #eee;">
<?php
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
<style type="text/css">
    #text{
        height: 25px;
        border-radius: 5px;
        padding: 4px;
        border: solid thin #aaa;
        width: 45%;
    }
    #button{
        padding: 10px;
        width: 100px;
        color: white;
        background-color: lightblue;
    }
</style>
<form method="post">
    <div style="font-size:20px;">Sign Up</div><br>
    <input id="text" type="text" name="user_name"><br>
    <input id="text" type="password" name="password"><br><br>
    <input id="button" type="submit" value="Sign Up"><br><br>
</form>
</div>
<footer class="footer">
    <p>© Filip Chindea 2024</p>
</footer>
</div>
</body>
</html>
