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
    <title>Ravenclaw - Modify question</title>
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
                        <a class="nav-link active" href="create.php">Modify</a>
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
        $query = "update usersquestions set lefttext = '".$_POST['left']."', righttext = '".$_POST['right']. "', questiontype = ".
                $_POST['qtype'].", value1 = ".$_POST['value1'].", value2 = ".$_POST['value2'].", value3 = ".$_POST['value3'].
                ", value4 = ".$_POST['value4'].", value5 = ".$_POST['value5'].", value6 = ".$_POST['value6'].
                ", value7 = ".$_POST['value7'].", value8 = ".$_POST['value8'].", value9 = ".$_POST['value9'].
                ", value10 = ".$_POST['value10']." where id=".$_POST['modifyindex'];
        mysqli_query($con, $query);
        echo "Record updated successfully<br>\n";
	}
?>
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
    <footer class="footer">
        <p>© Filip Chindea 2024</p>
    </footer>
</div>
</body>
</html>
