<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use RegistersUsers;

class UserController extends Controller
{
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return view('users.users',compact('users'));
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
        $u = new User;
        $u->name = $request->input('name');
        $u->email = $request->input('email');
        if($request->input('password') == $request->input('confirmPassword')){
            $u->password = bcrypt($request->input('password'));
        }
        else{
            return redirect()->
            route('user.register')->
            with('errorPassword', 'No coinciden las contraseñas ingresadas.');
        }
        $u->save();

        return redirect()
        ->route('home')
        ->with('userCreado', 'El usuario ha sido creado con éxito!');
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
    public function edit($id)
    {
        $u = User::where('id',$id)->first();
        return view('users.editarUsuario',compact('u'));
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
        //dd($request);
        $u = User::findOrFail($id);
        $u->name = $request->input('username');
        $u->email = $request->input('email');
        if($request->input('password') == $request->input('confirmPassword')){
            $u->password = bcrypt($request->input('password'));
        }
        else{
            return redirect()->
            route('user.edit', $id)->
            with('errorPassword', 'No coinciden las contraseñas ingresadas.');
        }

        $u->update();

        return redirect()->
        route('user.index')->
        with('userEditado', 'Se ha editado el usuario con éxito!!!.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::findOrFail($id)->delete();

        return redirect()
        ->route('user.index')
        ->with('userEliminado', 'El usuario se eliminó correctamente!');
    }
}
