async function getOrders()
{
    let getParamsUrl = new URLSearchParams(document.location.search);
    let pagination = getParamsUrl.get('page') ? getParamsUrl.get('page') : 1;
    let Result = await fetch(`http://coffezin.local/user/shopList/api?page=${pagination}`, {method: 'GET', headers: {'Content-Type': 'application/json'}});
    let data = await Result.json();
    return data;
}

async function setLayoutForOrders()
{
    let orderLayout = '';

    let orders = await getOrders();

    if (orders.length == 0) {
        orderLayout += '<h1>Список пуст</h1>';
    } else {

        let order = orders.forEach(i => {
            orderLayout += `
            <div class="listItem">
            <h2 class="orderTitle">Заказ № ${i.id}</h2>
            <div class="date">${i.date}</div>
        `;
            i.products.forEach(i => {
                orderLayout += `
                <div class="productItem">
                    <div class="row box align-items-center" style="max-width: 1000px">
                        <div class="product-name col-lg-6 col-md-6 col-6">${i.title} грн</div>
                        <div class="product-name col-lg-3 col-md-3 col-3">${i.qty} ед.</div>
                        <div class="price col-lg-3 col-md-3 col-3" style="margin-bottom: 10px">Цена: ${i.price} грн</div>
                    </div>
                </div>
            `;
                fullPrice = Number(i.qty) * Number(i.price);
            })
            orderLayout += `
            <div class="totalPrice col-lg-6 col-md-6 col-6" style="margin-bottom: 10px">Общая стоимость: ${fullPrice} грн</div>
            </div>
        `;
        })
    }

    document.getElementById('order').innerHTML = orderLayout;
}

setLayoutForOrders();