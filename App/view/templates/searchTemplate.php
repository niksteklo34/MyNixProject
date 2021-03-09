<head>
  <link rel="stylesheet" href="/css/main.css">
</head>
<form class="inputSearch" method="post" action="search">
  <input type="text" name="title" required minlength="2">
  <input type="submit">
</form>
<div>
  <?php if (empty($tools['products'])): ?>
    <h1 class="emptyMess">Тут пока пусто</h1>
  <?php elseif (!empty($tools['products'])): ?>
    <?php foreach ($tools['products'] as $product): ?>
      <li class="productItem">
        <div class="product-item">
          <div class="row">
            <div class="productName col-lg-12 col-md-12 col-12"><?php echo $product->title?></div>
            <div class="productImg col-lg-3 col-md-3 col-3"><a href="<?php $_SERVER['SERVER_NAME'] ?>/product/<?php echo $product->id ?>"><img src="<?php echo $product->img?>" height="128px" class="img"></a></div>
            <div class="productDesc col-lg-9 col-md-9 col-9"><?php echo $product->description?></div>
            <div class="productPrice col-lg-3 col-md-3"><?php echo $product->price ?> грн</div>
          </div>
        </div>
      </li>
    <?php endforeach; ?>
  <?php endif; ?>
</div>
