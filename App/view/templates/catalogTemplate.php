<head>
  <link rel="stylesheet" href="/css/catalog.css">
  <script src="js/app.js" defer></script>
</head>
<<<<<<< HEAD
<ul>
  <div style="">
      <?php echo $tools['sorting']->getHtml(); ?>
  </div>
<?php foreach ($tools['products'] as $product): ?>
    <li>
        <div class="product-item">
            <div class="row">
                <div class="product-name col-lg-12 col-md-12 col-12"><?php echo $product->title?></div>
                <div class="product-img col-lg-3 col-md-3 col-3"><a href="product/<?php echo $product->id?>"><img src="<?php echo $product->img?>" height="128px" style="text-align: center" alt="<?php echo $product->id?>"></a></div>
                <div class="product-desc col-lg-9 col-md-9 col-9"><?php echo $product->description?></div>
                <div class="price col-lg-3 col-md-3 "><?php echo $product->price ?> грн</div>
                <div class="price col-lg-6 col-md-6 " style="color: white">Категория: <?php echo $product->category; ?></div>
                <?php if ($product->status == 1): ?>
                <div class="availability-yes col-lg-3 col-md-3">Есть в наличии</div>
                <?php elseif ($product->status == 0): ?>
                <div class="availability-yes col-lg-3 col-md-3" style="color: rebeccapurple">Нет в наличии</div>
                <?php endif; ?>
                <?php if ($tools['session']->sessionExists() && $tools['session']->keyExists('name')): ?>
                <form action="catalog/addProduct" method="post" class="row" style="width: 100%">
                    <div class="col-lg-3 col-md-3 col-3"></div>
                    <button class="btn btn-primary col-lg-3 col-md-3 col-3" type="submit" name="AddWish" value="<?php echo $product->id ?>" style="width: 400px">В избранные</button>
                    <div class="col-lg-3 col-md-3 col-3"></div>
                    <button class="btn btn-primary col-lg-3 col-md-3 col-3" type="submit" name="AddCart" value="<?php echo $product->id ?>" style="width: 400px">В корзину</button>
                </form>
                <?php else: ?>
                <div class="col-lg-8 col-md-8 col-8"></div>
                <a href="../login" class="btn btn-primary col-lg-3 col-md-3 col-3" style="color: white; margin-bottom: 20px">Войдите, чтобы купить</a>
                <?php endif; ?>
            </div>
        </div>
    </li>
<?php endforeach ?>
  </ul>
<?php if ($tools['pagination']->countPages > 1): ?>
<div style="display: flex;justify-content: center;"><?php echo $tools['pagination']->getHtml() ?></div>
<?php endif; ?>
=======
<div class="container">
  <div id="app">
    <products></products>
  </div>
</div>
>>>>>>> feature/Vue
