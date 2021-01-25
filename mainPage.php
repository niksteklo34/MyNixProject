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
            width: 800px;
            background-color: #808000;
        }
        .text {
            margin-top: 75px;
            color: white;
        }
        .form-find {
            max-width: 300px;
            margin: 25px auto 25px;
        }
        .catalog {
            margin-top: 30px;
        }

        /* Footer */

        .footer {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 60px;
            line-height: 60%;
            background-color: olive;
        }
        .over-footer {
            margin: 0;
            background-color: black;
            height: 5px;
        }
        .footer-text {
            margin: 20px 20px 0 0;
            font-size: 20px;
            font-weight: 400;
            color: white;
        }

    </style>
</head>
<body>
    <?php require_once "layouts/header.php" ?>
    <div class="container">
        <div class="mt-4">
            <div class="text text-center">
                <H1>Добро пожаловать на наш сайт!</H1><br><br>
                <form class="text-center" action="" method="post">
                    <div class="test form-floating mb-3">
                        <label for="search">Я ищу...</label>
                        <input type="text" class="form-find form-control" id="search" placeholder="Название товара..." name="search">
                    </div>
                    <button type="button" class="btn btn-primary">Искать</button><br><br>
                </form>
                <button type="button" class="catalog btn btn-primary"><h3>Посетить каталог товаров</h3></button>
            </div>
        </div>
    </div>
    <?php require_once "layouts/footer.php" ?>
</body>
</html>