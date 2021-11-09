
@include(env('THEME').'.admin.categories.categories_list')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

{{session('status')}}

<table class="table_products">
<tbody>
<tr class="tr_product_catalog">
    <th>Изображение</th>
    <th>Имя</th>
    <th>ID</th>
    <th>описание</th>
    <th>Цена</th>
    <th>Редактировать</th>
    <th>Удалить</th>
</tr>

@foreach($products as $product)
            <tr class="tr_product_catalog">
                <td class="img">
                    <a class="catalog_img_big" href="#" >
                        <img class="catalog_img" src="{{asset(env('THEME')).'/img/'.$product->img}}"  alt="img">
                    </a>
                </td>
                <td class="name" >
                    {{$product->name}}
                </td>
                <td class="id" >
                    {{$product->id}}
                </td>
                <td class="description" >
                    {{$product->description}}
                </td>
                <td class="price" >
                    {{$product->price}}
                </td>
                <td class="show" >
                    <a class="product_show_a" href="{{route('admin.product.show',['id'=>$product->id])}}">
                         <p>Редактировать</p>
                    </a>
                </td>
                <td class="destroy" >
                    <form id="form_destroy_product" class="" method="post" action="{{route('admin.product.destroy',['id'=>$product->id])}}">
                        @csrf
                        @method('delete')
                        <button type="submit">Удалить</button>
                    </form>
                </td>
            </tr>
    @endforeach
</tbody>
</table>
