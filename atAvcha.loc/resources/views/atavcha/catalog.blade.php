@if(isset($products))
    <div class="block_catalog">
            <div class="catalog_view" id="catalog_view">
                    <div id="table_catalog">
                        @include(env('THEME').'.show_table_content')
                    </div>
            </div>
    </div>
@endif
