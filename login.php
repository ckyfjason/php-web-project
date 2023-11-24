<?php
$con = sqlsrv_connect("streamweb-dbserver.database.windows.net","ckyfjason","Database@password","streamweb-formaldb");
?>
<!DOCTYPE html>
<html>
<meta charset="utf-8">
<title>Login</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<?php
if (!$con) {
    die("Connection failed");
} else {
    echo "Connected successfully"; // 連線成功時顯示訊息
}
?>
<div class="form">
<h1>Log In</h1>
<form action="" method="post" name="login">
<input type="text" name="username" placeholder="Username" required />
<input type="password" name="password" placeholder="Password" required />
<br>
<input name="submit" type="submit" value="Login" />
</form>
<p>Not registered yet? <a href='registration.php'>Register Here</a></p>
</div>


</body>
</html>
