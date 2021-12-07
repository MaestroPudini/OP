<?php
    session_start();
    //Если нет жетона безопасности (в нашем случае это сессионая переменнная
    // с названием "user"), то не пускаем!
    if (!isset($_SESSION["user"])) {
        echo('<meta http-equiv="refresh" content="2; URL=login.php">');
        die("Требутся Login!");
    }
?>

<html>
    <head>
        
        <!-- коментарий html-->
        <meta charset="utf-8" />

        <style>

        input, button {
            width: 140px;
            margin: 5px;
            text-align: center;
        }

        button {
            width: 63px;
        }

        .pressed {
            background-color: pink;
        }
        .pressed1 {
            background-color: lightskyblue;
        }
        </style>
        <script>
            function plus() {
                var x = document.getElementById("x").value
                var y = document.getElementById("y").value
                //var z = parseInt (x) + parseInt (y);

                var url = "API/plus.php?x=" + x + "&y=" + y;
                var xhr = new XMLHttpRequest();
                xhr.open("GET",url,false);
                xhr.send();
                var z = xhr.responseText;

                document.getElementById("z").value = z;   
                document.getElementById("btn1").className = "pressed";
                document.getElementById("btn2").className = "";
            }
            function minus() {
                var x = document.getElementById("x").value
                var y = document.getElementById("y").value
          
                var url = "API/minus.php?x=" + x + "&y=" + y;
                var xhr = new XMLHttpRequest();
                xhr.open("GET",url,false);
                xhr.send();
                var z = xhr.responseText;

                document.getElementById("z").value = z;   
                document.getElementById("btn2").className = "pressed1";
                document.getElementById("btn1").className = "";
            }
        </script>
    </head>
    <body>
        <a href="Index_.html">Портал</a> 
        <h1>Калькулятор</h1>
        <input id="x"/> <br />
        <input id="y"/> <br />
        <button id="btn1" onclick="plus();">+</button>
        <button id="btn2" onclick="minus();">-</button> <br />
        <input id="z"/> 
    </body> 
</html
>   