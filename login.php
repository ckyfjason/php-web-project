<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<meta charset="utf-8">
<title>登入</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<?php
if(!empty($_SESSION['username']) ) {
    //header('Location: index.php');
    echo "<div class='form'>
              <h3>你已登入。</h3>
              <br/>點擊這裡<a href='index.php'>返回</a></div>";
    exit();
}    

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
        if (password_verify($password, $hashedPassword)) {
            $_SESSION['username'] = $username;
            echo "<div class='form'>
                <h3>登入成功。</h3>";               
            echo    "<h3>歡迎回來, ".$_SESSION['username']."</h3>";
            echo    "<br/>點擊這裡<a href='index.php'>返回</a></div>";
        } else {
            echo "<div class='form'>
                  <h3>用戶名稱或密碼不正確。</h3>
                  <br/>點擊這裡<a href='login.php'>重新登入</a></div>";
        }
    } else {
        echo "<div class='form'>
              <h3>用戶名稱不存在。</h3>
              <br/>點擊這裡<a href='login.php'>重新登入</a></div>";
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
<script>
  // 將 PHP 中的 $_SESSION['username'] 值賦予 JavaScript 變數
  let sessionStorage.getItem('display_name') = "<?php echo $_SESSION['username']; ?>";
  // 在這裡使用 username 變數做其他操作
</script>
</html>