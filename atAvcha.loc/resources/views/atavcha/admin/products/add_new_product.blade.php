 <div id="add_new_product">
     <div id="" class="">
         <p>Новый продукт</p>
     </div>

     @if ($errors->any())
         <div class="alert alert-danger">
             <ul>
                 @foreach ($errors->all() as $error)
                     <li>{{ $error }}</li>
                 @endforeach
             </ul>
         </div>
     @endif

    <form id="form_product_add_new" action="{{route('admin.product.store')}}" enctype="multipart/form-data" method="post">
        @csrf
        <select name="category" class="form_product_add_new_select">
            @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
        </select>
        <p>Имя</p>
        <input type="text" name="name" value="{{ isset($old['name'])?$old['name']:'' }}">
        <p>Цена</p>
        <input type="number" name="price" value="{{ isset($old['price'])?$old['price']:'' }}">
        <p>Описание</p>
        <textarea name="description" >{{ isset($old['description'])?$old['description']:'' }}</textarea>
        <br>
        <input id="oldImg" class="img_update" type="image"  src="">
        <br>
        <input id="newImg" type="file" name="img" >
        <br>
        <button type="submit">Добавить</button>
    </form>

 </div>
