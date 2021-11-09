@extends(env('THEME').'.admin.index')

@section('content')

    @if(isset($user))
        <div class="users">
            <div class="div-user-table">
                <table class="table_users_list">
                    <tbody>
                    <tr>
                        <th>Аватар</th>
                        <th>Имя</th>
                        <th>Доступ</th>
                        <th>Destroy</th>
                    </tr>
                        <tr>
                            <td>{{asset('THEME').$user->img}}</td>
                            <td>{{$user->name}}</td>
                            <td>
                                <span class="role_user_span">
                                    <a class="role_user_a" href="{{route('admin.role.show',['id'=>$user->id])}}">{{$user->roles->first()->name}}</a>
                                </span>
                            </td>
                            <td>
                                <form class="form_destroy_user" action="{{route('admin.user.destroy',['id'=>$user->id])}}" method="POST">
                                    <input id="method" type="hidden" name="_method" value="delete">
                                    <input id="token" type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <button type="submit">Delete</button>
                                </form>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    @else
        <div class="error_users">
            <p class="error_user_p">
                Ошибка загрузки пользователя
            </p>
        </div>
    @endif

@endsection

