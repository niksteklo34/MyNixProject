<head>
    <link rel="stylesheet" href="/css/basket.css">
</head>
<h1>Список покупок</h1>
<ol>
    <li id="order" style=" margin-top: 15px" >
    </li>
</ol>
<a href="../user" class="btn btn-success" style="text-decoration: none; color: white; margin: 20px 0">Назад</a>

<script defer>
    async function getOrders()
    {
        let Result = await fetch("http://coffezin.local/user/shopList/api", {method: 'GET', headers: {'Content-Type': 'application/json'}});
        let data = await Result.json();
        return data;
    }

    async function setLayoutForOrders()
    {
        let orderLayout = '';
        let orders = await getOrders();
        orders.forEach( order => {
            orderLayout += `
            <div class="product-item">
                <hr style="height: 2px; background-color: white">
                    <div class="row box align-items-center" style="max-width: 1000px">
                        <div class="product-name col-lg-3 col-md-3 col-3">${order.name}</div>
                        <div class="product-name col-lg-6 col-md-6 col-6">${order.title} грн</div>
                        <div class="product-name col-lg-3 col-md-3 col-3">${order.qty} ед.</div>
                        <div class="price col-lg-6 col-md-6 col-6" style="margin-bottom: 10px">Сумма: ${order.price * order.qty} грн</div>
                    </div>
                <hr style="height: 2px; background-color: white">
            </div>
            `;
        });
        document.getElementById('order').innerHTML = orderLayout;
    }

    setLayoutForOrders();
</script>


