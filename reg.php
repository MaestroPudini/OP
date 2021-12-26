<?php
    session_start();
    include("C:\\AppParams/params.php");
    //include('var/www/html/params.php');
?>

<html>
	<head>
		<link rel="stylesheet" href="styles/main.css" />
		<meta charset="utf-8" />

	</head>
	<body>
		<h1>Registration</h1>
        <form method="post" action="save_user.php">
         <!--**** save_user.php - это адрес обработчика.  
        То есть, после нажатия на кнопку "Зарегистрироваться", 
        данные из полей  отправятся на страничку save_user.php 
        методом "post" ***** -->
<p>
            <label>Ваш логин:<br></label>
            <input name="user" type = "text" size="20" maxlength="20">
            <!--**** В текстовое поле (name="user" type="text")
            пользователь вводит свой логин ***** -->
</p>
<p>
            <label>Ваш пароль:<br></label>
            <input name="pwd" type="password" size="20" maxlength="20">    
            <!--**** В поле для паролей (name="pwd" type="password") 
            пользователь вводит свой пароль ***** --> 
</p>    
<p> 
            <input type="submit" name="submit" value="Зарегистрироваться">     
            <!--**** Кнопочка (type="submit") отправляет данные на страничку 
            save_user.php ***** --> 
</p>
        </form>
	</body>
</html>