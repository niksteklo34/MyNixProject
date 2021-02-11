<?php
$session = new \App\Session\Authentication();
new \App\Session\Session();
?>
<head xmlns="http://www.w3.org/1999/html">
    <link rel="stylesheet" href="/css/catalog.css">
</head>
<div class="header">
    <h2>Корзина</h2>
    <hr>
</div>
<ul>
    <?php if (!$session->isAuth() or empty($products)): ?>
    <li style="list-style-type: none; background-color: olive; margin: 30px;padding: 30px;border: black 5px solid;border-radius: 45px">
        <h1 style="text-align: center">Пусто...</h1><br>
    </li>
    <?php else: ?>
        <?php  $fullPrice = 0; ?>
        <?php foreach ($products as $key => $value): ?>
            <li style="list-style-type: none;">
                <div class="product-item">
                    <div class="row box align-items-center" style="max-width: 1000px">
                        <div class="product-img col-lg-3 col-md-3 col-4" style="margin-top: 10px"><img src="<?php echo $value->img ?>" alt="" height="75px"></div>
                        <div class="product-name col-lg-9 col-md-9 col-8"><?php echo $value->title ?></div>
                        <div class="price col-lg-10 col-md-10 col-10"><?php echo $value->price ?> грн</div>
                        <form action="" method="post">
                            <div class="price col-lg-2 col-md-2 col-2"><button type="submit" name="deleteProduct" value="<?php echo $key?>">Удалить</button></div>
                        </form>
                    </div>
                </div>
            </li>
        <?php $fullPrice = $value->price + $fullPrice?>
        <?php endforeach; ?>

        <h1 style="color: red;margin: 15px 0">Общая самма заказа: <?php echo $fullPrice?> Грн</h1>
        <div class="row box align-items-center"
        <div class="text-right">
            <form action="" method="post" style="width: 100%;">
                <div class="row">
                    <button name="delAll" value="fdf" type="submit" class="btn btn-primary col-lg-3 col-md-3 col-3" style="">Очистить заказ</button>
                    <div class="col-lg-6 col-md-6 col-6"></div>
                    <button name="takeOrder" value="df" type="submit" class="btn btn-primary col-lg-3 col-md-3 col-3" style="">Оформить заказ</button>
                </div>
            </form>
        </div>
        </div>

        <?php
        if (!empty($_POST)) {
            if (isset($_POST['deleteProduct'])) {
                $delProduct = $_POST['deleteProduct'];
                unset($_SESSION['cart_list'][$delProduct]);
                header('Location: basket');
            }
            if (isset($_POST['delAll'])) {
                $_SESSION['cart_list'] = [];
                header('Location: basket');
            }
            if (isset($_POST['takeOrder'])) {
                $productModel = new \App\Models\Product();
                foreach ($products as $value) {
                    $productModel->makeOrder($session->session->get('id'), $value->id);
                }
                echo "<h1 style='text-align: center'>Ваш заказ создан!</h1>";
                $session->session->set('cart_list', []);
                header("refresh: 2","Location: basket");
            }
        }
        ?>
    <?php endif; ?>
</ul>

