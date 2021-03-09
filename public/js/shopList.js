async function getOrders()
{
    let Result = await fetch("http://coffezin.local/user/shopList/api", {method: 'GET', headers: {'Content-Type': 'application/json'}});
    let data = await Result.json();
    return data;
}

async function setLayoutForOrders()
{
    let orderPrice = 0;
    let orderLayout = '';
    let date = '';

    let orders = await getOrders();
    orders.forEach(start);

    function start(order, index) {
        orderLayout += `
        <div class="listItem">
        <h2 class="orderTitle">Заказ № ${index + 1}</h2>
        ${date}
        `;
        order.forEach( i => {
            orderId = i.id;
            date = i.created_at;
            orderPrice = Number(orderPrice) + Number(i.price) * Number(i.qty);
            orderLayout += `
                    <div class="productItem">
                        <div class="row box align-items-center" style="max-width: 1000px">
                            <div class="product-name col-lg-3 col-md-3 col-3">${i.name}</div>
                            <div class="product-name col-lg-6 col-md-6 col-6">${i.title} грн</div>
                            <div class="product-name col-lg-3 col-md-3 col-3">${i.qty} ед.</div>
                            <div class="price col-lg-6 col-md-6 col-6" style="margin-bottom: 10px">Цена: ${i.price} грн</div>
                        </div>
                    </div>
                `;
        })
        orderLayout += `
        <div class="totalPrice col-lg-6 col-md-6 col-6" style="margin-bottom: 10px">Общая стоимость: ${orderPrice} грн</div>
        </div>
        `;
    }
    document.getElementById('order').innerHTML = orderLayout;
}

setLayoutForOrders();