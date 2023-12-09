<?php
if (isset($_POST["name"])) {
    echo "Hello world, " . $_POST["name"] . "!";
    // 如果需要返回數據給前端，可以使用 JSON 格式，例如：
    // echo json_encode(["message" => "Hello world, " . $_POST["name"] . "!"]);
} else {
    // 如果沒有收到名字，你可以返回一個錯誤訊息或者其他內容
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
        function sayHello() {
            $.post('index2.php', {
                name: "Jacky",
                number: "1"
            }, function(response) {
                $('#test').text(response); // 將伺服器端的回應設置為 #test 元素的文字內容
            });
        };
    </script>
    <button id="sayHelloBtn" onclick="sayHello()">Say hello</button>
    <section id="message"></section>
</body>
</html>