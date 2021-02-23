<nav class="navbar navbar-expand-lg">
    <div class="links container-md">
        <a class="brand navbar-brand" href="..">Coffezin</a>
        <a class="link btn btn-success" href="../<?php $_SERVER['SERVER_NAME'] ?>login">Войти</a>
        <a class="link btn btn-success" href="../<?php $_SERVER['SERVER_NAME'] ?>user">Пользователь</a>
        <a class="link btn btn-success" href="../<?php $_SERVER['SERVER_NAME'] ?>catalog">Каталог</a>
        <a class="link btn btn-success" href="../<?php $_SERVER['SERVER_NAME'] ?>basket">Корзина</a>
        <?php if (isset($_SESSION['cart_list'])): ?>
            <a class="username" style="color:white; margin-right: 400px; text-decoration: none" href="../<?php $_SERVER['SERVER_NAME'] ?>basket"><img src="https://img.icons8.com/ios-glyphs/30/000000/shopping-cart--v1.png"/> <?php echo count($_SESSION['cart_list']) ?></a>
        <?php endif; ?>
        <?php if (isset($_SESSION['wish_list'])): ?>
            <a class="username" style="color:white; margin-right: 300px; text-decoration: none"  href="../user/wish"><img src="https://img.icons8.com/ios-glyphs/30/000000/add-to-favorites.png"/> <?php echo count($_SESSION['wish_list']) ?></a>
        <?php endif; ?>
        <?php if (!isset($_SESSION['name'])): ?>
            <a class="username" href="login">Войти</a>
        <?php else: ?>
            <p class="username" href="login">Привет, <?php echo $_SESSION['name'] ?>!</p>
        <?php endif; ?>
    </div>
</nav>
<hr class="hr">