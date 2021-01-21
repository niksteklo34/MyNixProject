<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <title>Coffezin</title>
    <style>
        .container {
            margin-top: 200px;
            border: 5px black solid;
            border-radius: 15px;
            height: 575px;
            width: 800px;
            background-color: #808000;
        }
        .links {
            margin-top: 15px;
        }
        .links a {
            background-color: green;
            color: white;
            text-decoration: none;
            padding: 5px;
        }
        .text {
            margin-top: 75px;
            color: white;
        }
        .catalog {
            margin-top: 30px;
        }
        .form-find {
            max-width: 300px;
            margin: 25px auto 25px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="mt-4">
            <div class="links text-left">
                <a class="btn" href="">Войти</a>&nbsp&nbsp
                <a class="btn" href="">Зарегистрироваться</a><br>
            </div>
            <div class="text text-center">
                <H1>Добро пожаловать на наш сайт!</H1><br><br>
                <form class="text-center" action="" method="post">
                    <div class="test form-floating mb-3">
                        <label for="floatingInput">Я ищу...</label>
                        <input type="email" class="form-find form-control" id="floatingInput" placeholder="Название товара..." name="name">
                    </div>
                    <button type="button" class="btn btn-primary">Искать</button><br><br>
                </form>
                <button type="button" class="catalog btn btn-primary"><h3>Посетить каталог товаров</h3></button>
            </div>
        </div>
    </div>
</body>
</html>