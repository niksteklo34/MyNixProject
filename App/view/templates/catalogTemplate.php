<?php
$ses = new \App\Session\Authentication();
?>
<head>
    <link rel="stylesheet" href="css/catalog.css">
</head>
    <?php if ($ses->isAuth()): ?>
        <?php if(isset($_SESSION['cart_list'])): ?>
        <?php if (count($_SESSION['cart_list']) > 0): ?>
            <h3>В корзине <?php echo count($_SESSION['cart_list']); ?> товаров</h3>
        <?php else: ?>
            <h3>В корзине пусто...</h3>
        <?php endif; ?>
        <?php else: ?>
            <h3>В корзине пусто...</h3>
    <?php endif; ?>
    <?php endif; ?>
<?php foreach ($products as $product): ?>
    <li>
        <div class="product-item">
            <div class="row">
                <div class="product-name col-lg-12 col-md-12 col-12"><?php echo $product->name?></div>
                <div class="product-img col-lg-3 col-md-3 col-3"><a href="product/<?php echo $product->id?>"><img src="<?php echo $product->img?>" height="128px" style="text-align: center" alt="<?php echo $product->id?>"></a></div>
                <div class="product-desc col-lg-9 col-md-9 col-9"><?php echo $product->description?></div>
                <div class="price col-lg-3 col-md-3 "><?php echo $product->price ?> грн</div>
                <?php if ($product->status == 1): ?>
                <div class="availability-yes col-lg-6 col-md-6">Есть в наличии</div>
                <?php elseif ($product->status == 0): ?>
                <div class="availability-yes col-lg-6 col-md-6" style="color: rebeccapurple">Нет в наличии</div>
                <?php endif; ?>
                <form action="" method="post" class="row" style="width: 100%">
                    <div class="col-lg-9 col-md-9 col-9"></div>
                    <button class="btn btn-primary col-lg-3 col-md-3 col-3" type="submit" name="Product" value="<?php echo $product->id ?>" style="width: 400px">В корзину</button>
                </form>
            </div>
        </div>
    </li>
<?php endforeach ?>
<?php
$productBaseModel = new \App\models\BaseModel();
if (!empty($_POST)) {
    $product = $productBaseModel->getProductId($_POST['Product']);
    $_SESSION['cart_list'][] = $product;
    header('Location: catalog');
}