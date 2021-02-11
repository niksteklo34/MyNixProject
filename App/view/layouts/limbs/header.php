<?php
use App\Session\Session;
$session = new Session();
?>

<nav class="navbar navbar-expand-lg">
    <div class="links container-md">
        <a class="brand navbar-brand" href="..">Coffezin</a>
        <a class="link btn btn-success" href="../<?php $_SERVER['SERVER_NAME'] ?>login">Войти</a>
        <a class="link btn btn-success" href="../<?php $_SERVER['SERVER_NAME'] ?>user">Пользователь</a>
        <a class="link btn btn-success" href="../<?php $_SERVER['SERVER_NAME'] ?>catalog">Каталог</a>
        <a class="link btn btn-success" href="../<?php $_SERVER['SERVER_NAME'] ?>basket">Корзина</a>
        <?php if (!isset($_SESSION['name'])): ?>
        <a class="username" href="login">Войти</a>
        <?php else: ?>
        <p class="username" href="login">Привет, <?php echo $session->get('name')?>!</p>
        <?php endif; ?>
    </div>
</nav>
<hr class="hr">