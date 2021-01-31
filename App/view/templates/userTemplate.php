<head>
    <link rel="stylesheet" href="css/product.css">
</head>
<body>
    <?php if (!isset($_SESSION['name'])): ?>
    <h1>Вы не авторизованы<br><a href="login">Войти</a></h1>
    <?php else: ?>
    <h1>Вы авторизованы как - <?php echo $_SESSION['name']?></h1>
    <?php endif; ?>
</body>
