<table class="table_catalog">
        <tbody>
    <tr><th>Изображение</th>
        <th>Имя</th>
        <th>ID</th>
        <th>описание</th>
        <th>Цена</th>
        <th>Добавить в корзину</th>
    </tr>
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
            <td class="basket" >
                <a class="basket_add" href="{{route('basket.add',['id'=>$product->id])}}">
                    Добавить в корзину
                </a>
            </td>

        </tr>
    </tbody>
</table>
@include(env('THEME').'.discussions')
