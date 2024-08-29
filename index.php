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
    <title>Ravenclaw - Main Page</title>
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
                        <a class="nav-link active" href="#">Index</a>
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
                        <a class="nav-link" href="signup.php">Sign Up</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    <div class="w-100 p-3" style="background-color: #eee;">
    <h5>Hello, <?php echo $user_data['User_Name']; ?>! </h5>
    <h5>Do you want to take <a href="taketest.php">the test</a>?</h5>
    <h5>Modify your questions: <a href="create.php">create</a> or <a href="modify.php">modify</a> or <a href="delete.php">delete</a>.</h5>
    </div>
    <footer class="footer">
        <p>© Filip Chindea 2024</p>
    </footer>
</div>
</body>
</html>
