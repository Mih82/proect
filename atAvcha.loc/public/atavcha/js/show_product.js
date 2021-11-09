
    let showCatalogAll = document.querySelectorAll('.show_catalog_href');

    for( let showCatalog of showCatalogAll ){//вешает на шапку меню смену категорий продукта
        let urlFetch = showCatalog.href;

        showCatalog.addEventListener('click', function getProduct(event) {
            event.preventDefault();

            let promise = fetch( urlFetch ,{
                method: 'GET',
            });
            promise.then(
                response => {
                    return response.text();
                }
            ).then(
                text => {
                    updateCatalogProduct(JSON.parse( text ));
                });

        });
    }


    bigImage();//клик на просмотр картинки
    showProduct();//вешает на отдельный просмотр этого товара

function updateCatalogProduct( data ){
    let oldTable = document.querySelector(' #table_catalog');
   oldTable.innerHTML = data;
    event_add_basket(); // обновляет событие на добавление в корзину
    showProduct();//вешает на отдельный просмотр этого товара
    bigImage();//клик на просмотр картинки
    open_form();//форма для добавления комментария к комментарию
    storeForm();// добавления коментария с нижней формы коментария

}
function showProduct(){//вешает на отдельный просмотр этого товара
    let tr_product_catalog_all = document.querySelectorAll('.tr_product_catalog a:not(.basket_add,.catalog_img_big)');

    //console.log(tr_product_catalog_all);
    for( let tr_product_catalog of tr_product_catalog_all ){
        let urlFetch = tr_product_catalog.href;

        tr_product_catalog.addEventListener('click', function getProduct(event) {
            event.preventDefault();

            let promise = fetch( urlFetch ,{
                method: 'GET',
            });
            promise.then(
                response => {
                    return response.text();
                }
            ).then(
                text => {
                    updateCatalogProduct(JSON.parse( text ));
                });

        });
    }
}


