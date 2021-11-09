{{--<div id="discussion-text">--}}
    @isset( $discussions )
        <ul class="discussion_text_ul">
        @foreach($discussions as $discussion)
            <li class="li-discussion">
                <p>-----------------------------</p>
                Имя: {{$discussion['name']}}</br>
                Содержание:</br> {{$discussion['text']}}</br>
                <div id="box_open_form" class="">
                    <div id="box_form"> </div>
                    <a id="open_form" class="open_form" href="{{ route('discussion.get_form',[ 'id' => $discussion['id']] ) }}">Добавить комент</a>
                </div>
                <div class="children-discussion">
                    @isset( $discus[$discussion['id']] )
                            @include(env('THEME').'.collect_discussions',[ 'discussions'=>$discus[$discussion['id']] ])
                    @endisset
                </div>
            </li>
            @endforeach
        </ul>
    @else
        <h1>Ошибка</h1>
    @endisset

{{--</div>--}}

