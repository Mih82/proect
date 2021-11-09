/*
document.querySelector('#form_mail').addEventListener('submit', function(event){
    let cell = this;
    getFormAjax(event, cell).then( showStatusMail );
});

function showStatusMail(status){
    console.log(status);
    document.querySelector('#status_mail').innerHTML = status;
}

async function getFormAjax(event , cell ){
    event.preventDefault();
    let url = cell.action;
    try {
        let response = await fetch(url, {
                method: 'post',
                body: new FormData(cell),
            });
        let rezult = await response.json();
    }
    catch {
         let rezult = 'Не хватает прав доступа!';
     }

    return rezult;
}
*/

document.querySelector('#form_mail').addEventListener('submit', function(event){
    let cell = this;
    getFormAjax(event, cell);
});

function showStatusMail(status){
    document.querySelector('#status_mail').innerHTML = status;
    resetForm();
}

function getFormAjax(event, cell){
    event.preventDefault();
    let url = cell.action;

    let promise = fetch(url, {
        method: 'post',
        body: new FormData( cell ),
    });

    promise.then(
        response => {
            if(response.status == 403){
                return "Ошибка! Не хватает прав доступа!"
            }
            return response.json();
        }
    ).then(
        json => {
            showStatusMail(json);
        }
    )
}

function resetForm(){
    document.querySelector('#form_mail').reset();
}





