
<table class="table_catalog">
    <tbody>
        <tr><th>Изображение</th>
            <th>Имя</th>
            <th>ID</th>
            <th>описание</th>
            <th>Цена</th>
            <th>Добавить в корзину</th>
        </tr>
        @foreach($products as $product)
            <tr class="tr_product_catalog">
                <td class="img">
                    <a class="catalog_img_big" href="#" >
                        <img class="catalog_img" src="{{asset(env('THEME')).'/img/'.$product->img}}"  alt="img">
                    </a>
                </td>
                <td class="name" >
                    <a class="name" href="{{route('product.show',['id'=>$product->id])}}">
                        {{$product->name}}
                    </a>
                </td>
                <td class="id" >
                    <a class="id" href="{{route('product.show',['id'=>$product->id])}}">
                        {{$product->id}}
                    </a>
                </td>
                <td class="description" >
                    <a class="description" href="{{route('product.show',['id'=>$product->id])}}">
                        {{$product->description}}
                    </a>
                </td>
                <td class="price" >
                    <a class="price" href="{{route('product.show',['id'=>$product->id])}}">
                        {{$product->price}}
                    </a>
                </td>
                <td class="basket" >
                    <a class="basket_add" href="{{route('basket.add',['id'=>$product->id])}}">
                        Добавить в корззину
                    </a>
                </td>

            </tr>
        @endforeach
    </tbody>
</table>
