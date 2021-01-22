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
            margin: 0;ф
        }

        /* Container */

        li {
            list-style: none;
        }
        .container {
            margin-top: 75px;
        }
        .product-item {
            background-color: #808000;
            padding: 0 25px;
            margin-top: 25px;
            border: 5px black solid;
            border-radius: 15px;
        }
        .product-name {
            text-align: center;
            padding: 10px;
            color: white;
            font-size: 24px;
        }
        .product-img {
            background-color: white;
            border: black 5px solid;
            border-radius: 15px;
            height: 128px;
            width: 128px;
        }
        .product-desc {
            color: white;
        }
        .price {
            margin-top: 10px;
            color: crimson;
            font-size: 20px;
            margin-bottom: 10px;
        }
        .availability-yes {
            margin-top: 10px;
            color: green;
            font-size: 20px;
        }
        .availability-no {
            margin-top: 10px;
            color: black;
            font-size: 20px;
        }
        .btn {
            margin-top: 10px;
            margin-bottom: 10px;
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
<hr>
<div class="container">
    <ul>
        <?php echo $content ?>
    </ul>
</div>
</body>
</html>
