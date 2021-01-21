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
            width: 400px;
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
        .form {
            margin-top: 15px;
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
    <div class="container">
        <div class="links">
            <a class="btn" href="">Домой</a>
            <a class="btn" href="">Авторизоваться</a>
        </div>
        <div class="form">
            <div class="form-floating mb-3">
                <label for="floatingInput">Имя</label>
                <input type="email" class="form-control" id="floatingInput" placeholder="Имя" name="name">
            </div>
            <div class="form-floating mb-3">
                <label for="floatingPassword">Фамилия</label>
                <input type="password" class="form-control" id="floatingPassword" placeholder="Фамилия">
            </div>
            <div class="form-floating mb-3">
                <label for="floatingInput">Email</label>
                <input type="email" class="form-control" id="floatingInput" placeholder="Email-адрес">
            </div>
            <div class="form-floating mb-3">
                <label for="floatingPassword">Пароль</label>
                <input type="password" class="form-control" id="floatingPassword" placeholder="Пароль">
            </div>
        </div>
        <div class="checkbox">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                <label class="form-check-label" for="flexCheckChecked">
                    Принимаете правила лиц. соглашения
                </label>
            </div>
        </div>
        <div class="button">
            <button type="button" class="btn btn-success">Зарегистрироваться</button>
        </div>
    </div>
</body>
</html>