<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('user.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {        
        return view('user.create', ['user' => new User]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:users|min:3|max:250',
            'email' => 'required|unique:users|min:3|max:250',
            'password' => 'required|min:3|max:250',
        ]);

        $build = new User();
        $build->name = $request->name;
        $build->email = $request->email;
        $build->password = bcrypt($request->password);
        $build->save();

        return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {        
        return view('user.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(User $user, Request $request)
    {
        $status = ['success' => __('The update was correct!')];

        $this->validate($request, [
            'name' => 'required|min:3|max:250|unique:users,name,'.$user->id,
            'email' => 'required|min:3|max:250|unique:users,email,'.$user->id,
        ]);

        $password = $request->password ? bcrypt($request->password) : false;
        
        $user->name = $request->name;
        $user->email = $request->email;
        if($password) $user->password = $password;
        $user->push();

        return redirect()->back()->with($status);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $status = ['success' => __('The delete was correct!')];
        Build::destroy($id);        
        return redirect()->back()->with($status);
    }
}
