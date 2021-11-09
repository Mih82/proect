@extends(env('THEME').'.admin.index')


@section('content')

    <ul id="add_Category_product" class="categories_list_ul">
        <li class="li_list">
            <a id="add_category" class="a_list" href="{{route('admin.category.create')}}">
                Изменить категорию
            </a>
        </li>
        <li class="li_list">
            <a id="add_product" class="a_list" href="{{route('admin.product.create')}}">
                Добавить продукт
            </a>
        </li>
    </ul>

    @if(isset($categories))
        <div class="categories">
            <span id="products">
                <div class="products">
                    <span id="products">
                        @isset($products)
                            {!!$products!!}
                        @endisset
                    </span>
                </div>
            </span>
        </div>

    @else
        <div class="error_categories">
            <p class="error_categories_p">
                Ошибка загрузки списка категорий
            </p>
        </div>
    @endif

@endsection
