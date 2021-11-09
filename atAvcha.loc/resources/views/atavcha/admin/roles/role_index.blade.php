@isset($roles)
    <form class="form_update_role_user" action="{{route('admin.role.update',['id'=>$id])}}" method="POST">

        <select class="roles_list_select" name="role">
            @foreach($roles as $role)
                {{ ($role->id == $userRole) ? $select = 'selected' : $select = "" }}
                <option value="{{$role->id}}" {{$select}} >{{$role->name}} </option>
            @endforeach
        </select>
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <input type="hidden" name="_method" value="put">
    </form>
@endisset
