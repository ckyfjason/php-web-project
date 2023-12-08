<html>
    <head>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.0/jquery.min.js"></script>
    </head>
    <body>
      <script>
        function sayHello(){
            $.post('hello.php',{
                name: "Jacky",
                number: "1"
            }, function(txt){
                $('#message').html(txt);
            });
        };
      </script>
      <button id="sayHelloBtn" onclick="sayHello()">say hello</button>
      <section id="message"></section>
    </body>
</html>