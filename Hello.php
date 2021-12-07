<h1>Hello PHP!</h1>

<?php

$x = 15;
$y = 15;
$z = $x * $y;
echo "<h2>Результат вычислений: $z</h2>";

date_default_timezone_set("Europe/Moscow");
$now = date("H:i:s");
echo "<h3>Текущее время: $now</h3>";

?>