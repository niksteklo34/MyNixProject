<head>
    <link rel="stylesheet" href="/css/main.css">
</head>
<form style="text-align: center; margin-top: 30px" method="post" action="search">
    <input type="text" name="title" required minlength="2">
    <input type="submit">
</form>
<div>
    <?php if (empty($tools['products'])): ?>
        <h1 style="margin-top: 50px;text-align: center">Тут пока пусто</h1>
    <?php elseif (!empty($tools['products'])): ?>
        <?php foreach ($tools['products'] as $product): ?>
            <li style="max-width: 40%;margin: 30px auto;list-style-type: none;background-color: olive;border: black 5px solid;border-radius: 45px">
                <div class="product-item">
                    <div class="row">
                        <div class="product-name col-lg-12 col-md-12 col-12" style="text-align: center; margin: 15px; font-size: 24px;color: white"><?php echo $product->title?></div>
                        <div class="product-img col-lg-3 col-md-3 col-3"><a href="<?php $_SERVER['SERVER_NAME'] ?>/product/<?php echo $product->id ?>"><img src="<?php echo $product->img?>" height="128px" style="text-align: center; margin-left: 15px"></a></div>
                        <div class="product-desc col-lg-9 col-md-9 col-9" style="font-size: 18px; color: white"><?php echo $product->description?></div>
                        <div class="price col-lg-3 col-md-3" style="margin: 20px; color: red; font-size: 20px"><?php echo $product->price ?> грн</div>
                    </div>
                </div>
            </li>
        <?php endforeach; ?>
    <?php endif; ?>
</div>
