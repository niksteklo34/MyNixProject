<head>
  <link rel="stylesheet" href="/css/catalog.css">
</head>
<div class="container">
  <h2>Списко желаний</h2>
  <hr>
  <?php if ($tools['countWish'] == 0): ?>
  <h1>В списке пусто!</h1>
  <?php else: ?>
  <?php foreach ($tools['wishList'] as $key => $value): ?>
    <ul>
      <li class="wishItem">
        <div class="product-item">
          <div class="row box align-items-center item">
            <div class="product-img col-lg-3 col-md-3 col-4"><img src="<?php echo $value->img ?>" alt="" width="64px"></div>
            <div class="product-name col-lg-9 col-md-9 col-8"><?php echo $value->title ?></div>
            <div class="price col-lg-10 col-md-10 col-10"><?php echo $value->price ?> грн</div>
            <form action="removeWish" method="post">
              <div class="price col-lg-2 col-md-2 col-2"><button type="submit" name="deleteProduct" value="<?php echo $value->id ?>">Удалить</button></div>
            </form>
          </div>
        </div>
      </li>
    </ul>
  <?php endforeach; ?>
  <?php endif; ?>
  <a href="../user" class="btnBack btn btn-success">Назад</a>
</div>