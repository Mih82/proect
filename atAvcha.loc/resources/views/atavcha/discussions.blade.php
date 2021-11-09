<h1>Обсуждение</h1>

@if(!empty($product))
    <div class="children-discussion">
        @isset($discus)
                @foreach($discus as $key=>$discussion)
                    @if( $key !=0 )
                        @break
                        @endif

                        @include(env('THEME').'.collect_discussions',[ 'discussions'=>$discussion ])

                @endforeach
            @endisset
    </div>
    @include(env('THEME').'.discussion_form')

@else
    <span>Ошибка в обсуждениях</span>
@endif
