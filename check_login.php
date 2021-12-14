<?php
    session_start();
    //echo "Pas".getenv('MYAPP_CONFIG');
    include(getenv('MYAPP_CONFIG'));
?>
<html>
	<head>
		<link rel="stylesheet" href="styles/main.css" />
		<meta charset="utf-8" />
    <title></title>
	</head>
	<body>
        <?php
            // Прием данных
            $user = $_REQUEST["user"];
            $pwd = $_REQUEST["pwd"];  
            // Лезем в базу
            $hash = hash('sha256',$pwd);
            //Код уязвимый для Sql-injection
            $sql = "SELECT ID, username 
                FROM Users 
                WHERE Username=? AND PwdHash=?
            ";

            $conn = mysqli_connect($DB_URL,$DB_USER,$DB_PWD,$DB_NAME);
            //Передача параметров в sql выраженние
            //в sql выражение, что гарантирует защиту от sql инжекции
            $statement = mysqli_prepare($conn,$sql);
            mysqli_stmt_bind_param($statement,"ss",$user,$hash);
            mysqli_stmt_execute($statement);
            echo(mysqli_error($conn));
            $cursor = mysqli_stmt_get_result($statement);
            $result = mysqli_fetch_all($cursor);
            echo(mysqli_error($conn));
            //var_dump($result);
            mysqli_close($conn);   

            if (count($result) > 0) {
                echo ("<h2>Hello, $user!</h2>");
                $_SESSION["user"] = $user;
                echo('<meta http-equiv="refresh" content="2; URL=calc.php">');
            }
            else {
                echo ("BAD LOGIN!");
            }
           // $_SESSION['user'] = $user;
           // echo ($user);
        ?> 
	</body>
</html>