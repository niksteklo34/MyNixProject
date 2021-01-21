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
        .header {
            text-align: center;
            margin-top: 10px;
        }
        hr {
            background-color: black;
            height: 2px;
        }
        .between-items {
            background-color: white;
            height: 5px;
        }
        li {
            list-style: none;

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
        .container {
            background-color: #808000;
            padding: 0 25px;
            margin-top: 20px;
            border: 5px black solid;
            border-radius: 15px;
        }
        .product-img {
            background-color: white;
            border: black 5px solid;
            border-radius: 15px;
            height: 128px;
            width: 128px;
        }
        .price {
            text-align: center;
            margin-top: 10px;
            color: crimson;
            font-size: 24px;
            margin-bottom: 10px;
        }
        .product-name {
            padding: 10px;
            color: white;
            font-size: 24px;
        }
        .btn {
            margin-top: 20px;
            margin-bottom: 20px;
        }
        .btn-success {
            margin: 0;
        }

    </style>
</head>
<body>
    <div class="container">
        <div class="links">
            <a class="btn btn-success" href="">Домой</a>
        </div>
        <div class="header">
            <h2>Корзина</h2>
            <hr>
        </div>
        <ol>
            <li>
                <div class="product-item">
                    <div class="row align-items-center">
                        <div class="product-img col-lg-3 col-md-3">Много текста вместо картинки и тд</div>
                        <div class="product-name col-lg-9 col-md-9">Кофемолка POLARIS PCG 0815</div>
                        <div class="price col-lg-12 col-md-12">999 грн</div>
                    </div>
                </div>
            </li>
            <hr class="between-items">
            <li>
                <div class="product-item">
                    <div class="row align-items-center">
                        <div class="product-img col-lg-3 col-md-3">Много текста вместо картинки и тд</div>
                        <div class="product-name col-lg-9 col-md-9">Кофемолка GORENJE SMK150E (CG9139-GS)</div>
                        <div class="price col-lg-12 col-md-12">1199 грн</div>
                    </div>
                </div>
            </li>
        </ol>
        <div class="text-right">
            <button type="button" class="btn btn-primary">Оформить заказ</button>
        </div>
    </div>
</body>
</html>