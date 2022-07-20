<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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
        return view ('backend.system.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('backend.system.users.create');
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
            'en_name' => 'required | unique:users,en_name',
            'np_name' => 'required',
            'gender' => 'required',
            'designation' => 'required',
            'address' => 'required',
            'contact_number' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        $user = User::create([
            'en_name' => $request->en_name,
            'np_name' => $request->np_name,
            'gender' => $request->gender,
            'designation' => $request->designation,
            'address' => $request->address,
            'contact_number' => $request->contact_number,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'slug' => Str::slug($request->en_name),
        ]);
        return redirect()->route('admin.users.index')->with('success','User Created Successfully');
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
        $user = User::find($id);
        return view ('backend.system.users.edit',compact('user'));
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
        $request->validate([
            'en_name' => 'required | unique:users,en_name,'.$id,
            'np_name' => 'required',
            'gender' => 'required',
            'designation' => 'required',
            'address' => 'required',
            'contact_number' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        $user = tap(User::find($id))->update([
            'en_name' => $request->en_name,
            'np_name' => $request->np_name,
            'gender' => $request->gender,
            'designation' => $request->designation,
            'address' => $request->address,
            'contact_number' => $request->contact_number,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'slug' => Str::slug($request->en_name),
        ]);

        return redirect()->route('admin.users.index')->with('message','User updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user=User::find($id);
        $user->delete();
        return redirect()->back()->with('message','User deleted successfully!');
    }

    public function updateToken(Request $request){
        try{
            $request->user()->update(['device_token'=>$request->token]);
            return response()->json([
                'success'=>true
            ]);
        }catch(\Exception $e){
            report($e);
            return response()->json([
                'success'=>false
            ],500);
        }
    }
}
