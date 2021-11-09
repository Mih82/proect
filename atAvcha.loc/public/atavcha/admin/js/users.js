
let get_role_user = document.querySelector('.role_user_a');
let urlFetch = get_role_user?.href;
if(get_role_user) {

    get_role_user.addEventListener('click', function getRole(event) {
        event.preventDefault();
        let list = this;

        let promise = fetch(urlFetch, {
            method: 'get',
            //body:,
        });
        promise.then(
            response => {
                return response.json();
            }
        ).then(
            json => {
                showRole(list, json);
            }
        );
    });
}
function showRole(list, data){
    list.parentElement.innerHTML = data;

    document.querySelector('.roles_list_select')?.addEventListener('change',function(event){
        updateRoleUser(event.target);
    })
}
function updateRoleUser(data){
    let form_update_role_user=document.querySelector('.form_update_role_user');
    let roles_list_select=document.querySelector('.roles_list_select');
    roles_list_select.addEventListener('blur',function(event){
    event.preventDefault();

    let promise = fetch( urlFetch ,{
        method:'post',
        body: new FormData( form_update_role_user ),
    });
    promise.then(
        response => {
            return response.json();
        }
    ).then(
        json => {
            //console.log(json);
        }
    );
    });
}


/*
$(document).ready(function(){

    $(".form_destroy_user").submit(function(event){
        event.preventDefault();
        var data;
        data = new FormData();

        data.append( '_method', 'delete' );
        data.append( '_token', 'token' );

        $.ajax({
            type: $(this).attr('method'),
            url: $(this).action,
            data: data,
            async: false,
            dataType: "html",
            success: function(result){
                alert('Форма отправлена');
            }
        });
    })

});
*/
