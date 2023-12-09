<?php
session_start();
$serverName = "streamweb-dbserver.database.windows.net";
$username = "ckyfjason";
$password = "Database@password";
$dbname = "streamweb-formaldb";

$conn = sqlsrv_connect($serverName, array(
    "Database" => $dbname,
    "UID" => $username,
    "PWD" => $password
));


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST["bgm"])) {
        $query2 = "UPDATE rooms SET bgm=? WHERE roomid=?";
        $params = array($_POST["bgm"], 1);

        $stmt = sqlsrv_query($conn, $query2, $params);*/
        echo "111";
    } else {}
    exit; // 確保只回傳 AJAX 請求的內容，避免多餘的 HTML
}
?>