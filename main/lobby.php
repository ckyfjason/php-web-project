<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>直播平台</title>
    <link rel="icon" href="./images/logo.png">
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='styles/hub.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='styles/lobby.css'>
</head>
<body>
<?php
if(empty($_SESSION['username']) ) {
    echo "<div class='form' style='width: 300px; margin: 0 auto;'>
              <h3>你還沒登入。</h3>
              <br/>給我回去，<a href='../index.php'>返回</a></div>";
    exit();
}
?> 
    <header id="nav">
       <div class="nav--list">
            <a href="https://streamweb.azurewebsites.net">
                <h3 id="logo">
                    <img src="./images/logo.png" alt="Site Logo">
                    <span>直播平台</span>
                </h3>
            </a>
       </div>
       
        <div id="nav__links">
        <?php
            if(empty($_SESSION['username']) ) { echo//當用戶沒有登入時
                '<a class="hub__nav__link" href="../registration.php">
                Register
                </a>
                <a class="hub__nav__link" href="../login.php">
                Login
                </a>';
            } else { echo //當用已登入時
                '<a class="login__data"> Hi, '. $_SESSION['username'] .'!</a>
                <a class="hub__nav__link" href="./logout.php">
                Logout
                </a>';
            }
            ?>
             <a class="nav__link" id="create__room__btn" href="/">
                 已在創建
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#ede0e0" viewBox="0 0 24 24"><path d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm6 13h-5v5h-2v-5h-5v-2h5v-5h2v5h5v2z"/></svg>
             </a>
        </div>
        
    </header>
    
    <main id="room__lobby__container">
        
        <div id="form__container">
             <div id="form__container__header">
                 <p>👋 創建 / 加入房間</p>
             </div>
 
            <form id="lobby__form">
 
                <div class="form__field__wrapper">
                    <label>暱稱</label>
                    <div name="name">TEST</div>
                    <!--<input type="text" name="name" required placeholder="在此輸入你的暱稱..." />-->
                </div>
 
                <div class="form__field__wrapper">
                    <label>房間編號</label>
                    <input type="text" name="room"  placeholder="在此輸入房間編號..." />
                </div>

                <!--<div class="form__field__wrapper">
                    <label>房間密碼</label>
                    <input type="text" name="password"  placeholder="在此輸入房間編號..." />
                </div>-->
 
                 <div class="form__field__wrapper">
                     <button type="submit">創建 / 加入
                         <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M13.025 1l-2.847 2.828 6.176 6.176h-16.354v3.992h16.354l-6.176 6.176 2.847 2.828 10.975-11z"/></svg>
                    </button>
                 </div>
            </form>
        </div>
     </main>
    
</body>
<script type="text/javascript" src="js/lobby.js"></script>

<?php
// 如果 $_SESSION['username'] 已經設定
if(isset($_SESSION['username'])) {
    echo '<script>';
    echo 'sessionStorage.setItem("username", "' . $_SESSION['username'] . '");';
    echo '</script>';
}
?>

</html>