<?php
if (isset($_POST['update_bgm']) && $_POST['update_bgm'] == 1) {
    // 建立與資料庫的連線 $conn
    
    // 假設這是你的 SQL 查詢
    $query = "UPDATE rooms SET bgm=? WHERE roomid=?";
    $params = array(1, 1); // 替換為你的參數
    
    $stmt = sqlsrv_query($conn, $query, $params);
    if ($stmt) {
        echo "更新成功";
    } else {
        echo "更新失敗";
    }
}
?>