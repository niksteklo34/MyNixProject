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
        .links {
            margin: 15px;
        }
        .links a {
            background-color: green;
            color: white;
            text-decoration: none;
            padding: 5px;
        }
        .product-info {
            background-color: #808000;
            padding: 0 25px;
            border: 5px black solid;
            border-radius: 15px;
            margin: auto auto;
            height: 200px;
            width: 500px;
        }
        .product-img {
            background-color: white;
            border: black 5px solid;
            border-radius: 15px;
            height: 400px;
            width: 300px;
        }
        .price {
            text-align: center;
            color: crimson;
            font-size: 24px;
        }
        .product-name {
            text-align: center;
            padding: 15px;
            color: white;
            font-size: 20px;
            word-wrap: break-word
        }
        .product-desc {
            font-size: 18px;
            color: white;
            background-color: #808000;
            padding: 25px;
            margin-top: 40px;
            border: 5px black solid;
            border-radius: 15px;
        }
        .btn {
            padding: 10px;
            margin-left: 10px;
        }
        .price-bar {
            margin-top: 15px;
        }


    </style>
</head>
<body>
    <div class="container">
        <div class="links">
            <a class="btn btn-success" href="">Домой</a>
        </div>
        <div class="row">
            <div class="product-img col-lg-5 col-md-5">Много текста вместо картинки и тд</div>
            <div class="product-info col-lg-5 col-md-5">
                <div class="product-name">Кофемолка GORENJE SMK150E (CG9139-GS)</div>
                <div class="price-bar row align-items-center">
                    <div class="price col-lg-7 col-md-7">1199 грн</div>
                    <button class="btn btn-primary col-lg-4 col-md-4">В корзину</button>
                </div>
            </div>
            <div class="product-desc col-lg-12 col-md-12">Надежная кофемолка электрического типа. Модель POLARIS PCG 0815 станет отличной помощницей для хозяек. Устройство с легкостью справится с перемалыванием сахара в пудру, кофейных зерен, разнообразных круп и трав. Кофемолка обладает мощностью 150 Вт. Корпус и нож изделия выполнены из нержавеющей стали высокого качества.</div>
        </div>
    </div>
</body>
</html>