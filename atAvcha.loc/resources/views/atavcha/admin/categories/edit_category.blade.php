<div id="new_category" class="edit_category">
    <span>Новая категория</span><br>
    <form id="create_category_form" class="edit_category_form" method="post" action="{{route('admin.category.store')}}">
        @csrf
        <input type="text" name="name">
        <button type="submit">Создать</button>
    </form>
</div>

<div id="edit_category" class="edit_category">
    <span>Изменить категорию</span><br>
    <form id="create_category_form" class="edit_category_form" method="post" action="{{route('admin.category.update',['id'=>'id'])}}">
        @csrf
        @method('put')
        <select id="select_update_category" name="updateId" >
            @foreach($categories as $category)
                <option value="{{$category->id}}" data-taxt="{{$category->name}}">{{$category->name}}</option>
            @endforeach
        </select><br>
        <input id="id_update_category" type="text" name="updateName">
        <button type="submit">Изменить</button>
    </form>
</div>

<div id="delete_category" class="edit_category">
    <span>Удалить категорию</span><br>
    <form id="create_category_form" class="edit_category_form" method="post" action="{{route('admin.category.destroy',['id'=>'id'])}}">
        @csrf
        @method('delete')
        <select id="select_destroy_category" name="destroyId" >
            @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
        </select>
        <button type="submit">Удалить</button>
    </form>
</div>
