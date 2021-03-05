<head>
  <link rel="stylesheet" href="/css/main.css">
</head>
<div class="container">
  <div class="mt-4">
    <div class="text text-center">
      <?php if ($tools['session']->sessionExists() && $tools['session']->keyExists('name')): ?>
        <H1 class="loginedMess">Добро пожаловать, <?php echo $tools['session']->get('name') ?>!</H1>
      <?php else: ?>
        <H1 class="unloginedMess">Добро пожаловать, гость!</H1>
      <?php endif; ?>
      <a href="search" class="catalog btn btn-primary col-lg-4 col-md-4 col-4"><h3>Поиск</h3></a>
    </div>
  </div>
</div>