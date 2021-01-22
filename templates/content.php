<?php foreach ($data as $dat): ?>
    <li>
    <div class="product-item">
        <div class="row">
            <div class="product-name col-lg-12 col-md-12 col-12"><?php echo $dat['name']?></div>
            <div class="product-img col-lg-3 col-md-3 col-3"><?php echo $dat['img']?></div>
            <div class="product-desc col-lg-9 col-md-9 col-9"><?php echo $dat['desc']?></div>
            <div class="price col-lg-3 col-md-3 "><?php echo $dat['price']?> грн</div>
            <div class="availability-yes col-lg-6 col-md-6"><?php echo $dat['status']?></div>
            <button class="btn btn-primary col-lg-3 col-md-3 col-3">В корзину</button>
        </div>
    </div>
</li>
<?php endforeach ?>
