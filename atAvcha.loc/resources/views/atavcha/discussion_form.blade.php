<div id="discussion_box_form">
    {{ Form::open(['url'=>route('discussion.store'), 'method'=> 'post','id'=>'discussion_form','class'=>'discussion_form']) }}
        @csrf
        <div class="">
            {{ Form::hidden('parent_id', ( !empty($discussion['id']) ? $discussion['id'] : 0 ) ) }}
        </div>
        <div class="">
            {{ Form::hidden('product_id', ( !empty($product['id']) ? $product['id'] : 0 ) ) }}
        </div>
        <div class="">
            {{ Form::hidden('user_id', ( !empty( Auth::user() ) ? Auth::user()->id :  51 ) ) }}
        </div>
        <div class="">
            Имя
            {{ Form::text('name', !empty( Auth::user() )? Auth::user()->name : 'No name', ['class'=>'', 'placeholder'=>'Введите имя']) }}
        </div>
        <div class="">
            Текст
            {{ Form::text('text') }}
        </div>
        <div class="">
            {{ Form::submit() }}
        </div>
    {{ Form::close() }}
</div>
