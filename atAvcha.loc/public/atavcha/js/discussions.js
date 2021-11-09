

function open_form() { //форма для добавления комментария к комментарию
    let open_forms = document.querySelectorAll('#open_form');
    for (let open_form of open_forms) {
        open_form.addEventListener('click',  open_form_one_element );
    }
}

function showOpenForm(data , open_form){
          open_form.classList.toggle('none');
    box_form = open_form.previousElementSibling;
    box_form.innerHTML = data;
    storeForm();

    let a = document.createElement('a');
    a.href = '';
    a.text = 'Закрыть форму';
    a.className = 'closeForm';
    a.id = 'closeForm';
    box_form.appendChild(a);

    document.querySelector('#closeForm').addEventListener('click', close_form );
}

function close_form( ){

    if(event.isTrusted) {
        event.preventDefault();
    }
    let li = event.target.closest('.li-discussion');
    li.querySelector('#open_form').classList.toggle('none');
    li.querySelector('#box_form').innerHTML = "";
}

function user_event_close(event){ //пользовательское событие
    document.addEventListener( 'userEvent', close_form );
    let userEvent = new CustomEvent( 'userEvent', {bubbles: true} );
    event.target.dispatchEvent( userEvent );
}

function open_form_one_element() {

    let open_form = event.target;
    event.preventDefault();
    let url = event.target.href;

    let promise = fetch(url, {
        method: 'get',
    });

    promise.then(
        response => {
            return response.json();
        }
    ).then(
        json => {
            showOpenForm(json, open_form);
        }
    )
}

function storeForm(){
    document.querySelector('#discussion_form')?.addEventListener('submit', function(event){
        event.preventDefault();

        let url = event.target.action;

        let promise = fetch(url, {
            method: 'post',
            body: new FormData( this )
        });

        promise.then(
            response => {
                return response.json();
            }
        ).then(
            json => {

                if( json[0] == 0 ){
                    add_dicussion_0(event , json[1]);
                }
                else{
                    add_discussion_at_discussion(event , json[1]);
                }
            }
        )
    })
}

function add_discussion_at_discussion(event , data){

    event.target.closest('.li-discussion').lastElementChild.insertAdjacentHTML( "beforeend", data);

    user_event_close(event);
    open_form();
}

function add_dicussion_0(event,data){
    document.querySelector('.children-discussion').insertAdjacentHTML( "beforeend", data);
    event.target.reset();

    open_form();
}

/*
function open_form() { //форма для добавления комментария к комментарию
    let open_forms = document.querySelectorAll('#open_form');
    for (let open_form of open_forms) {
        open_form.addEventListener('click', function (event) {
            event.preventDefault();
            let url = event.target.href;

            let promise = fetch(url, {
                method: 'get',
            });

            promise.then(
                response => {
                    return response.json();
                }
            ).then(
                json => {
                    showOpenForm(json, open_form);
                }
            )
        })
    }
}

function showOpenForm(data , open_form){
    open_form.previousElementSibling.innerHTML = data;
        let a = document.createElement('a');
        a.href = '';
        a.text = 'Закрыть форму';
        a.className = 'closeForm';
        a.id = 'closeForm';
    open_form.previousElementSibling.appendChild(a);

    document.querySelector('#closeForm').addEventListener('click', function (event){
        console.log(event.target);
        event.preventDefault();
        console.log('отмена ссылки отработала');
        //document.querySelector('#box_form').innerHTML="";
        event.target.parentElement.innerHTML = "";
        console.log('очистка бокса');
        open_form;
        console.log('навешивание события');
    })
}
*/
