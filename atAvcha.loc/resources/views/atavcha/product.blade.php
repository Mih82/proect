@isset($product)
    <div class="block_product_detailed">
        <div class="detailed_detailed_view" id="catalog-detailed_view">
            <table class="table_producte">
                <tr><th>Изображение</th>
                    <th>Имя</th>
                    <th>ID</th>
                    <th>описание</th>
                    <th>Цена</th>
                </tr>
                    <tr>
                        <td class="product_td_img">
                            <a class="catalog_img_big" href="#" >
                                <img class="catalog_img" src="{{asset(env('THEME')).$product->img}}" width="40%" alt="img">
                            </a>
                        </td>
                        <td class="catalog_name" >{{$product->name}}</td>
                        <td class="catalog_name" >{{$product->id}}</td>
                        <td class="catalog_description" >{{$product->description}}</td>
                        <td class="catalog_price" >{{$product->price}}</td>
                    </tr>
            </table>
        </div>
    </div>
@endif

