<head>
  <link rel="stylesheet" href="/css/product.css">
</head>
<div class="container">
  <?php $product = $tools['product'] ?>
  <div class="row">
    <div class="product-img col-lg-5 col-md-5"><img src="<?php echo $product->img?>" height="400" alt=""></div>
    <div class="product-info col-lg-5 col-md-5">
      <div class="product-name"><?php echo $product->title?></div>
      <div class="price-bar row align-items-center">
        <div class="price col-lg-5 col-md-5"><?php echo $product->price?> грн</div>
        <?php if ($product->status == 1): ?>
        <div class="statusOk price col-lg-7 col-md-7">В наличии</div>
        <?php else: ?>
        <div class="statusNo price col-lg-5 col-md-7">Нет в наличии</div>
        <?php endif; ?>
        <form action="<?php echo $product->id ?>/order" method="post">
          <div class="col-lg-3 col-md-3"></div>
          <button name="add" class="addBtn btn btn-primary col-lg-6 col-md-6" value="<?php echo $product->id ?>">В корзину</button>
          <div class="col-lg-3 col-md-3"></div>
        </form>
      </div>
    </div>
    <div class="product-desc col-lg-12 col-md-12"><?php echo $product->description?></div>
    <a href="../<?php $_SERVER['SERVER_NAME'] ?>catalog" class="linkBack btn btn-success">В каталог</a>
  </div>

  <h3>Коментарии</h3>
  <form action="<?php echo $product->id ?>/comment" method="post">
    <input type="text" maxlength="1000" height="20px" minlength="10" name="comment" required>
    <button value="<?php echo $product->id ?>" type="submit" name="submitComment">Отправить</button>
  </form>
    <div class="comments">
      <?php if (empty($tools['comments'])): ?>
        <h2>Коментариев нет</h2>
      <?php else: ?>
        <?php foreach ($tools['comments'] as $comment): ?>
          <?php $fullName = $comment->name . ' ' . $comment->surname ?>
          <div class="comment-item">
            <h4 class="name"><?php echo $fullName ?></h4>
            <p class="text"><?php echo $comment->text ?></p>
            <p class="date"><?php echo $comment->created_at ?></p>
          </div>
        <?php endforeach; ?>
      <?php endif; ?>
    </div>
</div>
