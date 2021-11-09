<div class="header_menu">
    <div id="user">
        <div class="login_ot_reg">
            <span class="links">
                @if(Auth::check())
                    <div id="name_user">
                        <p> Пользователь: {{Auth::user()->name}}</p>
                    </div>
                    <form action="{{route('logout')}}" method="POST">
                         @csrf
                         <button type="submit">Выйти</button>
                     </form>
                @else
                    <a href="{{route('login')}}">Вход</a>
                    /
                    <a href="{{route('register')}}">Регистрация</a>
                @endif
            </span>
        </div>
    </div>
    <div class="div_list_menu">
        <ul class="ul_list">
            <li class="li_list">
                <a class="a_list" href="{{route('index.index')}}">
                    <span >У Авчи</span>
                </a>
            </li>
            <li class="li_list">
                <a class="a_list" href="{{route('admin.user.index')}}">
                    <span >Пользователи</span>
                </a>
            </li>
            <li class="li_list">
                <a class="a_list" href="{{route('admin.category.index')}}">
                    <span >Категории</span>
                </a>
            </li>
            <li class="li_list">
                <a class="a_list" href="{{route('admin.basket.index')}}">
                    <span >Корзина</span>
                </a>
            </li>
        </ul>
    </div>
</div>

</div>
@if(session('status'))
    <div class="alert alert-success">
        {{session('status')}}
    </div>
@endif

@if ($errors->any())
    <ul class="alert alert-danger">

        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

