@if(!empty($discussions))
    <div class="block_discussion">
        <div class="title_discussion">
            <span>Обсуждение</span>
        </div>
        <div class="inner">
            <ul class="discussion_list">
                @foreach($discussions as $discussion)
                    <li class="discussion_list">
                        <a href="#">
                            <span class="discussion_list_text">
                                {{$discussion->text}}
                            </span>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@else
    <span>Ошибка в обсуждениях</span>
@endif
