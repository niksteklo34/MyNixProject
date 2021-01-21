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
        .overhead {
            height: 5px;
            background-color: black;
            margin: 0;
        }

        /* Container */

        .container {
            margin-top: 75px;
            background-color: #808000;
            padding: 0 25px;
            border: 5px black solid;
            border-radius: 15px;
        }

        /* Form */

        hr {
            background-color: black;
            height: 2px;
        }
        .header {
            text-align: center;
            margin-top: 10px;
        }
        .product-img {
            background-color: white;
            border: black 5px solid;
            border-radius: 15px;
            height: 128px;
            width: 128px;
        }
        .product-name {
            padding: 10px;
            color: white;
            font-size: 24px;
        }
        .price {
            text-align: center;
            margin-top: 10px;
            color: crimson;
            font-size: 24px;
            margin-bottom: 10px;
        }
        .between-items {
            background-color: white;
            height: 5px;
        }
        .btn {

            margin: 30px 10px 30px 0;
        }
        .btn-success {
            margin: 0;
        }

    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg">
        <div class="links container-md">
            <a class="brand navbar-brand" href="#">Coffezin</a>
            <a class="link btn btn-success" href="">Домой</a>
        </div>
    </nav>
    <hr class="overhead">
    <div class="container">
        <div class="header">
            <h2>Корзина</h2>
            <hr>
        </div>
        <ol>
            <li>
                <div class="product-item">
                    <div class="row align-items-center">
                        <div class="product-img col-lg-3 col-md-3 col-4">Много текста вместо картинки и тд</div>
                        <div class="product-name col-lg-9 col-md-9 col-8">Кофемолка POLARIS PCG 0815</div>
                        <div class="price col-lg-12 col-md-12 col-12">999 грн</div>
                    </div>
                </div>
            </li>
            <hr class="between-items">
            <li>
                <div class="product-item">
                    <div class="row align-items-center">
                        <div class="product-img col-lg-3 col-md-3 col-4">Много текста вместо картинки и тд</div>
                        <div class="product-name col-lg-9 col-md-9 col-8">Кофемолка GORENJE SMK150E (CG9139-GS)</div>
                        <div class="price col-lg-12 col-md-12 col-12">1199 грн</div>
                    </div>
                </div>
            </li>
        </ol>
        <div class="text-right">
                <button name="submit" type="submit" class="btn btn-primary">Оформить заказ</button>
        </div>
    </div>
</body>
</html>