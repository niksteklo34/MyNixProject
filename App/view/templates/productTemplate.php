<head>
    <link rel="stylesheet" href="/css/product.css">
</head>
<?php
use App\Exceptions\NonIdException;

$product = $array['product'];

if (empty($product)) {
    throw new NonIdException("Product not found");
}
?>

<?php if ($session->keyExists('cart_list') && count($session->get('cart_list')) > 0): ?>
    <?php $countProducts = count($session->get('cart_list')); ?>
    <h3>В корзине <?php echo $countProducts ?> товаров</h3>
<?php else: ?>
    <h3>В корзине пусто...</h3>
<?php endif; ?>

<div class="row">
    <div class="product-img col-lg-5 col-md-5"><img src="<?php echo $product->img?>" height="400" alt=""></div>
    <div class="product-info col-lg-5 col-md-5">
        <div class="product-name"><?php echo $product->name?></div>
        <div class="price-bar row align-items-center">
            <div class="price col-lg-7 col-md-7"><?php echo $product->price?> грн</div>
            <?php if ($product->status == 1): ?>
            <div class="price col-lg-7 col-md-7" style="color: green">В наличии</div>
            <?php else: ?>
            <div class="price col-lg-7 col-md-7" style="color: rebeccapurple">Нет в наличии</div>
            <?php endif; ?>
            <form action="<?php echo $product->id ?>/order" method="post">
                <button name="add" class="btn btn-primary col-lg-4 col-md-4" value="<?php echo $product->id ?>">В корзину</button>
            </form>
        </div>
    </div>
    <div class="product-desc col-lg-12 col-md-12"><?php echo $product->description?></div>
    <a href="../<?php $_SERVER['SERVER_NAME'] ?>catalog" class="btn btn-success" style="margin: 15px auto">В каталог</a>
</div>
