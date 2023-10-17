<?php
$servername = "localhost";
$username = "capsule";
$password = "capsule";
$dbname = "capsule";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = $_POST["login"];
    $password = $_POST["password"];

    // Уязвимость: SQL Injection (без защиты)
    $sql = "SELECT * FROM users WHERE login = '$login' AND password = '$password'";

    // Вывести SQL-запрос на страницу
    echo "SQL Query: " . $sql . "<br>";

    $result = $conn->query($sql);

    if ($result === false) {
        // Вывести сообщение об ошибке
        echo "Error: " . $conn->error . "<br>";
    } else {
        if ($result->num_rows > 0) {
            echo "Login successful!<br>";

            // Вывести результат запроса
            while ($row = $result->fetch_assoc()) {
                echo "User: " . $row["login"] . "<br>";
            }
        } else {
            echo "Login failed. Please check your login and password.";
        }
    }

    $conn->close();
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>SQL-LAB BY K3RNEL-DEV</title>
    <style>
        body {
            background-color: #000; /* Черный фон */
            color: #fff; /* Белый текст */
            font-family: Arial, sans-serif; /* Красивый шрифт */
            text-align: center;
            animation: blinker 2s linear infinite; /* Медленное мерцание текста */
        }

        @keyframes blinker {
            50% {
                color: #00cc00; /* Зеленый цвет при мерцании */
            }
        }

        .container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh; /* Чтобы форма была посередине экрана */
        }

        form {
            background-color: #333; /* Цвет фона формы */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5); /* Тень формы */
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            background-color: #555; /* Цвет фона полей ввода */
            border: none;
            border-radius: 5px;
            color: #fff; /* Белый текст в полях ввода */
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #00cc00; /* Зеленая кнопка */
            border: none;
            border-radius: 5px;
            color: #fff; /* Белый текст на кнопке */
            cursor: pointer;
            transition: background-color 0.5s; /* Плавное изменение цвета при наведении */
        }

        input[type="submit"]:hover {
            background-color: #009900; /* Изменение цвета при наведении */
        }
    </style>
</head>
<body>
    <div>
       <img src="https://i.pinimg.com/originals/23/f6/f0/23f6f0a9b2aa76706f613552b0f8e2d7.png" width='250px' height='100px' style="margin: 1px">
    </div>
    <div class="container">
        <h1>SQL-LAB BY K3RNEL-DEV</h1>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            Login: <input type="text" name="login"><br>
            Password: <input type="password" name="password"><br>
            <input type="submit" value="Login">
        </form>
    </div>
</body>
</html>
