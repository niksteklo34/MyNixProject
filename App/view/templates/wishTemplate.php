<head>
    <link rel="stylesheet" href="/css/basket.css">
</head>
<h2 style="text-align: left;margin: 20px 0">Списко желаний</h2>
<hr style="background-color: white">
<?php if (count($_SESSION['wish_list']) == 0): ?>
<h1 style="margin: 20px 0">В списке пусто!</h1>
<?php else: ?>
<?php foreach ($_SESSION['wish_list'] as $key => $value): ?>
    <hr>
        <ul>
            <li style="list-style-type: none;">
                <div class="product-item">
                    <div class="row box align-items-center" style="max-width: 1000px">
                        <div class="product-img col-lg-3 col-md-3 col-4" style="margin-top: 10px"><img src="<?php echo $value->img ?>" alt="" width="64px"></div>
                        <div class="product-name col-lg-9 col-md-9 col-8"><?php echo $value->title ?></div>
                        <div class="price col-lg-10 col-md-10 col-10"><?php echo $value->price ?> грн</div>
                        <form action="removeWish" method="post">
                            <div class="price col-lg-2 col-md-2 col-2"><button type="submit" name="deleteProduct" value="<?php echo $key?>">Удалить</button></div>
                        </form>
                    </div>
                </div>
            </li>
        </ul>
    <hr>
<?php endforeach; ?>
<?php endif; ?>
<a href="../user" class="btn btn-success" style="text-decoration: none; color: white; margin: 20px 0">Назад</a>
