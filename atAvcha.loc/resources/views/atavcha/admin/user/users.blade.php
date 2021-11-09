@extends(env('THEME').'.admin.index')

@section('content')

    @if(isset($users))
        <div class="users">
            <table class="table_users_list">
                <tbody>
                    <tr>
                        <th>Аватар</th>
                        <th>Имя</th>
                        <th>Доступ</th>
                        <th>Просмотр</th>
                    </tr>
                    @foreach($users as $user)
                        <tr>
                            <td>{{asset('THEME').'/img/'.$user->img}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->roles->first()->name}}</td>
                            <td><a href="{{route('admin.user.show',['id'=>$user->id])}}">Просмотр</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="error_users">
            <p class="error_user_p">
                Ошибка загрузки списка пользователей
            </p>
        </div>
    @endif

@endsection
