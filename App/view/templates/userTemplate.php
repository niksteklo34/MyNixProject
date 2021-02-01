<?php
$session = new \App\session\Session();
?>

<head>
    <link rel="stylesheet" href="css/product.css">
</head>
<body>
    <?php if (!isset($_SESSION['name'])): ?>
    <h1>Вы не авторизованы<br><a href="login">Войти</a></h1>
    <?php else: ?>
    <h1>Вы авторизованы как - <?php echo $session->get('name')?></h1>
        <h3 style="color: white;margin-top: 50px;margin-bottom: 50px">Имя: <?php echo $session->get('name')?><br>
            Фамилия: <?php echo $session->get('surname')?><br>
            Email: <?php echo $session->get('email')?></h3>
    <?php endif; ?>
    <?php if ($session->sessionExists()): ?>
        <form method="post">
            <button class="btn btn-success" name="logout">Выйти</button>
        </form>
    <?php endif; ?>
    <?php
    if (!empty($_POST)) {
        if (isset($_POST['logout'])) {
            echo "<br><h3>До свидания, {$session->get('name')}<br>Вы выйдете через 3 секунды...</h3>";
            $session->destroy();
            header('refresh: 3', "Location: login");
        }
    }
    ?>
</body>
