productLoad();
destroyProduct();

function productLoad() {
    let product_show_a = document.querySelectorAll('.product_show_a');

    for (let product_a of product_show_a) {
        product_a.addEventListener('click', function (event) {
            event.preventDefault();

            let urlFetch = product_a.href;
            let promise = fetch(urlFetch, {
                method: 'get',
                //body: new FormData( form_update_role_user ),
            });
            promise.then(
                response => {
                    return response.json();
                }
            ).then(
                json => {
                    showProducts(json);
                });
        });
    }
}

FReadeer =new FileReader();
// событие, когда файл загрузится
FReadeer.onload = function(event){
    document.querySelector('#oldImg').src = event.target.result;
}
function updateImg(){
    document.querySelector('#newImg').addEventListener('change', loadImageFile);
 }
// функция выборки файла
 function loadImageFile(){
    let file = document.querySelector('#newImg').files[0];
     FReadeer.readAsDataURL(file);
 }

let cell ='';

function destroyProduct() {
    let destroy_products = document.querySelectorAll('#form_destroy_product');
    for (let destroy_product of destroy_products) {
        destroy_product.addEventListener('submit', function (event) {
            cell = this;
            event.preventDefault();
            let urlFetch = this.action;
            ajaxDelete( urlFetch, destroy_product);
            //this.parentElement.parentElement.remove();
        })
    }
}

let add_product = document.querySelector('#add_product')?.addEventListener('click', getContent);

function form_product_add_new() {
    let form_product_add_new = document.querySelector('#form_product_add_new').addEventListener('submit', setProduct);
}

function setProduct(){ // отправляет на создание продукт
    event.preventDefault();
    //console.log(form_product_add_new);
    let url = this.action;
    let promise = fetch(url, {
        method: 'post',
        body: new FormData( this ),
    });

    promise.then(
        response => {
            return response.json();
        }
    ).then(
        json => {
            showProducts(json);
        });
}

function getContent(){ // получает Контент
    event.preventDefault();
    let url = this.href;
    let promise = fetch(url, {
    });

    promise.then(
        response => {
            return response.json();
        }
    ).then(
        json => {
            showProducts(json);
            form_product_add_new();
        });
}

function ajaxDelete(url, form){
    let promise = fetch(url, {
        method: 'post',
        body: new FormData( form ),
    });

    promise.then(
        response => {
            return response.json();
        }
    ).then(
        json => {
        status(json);
        });
}
function status(rez){

    if(rez[1] === true ){
        deletProduct();
        document.querySelector('#alert-status').innerHTML = 'Запись удалена!' ;
    }else{
        document.querySelector('#alert-status').innerHTML = 'Не хватает прав доступа!' ;
    }
}
/*
    function alertSatus(){
        document.querySelector('#alert-status').innerHTML = 'Запись удалена!' ;
    }
*/

function deletProduct(){
    cell.parentElement.parentElement.remove();
    console.log('удалена');
}

/*
function status(status){
    let status_ajax_request = document.querySelector('#status_ajax_request');
    status_ajax_request.innerHTML = status.status;
}
 */
/*
$( document ).ready(function status(status) {
    $('#status').addClass('alert alert-success').append( '<span id="status_ajax_request">status.status</span>' );
});

 */
