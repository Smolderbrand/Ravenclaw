<?php
	session_start();
	include("connection.php");
	include("functions.php");
    $user_data = check_login($con);
?>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="petraven.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Ravenclaw - Delete question</title>
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
                        <a class="nav-link active" href="create.php">Delete</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="signup.php">Sign Up</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    <div class="w-100 p-3" style="background-color: #eee;">
<?php
	if ($_SERVER['REQUEST_METHOD'] == "POST")
	{
        $query = "delete from usersquestions where id=".$_POST['deleteindex'];
        mysqli_query($con, $query);
        echo "Record deleted successfully<br>\n";
	}
?>
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
<footer class="footer">
<p>© Filip Chindea 2024</p>
</footer>
</div>
</body>
</html>
