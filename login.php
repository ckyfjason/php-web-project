<!DOCTYPE html>
<html>
<meta charset="utf-8">
<title>Login</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<?php
$serverName = "streamweb-dbserver.database.windows.net"; // 資料庫伺服器名稱
$username = "ckyfjason"; // 資料庫使用者名稱
$password = "Database@password"; // 資料庫密碼
$dbname = "streamweb-formaldb"; // 資料庫名稱

$conn = sqlsrv_connect($serverName, array(
    "Database" => $dbname,
    "UID" => $username,
    "PWD" => $password
));

// 檢查連線是否成功
if ($conn) {
    echo "Connected successfully"; // 連線成功時顯示訊息
    // 在此可進行資料庫操作
} else {
    die(print_r(sqlsrv_errors(), true)); // 顯示連線錯誤訊息並停止程式執行
}

sqlsrv_close($conn);
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
