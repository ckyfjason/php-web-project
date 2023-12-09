<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST["name"])) {
        echo "Hello world, " . $_POST["name"] . "!";
    } else {
        echo "Who are u?";
    }
    exit; // 確保只回傳 AJAX 請求的內容，避免多餘的 HTML
}
?>

<!-- HTML 部分 -->
<html>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.0/jquery.min.js"></script>
</head>
<body>
    <div id='test'></div>
    <script>
        $(document).ready(function() {
            $('#sayHelloBtn').click(function() {
                $.post('', {
                    name: "Jacky",
                    number: "1"
                }, function(response) {
                    $('#test').text(response); // 將伺服器端的回應設置為 #test 元素的文字內容
                });
            });
        });
    </script>
    <button id="sayHelloBtn">Say hello</button>
    <section id="message"></section>
</body>
</html>