@isset($product)

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

        <form id="form_product_update" action="{{route('admin.product.update',['id'=>$product->id])}}" enctype="multipart/form-data" method="post">
            @csrf
            @method('put')
            <p>Имя</p>
            <input type="text" name="name" value="{{$product->name}}">
            <p>Цена</p>
            <input type="number" name="price" value="{{$product->price}}">
            <p>Описание</p>
            <textarea name="description" >{{$product->description}}</textarea>
            <br>
            <input id="oldImg" class="img_update" type="image"  src="{{asset(env('THEME')).'/img/'.$product->img}}">
            <input type="hidden" name="oldImg" value="{{$product->img}}">
            <br>
            <input id="newImg" type="file" name="img" >
            <br>
            <button type="submit">Изменить</button>
        </form>

@else
    <div class="error_users">
        <p class="error_user_p">
            Ошибка загрузки выбранного продукта
        </p>
    </div>
@endisset
