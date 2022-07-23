<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TrainingCenter;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TrainingCenterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $training_centers = TrainingCenter::all();
        return view ('backend.system.training-center.index',compact('training_centers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('backend.system.training-center.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $error = $request->validate([
            'en_name' => 'required | unique:training_centers,en_name',
            'np_name' => 'required',
            'website_url' => 'nullable',
            'address' => 'required',
            'contact_number' => 'required',
            'email' => 'required',
            'company_logo' => 'nullable',
        ]);
        $training_center = TrainingCenter::create([
            'en_name' => $request->en_name,
            'np_name' => $request->np_name ?? $request->en_name,
            'website_url' => $request->website_url,
            'address' => $request->address,
            'contact_number' => $request->contact_number,
            'email' => $request->email,
            'slug' => Str::slug($request->en_name),
            'user_id' =>auth()->id(),
            'company_logo' => $request->company_logo
        ]);
        return redirect()->route('admin.training-centers.index')->with('success','Training center Created Successfully');
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
        $training_center = TrainingCenter::find($id);
        return view ('backend.system.training-center.edit',compact('training_center'));
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
            'en_name' => 'required | unique:training_centers,en_name,'.$id,
            'np_name' => 'required',
            'website_url' => 'nullable',
            'address' => 'required',
            'contact_number' => 'required',
            'email' => 'required',
            'company_logo' => 'nullable',
        ]);

        $training_center = TrainingCenter::find($id);
        $training_center_update = tap($training_center)->update([
            'en_name' => $request->en_name,
            'np_name' => $request->np_name ?? $request->en_name,
            'website_url' => $request->website_url,
            'address' => $request->address,
            'contact_number' => $request->contact_number,
            'email' => $request->email,
            'slug' => Str::slug($request->en_name),
            'user_id' => $request->user_id ?? $training_center->user_id
        ]);

        return redirect()->route('admin.training-centers.index')->with('message','Training center updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $training_center=TrainingCenter::find($id);
        $training_center->delete();
        return redirect()->back()->with('message','Training Center deleted successfully!');
    }
}
