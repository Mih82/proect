
productAtCategory();

function productAtCategory(){
    let categories_list_a = document.querySelectorAll('.categories_list_a');
    for(let category_a of categories_list_a){
        category_a.addEventListener('click',function (event){
            event.preventDefault();

            let urlFetch = this.href;

            let promise = fetch( urlFetch ,{
                method:'get',
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

document.querySelector('#add_category')?.addEventListener('click', getEditCategoriesNoForm);

function showCategoriesEdit(data){
    document.querySelector('#products').innerHTML = data;
}

function getEditCategoriesNoForm(event){ // получает Контент форм
    event.preventDefault();
    let url = this.href;
    let promise = fetch(url, {
        //body: new FormData( event.target ),
    });

    promise.then(
        response => {
            return response.json();
        }
    ).then(
        json => {
            showCategoriesEdit(json);
            clickSubmit();
            select_update_category();
            productAtCategory();
        });
}

function getEditCategoriesForm(event){ // получает Контент форм
    event.preventDefault();
    let url = event.target.action;
    let promise = fetch(url, {
        method: 'post',
        body: new FormData( event.target ),
    });

    promise.then(
        response => {
            return response.json();
        }
    ).then(
        json => {
            showCategoriesEdit(json);
            clickSubmit();
            select_update_category();
        });
}

function clickSubmit(){
    let edit_category_form_submit = document.querySelectorAll('.edit_category_form');
    for( let clickSubmit of edit_category_form_submit ){
        clickSubmit.addEventListener('submit',getEditCategoriesForm);
    }
}

function setProduct(){ // отправляет на изменение категории
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
            //status(json);
            //console.log(json);
            showProducts(json);

        });
}

function select_update_category () {
    document.querySelector('#select_update_category').addEventListener('change', function (event) {
        let sel = event.target;
        console.log(sel.options[sel.selectedIndex].text);
        document.querySelector('#id_update_category').value = sel.options[sel.selectedIndex].text;
    })
}


function getContent(){ // получает Контент
    event.preventDefault();
    let url = this.href;
    let promise = fetch(url, {
        //method: 'post',
        //body: new FormData( form ),
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

function showProducts(data){
    let products = document.querySelector('#products');
    products.innerHTML = data;
    productLoad();
    destroyProduct();
    productAtCategory();
    if( document.querySelector('#newImg') ) {
        updateImg();
    }
}

function getProducts(event){

    let promise = fetch( urlFetch ,{
        method:'get',
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
};

/*
document.querySelector('#add_category').addEventListener('click', addFormCreateCategory);

function addFormCreateCategory(){
    event.preventDefault();
    let urlFetch=event.target.href;

    function request
    let promise = fetch( urlFetch ,{
        method:'get',
        //body: new FormData( form_update_role_user ),
    });
    promise.then(
        response => {
            return response.json();
        }
    ).then(
        json => {
            console.log(json);
        });
} ;

 */

/*
function addFormCreateCategory(event){
    event.preventDefault();

    let urlfetch=event.target.href;

    let promise = fetch( urlFetch ,{
        method:'get',
        //body: new FormData( form_update_role_user ),
    });
    promise.then(
        response => {
            return response.json();
        }
    ).then(
        json => {
            console.log(json);
        });
};

 */
