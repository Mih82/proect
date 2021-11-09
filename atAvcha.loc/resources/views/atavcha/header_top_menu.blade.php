
<div class="block_top_menu">
    <div class="inner">
        <div class="email">
            <a href="#">atAvcha@mail.ru</a>
        </div>
        <div class="phone">
            <a href="tel:8888888888888">8-888-888-88-88</a>
        </div>
        <div class="login_ot_reg">
            <span class="enter_admin">
                @can('entry', $user )
                    <a href="{{route('adminIndex')}}" >Войти в админку</a>
                @endcan
            </span>
            <span class="links">
                @if(Auth::check())
                    {{Auth::user()->name}}
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
</div>
