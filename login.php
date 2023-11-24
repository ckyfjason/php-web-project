<!DOCTYPE html>
<html>
<meta charset="utf-8">
<title>登入</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<?php
$serverName = "streamweb-dbserver.database.windows.net";
$username = "ckyfjason";
$password = "Database@password";
$dbname = "streamweb-formaldb";

$conn = sqlsrv_connect($serverName, array(
    "Database" => $dbname,
    "UID" => $username,
    "PWD" => $password
));

if (isset($_POST['username'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT password FROM users WHERE username=?";
    $params = array($username);

    $stmt = sqlsrv_query($conn, $query, $params);
    $row = sqlsrv_fetch_array($stmt);

    if ($row) {
        $hashedPassword = $row['password'];

        // 使用 password_verify 函數進行密碼驗證
        if (password_verify($password, $hashedPassword)) {
            $_SESSION['username'] = $username;
            header("refresh:2;url=https://streamweb.azurewebsites.net/main/lobby.html");
        } else {
            echo "<div class='form'>
                  <h3>用戶名稱或密碼不正確。</h3>
                  <br/>點擊這裡<a href='login.php'>登入</a></div>";
        }
    } else {
        echo "<div class='form'>
              <h3>用戶名稱不存在。</h3>
              <br/>點擊這裡<a href='login.php'>登入</a></div>";
    }
} else {
?>
<div class="form">
<h1>登入</h1>
<form action="" method="post" name="login">
<input type="text" name="username" placeholder="用戶名" required />
<input type="password" name="password" placeholder="密碼" required />
<br>
<input name="submit" type="submit" value="登入" />
</form>
<p>還未註冊？<a href='registration.php'>在這裡註冊</a></p>
</div>
<?php
}

sqlsrv_close($conn);
?>

</body>
</html>