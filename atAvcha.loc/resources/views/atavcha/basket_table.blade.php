<tbody>
    <tr>
        <th>Картинка</th>
        <th>Название</th>
        <th>Колличество</th>
        <th>Цена</th>
        <th>Удалить</th>
    </tr>@if(!empty($baskets))
        @foreach($baskets as $basket)
            <tr>
                <td>
                    <img src="{{asset(env('THEME')).$basket->attributes[0]['img']}}" height="70px">
                </td>
                <td>
                    {{$basket->name}}
                </td>
                <td>
                    <form  class="quantity_form" action="{{route('basket.update',['id'=>$basket->id])}}" method="POST">
                        <input class="quantity" type="number"   name="quantity" value="{{$basket->quantity}}">
                        <input type="hidden" name="rowId" value="{{$basket->id}}">
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    </form>
                </td>
                <td>
                    {{$basket->price}}
                </td>
                <td>
                    <a class="delete_basket_id" href="{{route('basket.delete',['id'=>$basket->id])}}">Delete</a>
                </td>
            </tr>
        @endforeach
    @endif
</tbody>
