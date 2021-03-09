<head>
  <link rel="stylesheet" href="<?php echo 'css/user.css'?>">
</head>
<div class="container">
  <?php if (!$tools['session']->keyExists('name')): ?>
  <h1>Вы не авторизованы<br><a href="login">Войти</a></h1>
  <?php else: ?>
  <h1>Вы авторизованы как - <?php echo $tools['session']->get('name')?></h1>
    <h3 class="userName">Имя: <?php echo $tools['session']->get('name')?><br>
      Фамилия: <?php echo $tools['session']->get('surname')?><br>
      Email: <?php echo $tools['session']->get('email')?></h3>
    <form action="user/wish" method="post">
      <button class="infoBtn btn btn-success" name="logout">Избранные</button>
    </form>
    <form action="user/shopList" method="post">
      <button class="infoBtn btn btn-success" name="logout">Список покупок</button>
    </form>
    <form action="user/logout" method="post">
      <button class="infoBtn btn btn-success" name="logout">Выйти</button>
    </form>
  <?php endif; ?>
</div>
