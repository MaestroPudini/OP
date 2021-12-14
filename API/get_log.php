<?php
    session_start();

    //Если нет жетона безопасности (в нашем случае это сессионая переменнная
    // с названием "user"), то не пускаем!
    if (!isset($_SESSION["user"])) {
        echo('<meta http-equiv="refresh" content="2; URL=../login.php">');
    die("Требутся Login!");
    }
    //$user = $_SESSION["user"];
    $user = $_SESSION["user"];
    //echo ($user);

    include(getenv('MYAPP_CONFIG'));

    //echo ($user);
            // Уязвимость для sql injection
            $sql = "SELECT ID, Number1, Number2, Result, UserID
                    FROM log
                    WHERE UserID='$user' 
            ";

            $conn = mysqli_connect($DB_URL,$DB_USER,$DB_PWD,$DB_NAME);
            //Передача параметров в sql выраженние
            //в sql выражение, что гарантирует защиту от sql инжекции
            $statement = mysqli_prepare($conn,$sql);
            mysqli_stmt_execute($statement);
            echo(mysqli_error($conn));
            $cursor = mysqli_stmt_get_result($statement);
            $result = mysqli_fetch_all($cursor);

            echo(mysqli_error($conn));
            //var_dump($result);
            mysqli_close($conn);   

            //var_dump($result);
            echo(json_encode($result));
        ?> 
