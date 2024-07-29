<?php
    session_start();
    include("connection.php");
    include("functions.php");
    $user_data = check_login($con);
?>

<html>
<head><title>Ravenclaw</title></head>
<body>
<br>Hello, <?php echo $user_data['User_Name']; ?>! </br>
<br>Do you want to take <a href="taketest.php">the test</a>?</br>
</body>
</html>
