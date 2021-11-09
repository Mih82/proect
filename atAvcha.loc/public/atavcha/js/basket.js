event_add_basket();
getBasketTotalQuantity()
let quantity_form = document.querySelectorAll('.quantity_form');

for(let even_quantity_form of quantity_form)// событие изменение колличества продукта
{

    even_quantity_form.addEventListener('focusout',function (event){
        event.preventDefault();

        let urlFetch = even_quantity_form.action;

        let promise = fetch(urlFetch, {
            method: 'POST',
            body: new FormData(even_quantity_form),
        });
        promise.then(
            response => {
                return response.json();
            }
        ).then(
            json => {
                showBasketTotalQuantity(json);
            });
    })
}


function event_add_basket()// вешает событие на добавление в корзину
{
    let basket_add_all = document.querySelectorAll('.basket_add');

    for (let basket_add of basket_add_all) {
        let urlFetch = basket_add.href;

        basket_add.addEventListener('click', function (event) {
            event.preventDefault();
            let self = this;

            let promise = fetch(urlFetch, {
                method: 'GET'
            });
            promise.then(
                response => {
                    //return response.text();
                    return response.json();
                }
            ).then(
                json => {
                    status(self, json);

                });
        })

    }
}

function status(self, text)//проверяет статус и сообщает об удаче
{
    //console.log(self);
    if(text.status == 'ok'){
        self.innerHTML = 'Товар заказан';
    }
    getBasketTotalQuantity();
}


 function getBasketTotalQuantity()// получает кол-во товаров в корзине
{

    let promise = fetch('http://atavcha.loc/basket/getTotal', {
        method: 'get',
        credentials: 'include',
    });
    promise.then(
        response => {
            return response.json();
        }
    ).then(
         json => {
             showBasketTotalQuantity(json);
        }
     );
    /*
            let response = await fetch('http://atavcha.loc/basket/getTotal');
            let data = await response.json()
    //console.log(data.totalQuantity);
            return data.totalQuantity;

     */
}


function showBasketTotalQuantity(data)//Показывает в корзине колличество товара
{
    if(data.totalQuantity > 0){
        let total_quantity = document.querySelector('.total_quantity');
        total_quantity.innerHTML = data.totalQuantity;
    }
    else{
        let total_quantity = document.querySelector('.total_quantity');
        total_quantity.innerHTML = '';
    }
}

basket_table_delete_event();

function basket_table_delete_event()//навешивает событие на удаление из корзины
{
    let delete_basket_id=document.querySelectorAll('.delete_basket_id');

    for( let delete_basket of delete_basket_id ) {
        let urlFetch = delete_basket.href;

        delete_basket.addEventListener('click', function (event) {
            event.preventDefault();
            self = this;

            let promise = fetch(urlFetch, {
                credentials: 'include',

            });
            promise.then(
                response => {
                    return response.text();
                }
            ).then(
                text => {
                    //console.log(JSON.parse( text));
                    basketTableDelete(  JSON.parse(text) );
                });

        })
    }
}

function basketTableDelete(status)//удаляет из корзины
{
    if(status[0]) self.parentElement.parentElement.remove();
    getBasketTotalQuantity();
}



//basket_table_delete_event();
/*
//удаляет из Cart
function basket_table_delete_event(){ // вешает событие на удаление из корзины
    let delete_basket_id=document.querySelectorAll('.delete_basket_id');

    for( let delete_basket of delete_basket_id ) {
        let urlFetch = delete_basket.href;

        delete_basket.addEventListener('click', function (event) {
            event.preventDefault();

            let promise = fetch(urlFetch, {
                //'method': 'get',
                credentials: 'include',
                _method: 'DELETE',
                _token: "{{csrf_token()}}",

            });
            promise.then(
                response => {
                    return response.text();
                }
            ).then(
                text => {
                    //console.log(JSON.parse( text));
                    basketTableUpdate(JSON.parse( text));
                });
        })
    }
}
//удаляет из представления
function basketTableUpdate(data){
    document.querySelector('table.basket_table').innerHTML = data;
    basket_table_delete_event();
}
*/
