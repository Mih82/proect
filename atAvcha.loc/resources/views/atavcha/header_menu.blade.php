@if( isset($contents) )
    <div class="block_menu">
        <div class="inner">
            <ul class="menu_list">
                @foreach($contents as $content)
                    <li class="li">
                        <a class="show_catalog_href" href="{{ route('index.show', ['catalog_id'=>$content->id ]) }}">
                            {{ $content->name  }}
                        </a>
                    </li>
                @endforeach
                <li class="li"><a href="#">ДОСТАВКА</a> </li>
            </ul>
        </div>
    </div>
@else
    <div class="error_header_menu">
        <li class="li"><a href="{{ route('index.index') }}">Каталог</a></li>
    </div>
@endif
