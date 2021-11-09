@isset($discussion)
<ul class="discussion_text_ul">
   <p>-----------------------------</p>
    <li class="li-discussion">
        Имя: {{$discussion['name']}}</br>
        Содержани:</br>
        {{$discussion['text']}}</br>
        <div id="box_open_form" class="">
            <div id="box_form"></div>
            <a id="open_form" class="open_form" href="{{ route('discussion.get_form',[ 'id' => $discussion['id']] ) }}">Добавить комент</a>
        </div>
        <div class="children-discussion">
        </div>
    </li>
</ul>
@endisset
