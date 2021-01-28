<head>
    <link rel="stylesheet" href="css/catalog.css">
</head>
<?php foreach ($products as $product): ?>
    <li>
        <div class="product-item">
            <div class="row">
                <div class="product-name col-lg-12 col-md-12 col-12"><?php echo $product->id?></div>
                <div class="product-img col-lg-3 col-md-3 col-3"><a href="product"><img src="<?php echo $product->img?>" height="128px" alt="<?php echo $product->id?>"></a></div>
                <div class="product-desc col-lg-9 col-md-9 col-9"><?php echo $product->desc?></div>
                <div class="price col-lg-3 col-md-3 "><?php echo $product->price ?> грн</div>
                <div class="availability-yes col-lg-6 col-md-6"><?php echo $product->status ?></div>
                <button class="btn btn-primary col-lg-3 col-md-3 col-3">В корзину</button>
            </div>
        </div>
    </li>
<?php endforeach ?>
