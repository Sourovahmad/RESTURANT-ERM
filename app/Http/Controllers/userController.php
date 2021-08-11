<?php

namespace App\Http\Controllers;

use App\Models\role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class userController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $users = User::all();
         $roles = role::all();
         return view('admin.user.index',compact('users','roles'));

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

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required',
        ]);

     $requestEmail = User::where('email',$request->email)->get();


     if($requestEmail->count() == 0){

        $user = new user;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->name);
        $user->role_id = $request->role;
        $user->save();
        return back()->withSuccess('User Created Successfully');

     }
     return back()->withErrors('Sorry!. Email Already has been used');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        if($user->id != 1){

            if($user->role_id != 4){

                $user->role_id = 4;
                $user->save();
                return back()->withSuccess('User Role Has been Removed');

            }else{
                return back()->withErrors('The User already in Pending Mode');
            }
        }else{
            return back()->withErrors('Super Admin Undeletable');
        }




    }



}
