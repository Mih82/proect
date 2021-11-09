<div class="categories_list">
    <ul class="categories_list_ul">
        @foreach($categories as $category)
            <li class="categories_list_li">
                <a class="categories_list_a" href="{{route('admin.category.show',['id'=>$category->id])}}">
                    {{$category->name}}
                </a>
            </li>
        @endforeach
    </ul>
</div>

@if(session('status'))
    <div  class="alert alert-success">
        {{session('status')}}
    </div>
@endif
<div >
    <span id="alert-status" class="alert-status"></span>
</div>
