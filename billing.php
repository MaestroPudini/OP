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
            function getLog() {

                var url = "API/get_log.php";
                var xhr = new XMLHttpRequest();
                xhr.open("GET",url,false);
                xhr.send();
                var text = xhr.responseText;
                var results = JSON.parse(text);
                console.log(results);
                var out = "";
                var counter = 0;
                //Цикл по массиву
                for(var i=0; i < results.length; i++){
                    var calc = results[i];
                    console.log(calc);
                    var x = calc[1];
                    var y = calc[2];
                    var result = calc[3];
                    var user = calc[4];
                    out += "X:" + x + " Y:" + y + " Результат:" + result + "    Пользователь: " + user + "<br />";
                    counter += 1;
                }
                document.getElementById("display").innerHTML = out;   
                document.getElementById("amount").innerText = 
                "Гони, " + counter + "$";   
            }

        </script>
    </head>
    <body onload="getLog();">
        <a href="index_.html">Портал</a> 
        <h1>Ваши вычисления</h1>
        <div id="display"> </div>
        <h2 id="amount"> </h2>
    </body> 
</html
>   