<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

        $this->notification_title = "User Created";
        $this->notification_body = "New user has been created successfully.";
        $this->sendNotification($this->notification_title , $this->notification_body);
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
            $user = tap(User::find(auth()->id()))->update([
                'device_token' => $request->token
            ]);
            // Auth::user()->update(['device_token'=>$request->token]);
            return response()->json(['Token successfully stored.']);
        }catch(\Exception $e){
            report($e);
            return response()->json([
                'success'=>false
            ],500);
        }
    }


    public function sendNotification($notification_title , $notification_body)
    {
        $url = 'https://fcm.googleapis.com/fcm/send';
        $FcmToken = User::whereNotNull('device_token')->pluck('device_token')->all();
        $FcmToken = User::where('id',9)->pluck('device_token')->all();
        // dd($FcmToken);
        $serverKey = env('FCM_SERVER_KEY');

  
        $data = [
            "registration_ids" => $FcmToken,
            "notification" => [
                "title" =>$notification_title,
                "body" => $notification_body,  
            ]
        ];
        $encodedData = json_encode($data);
    
        $headers = [
            'Authorization:key=' . $serverKey,
            'Content-Type: application/json',
        ];
    
        $ch = curl_init();
      
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
        // Disabling SSL Certificate support temporarly
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);        
        curl_setopt($ch, CURLOPT_POSTFIELDS, $encodedData);

        // Execute post
        $result = curl_exec($ch);

        if ($result === FALSE) {
            die('Curl failed: ' . curl_error($ch));
        }        

        // Close connection
        curl_close($ch);

        // FCM response
        dd($result);        
    }
}
