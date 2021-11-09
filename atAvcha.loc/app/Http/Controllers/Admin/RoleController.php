<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Repositories\RoleRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Policies\RolePolicy;
use Gate;


class RoleController extends AdminController
{
    public function __construct( RoleRepository $roleRepository ){
        $this->roleRepository = $roleRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $roles = $this->roleRepository->all();
        if (Gate::denies('show',  $this->roleRepository->new() )){
            return response()->json(['Не хватает прав доступа для выбора!']);
        }
        $userRole = User::find($id)->roles->first()->id;

        return response()->json(view(env('THEME').'.admin.roles.role_index',['roles'=>$roles, 'id'=>$id, 'userRole'=>$userRole])->render());

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (Gate::denies('update_role',  $this->roleRepository->new() )){
            return response()->json(['Не хватает прав доступа для изменения!']);
        }
        $user = User::find($id);
        $user->roles()->sync([ $request->input('id')=> [ 'role_id' => $request->input('role')] ]);
        return response()->json(['status','ok']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
