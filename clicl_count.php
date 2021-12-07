<?php
    session_start();
?>
<html>
	<head>
		<link rel="stylesheet" href="styles/main.css" />
		<meta charset="utf-8" />

	</head>
	<body>
        <a href="Index_.html">Портал</a> 
		<h1>Считаем щелчки</h1>
        <form>
            <button id="btn1">Щелкни меня!</button>
        </form>
        <?php
            $i = 0;
            //Вспосним переменную счетчика
            //(Если она существует):
            //if (isset( $_SESSION["clicks"]))
            //  $i = $_SESSION["clicks"];

            //$i += 1;
            //Запомним текущее значение счетчика шелчок сессии
            // в сессионой переменной clicks
            //$_SESSION["clicks"] = $i;
            
            if (isset($_COOKIE['clicks']))
                $i = $_COOKIE['clicks'];

            $i +=1;
            setcookie("clicks",$i, time()+30);

            echo("Всего щелчков: $i");
        ?>
	</body>
</html>