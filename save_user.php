<?php
    if (isset($_POST['user']))  { $user = $_POST['user']; if ($user == '') {unset($user);} }
    //заносим введенный пользователем логин в переменную $user, если он пустой, 
    //то уничтожаем переменную
    if (isset($_POST['pwd']))  { $pwd = $_POST['pwd']; if ($pwd == '') { unset($pwd);} }
    //заносим введенный пользователем пароль в переменную $pwd, если он пустой, 
    //то уничтожаем переменную
if (empty($user) or empty($pwd))
    {
        exit ("Вы ввели не всю информацию!");
    }
//если логин и пароль введены, то обрабатываем их, чтобы теги и скрипты не работали,
// мало ли что люди могут ввести
    $user = stripslashes($user);
    $user = htmlspecialchars($user);
    $pwd = stripslashes($pwd);
    $pwd = htmlspecialchars($pwd);
//удаляем лишние пробелы
    $user = trim($user);
    $pwd = trim($pwd);

    //include("C:\\AppParams/params.php");
    //include('var/www/html/params.php');
    include(getenv('MYAPP_CONFIG'));
    //include ("./params.php");

    $hash = hash('sha256',$pwd);

    $sql = "SELECT id 
            FROM users 
            WHERE username='$user'
            ";
    $sql1 = "INSERT INTO users (username,pwdhash)
             VALUES ('$user', '$hash')
             ";
    
    //$conn = mysqli_connect("localhost", "root", "", "calc");
    $conn = mysqli_connect($DB_URL,$DB_USER,$DB_PWD,$DB_NAME);
    $cursor = mysqli_query($conn,$sql);
    $result = mysqli_fetch_all($cursor);

// проверка на существование пользователя с таким же логином
if (!empty($result['id'])) 
{
    exit ("Веденый логин уже есть!");
}

    //$conn1 = mysqli_connect("localhost", "root", "", "calc");
    $conn1 = mysqli_connect($DB_URL,$DB_USER,$DB_PWD,$DB_NAME);
    $result1 = mysqli_query($conn1,$sql1);

// если такого нет, то сохраняем данные
if ($result1=='TRUE')
{
    echo "Вы успешно зарегистрированы! <a href='index_.html'>Оглавление</a>";
}
else 
{
    echo "Ошибка в регистрации!";
}

?>