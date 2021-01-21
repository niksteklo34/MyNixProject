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

        /* Navbar */

        .links .link {
            font-size: 18px;
            margin: 0 0 10px 10px;
            background-color: green;
            color: white;
            text-decoration: none;
            padding: 5px;
        }
        .brand {
            color: white;
            font-size: 32px;
        }
        .navbar {
            background-color: olive;
        }
        hr {
            height: 5px;
            background-color: black;
            margin: 0;
        }

        /* Container */

        .container {
            margin-top: 75px;
            border: 5px black solid;
            border-radius: 15px;
            height: 575px;
            width: 400px;
            background-color: #808000;
        }

        /* Form */

        .form {
            margin-top: 35px;
        }
        .checkbox {
            margin-top: 30px;
            margin-bottom: 30px;
            text-align: center;
        }
        .button {
            text-align: center;
        }
        .btn-success {
            font-size: 18px;
            padding: 15px;
            color: white;
            background-color: green;
        }

    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg">
        <div class="links container-md">
            <a class="brand navbar-brand" href="#">Coffezin</a>
            <a class="link btn btn-success" href="">Домой</a>
            <a class="link btn btn-success" href="">Авторизрваться</a>
        </div>
    </nav>
    <hr>
    <div class="container">
        <div class="form">
            <div class="form-floating mb-3">
                <label for="name">Имя</label>
                <input type="text" class="form-control" id="name" placeholder="Имя" name="name">
            </div>
            <div class="form-floating mb-3">
                <label for="surname">Фамилия</label>
                <input type="text" class="form-control" id="surname" placeholder="Фамилия" name="surname">
            </div>
            <div class="form-floating mb-3">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" placeholder="Email-адрес" name="email">
            </div>
            <div class="form-floating mb-3">
                <label for="password">Пароль</label>
                <input type="password" class="form-control" id="password" placeholder="Пароль" name="password">
            </div>
        </div>
        <div class="checkbox">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="checkbox" id="flexCheckChecked">
                <label class="form-check-label" for="flexCheckChecked">
                    Принимаю <a href="#">правила лиц. соглашения</a>
                </label>
            </div>
        </div>
        <div class="button">
            <button type="submit" class="btn btn-success">Зарегистрироваться</button>
        </div>
    </div>
</body>
</html>