@if(!empty($news))
    <div class="title_news">
        <span>Новости</span>
    </div>
<div class="block_news">
    <div class="inner">
        <ul class="news_list">
            @foreach($news as $new)
                <li class="news_li">
                    <a href="#">
                        <span>{{$new['date']}}</span>
                        <span>{{$new['title']}}</span>
                        <span>{{$new['text']}}</span>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</div>
@else
    <div class="new_error">
        <span>Eror new</span>
    </div>
@endif
