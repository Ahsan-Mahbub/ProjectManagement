<?php

namespace App\Http\Controllers;
use App\Models\User;
use Hash;
use Auth;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where('role', 'employee')->orderBy('id','desc')->get();
        return view('backend.file.user.list', compact('users'));
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'email'=>'email|unique:users',
        ]);
        $user = new User();
        $requested_data = $request->all();
        $user->role = 'employee';
        $user->password = Hash::make($request->m_password);
        $save = $user->fill($requested_data)->save();
        if($save){
            return back()->with('message','User Added Successfully');
        }else{
            return back()->with('error','User Added Failed!!');;
        }
    }
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('backend.file.user.edit', compact('user'));
    }
    public function update(Request $request, $id)
    {
        $update = User::findOrFail($id);
        $formData = $request->all();
        if($request->m_password){
            $update->password = Hash::make($request->m_password);
        }
        $updated = $update->fill($formData)->save();
        if($updated){
            return redirect()->route('user.list')->with('message','User Updated Successfully');
        }else{
            return back()->with('error','User Updated Failed');
        }
    }
    public function destroy($id)
    {
        $delete = User::where('id', $id)->firstorfail()->delete();
        return back()->with('message','User Successfully Deleted');
    }
}
