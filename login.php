<!DOCTYPE html>
<html>
<meta charset="utf-8">
<title>Login</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<?php
$con = sqlsrv_connect("streamweb-dbserver.database.windows.net","ckyfjason","Database@password","streamweb-formaldb");
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
} else {
    echo "Connected successfully"; // 連線成功時顯示訊息
    // 可以在這裡執行你的資料庫操作
    // 例如查詢資料、新增資料等
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
