<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\TaskAssign;
use Auth;
use Hash;
Use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth::user()->role == 'admin'){
            $tasks = TaskAssign::orderBy('id','desc')->paginate(10);
        }else{
            $tasks = TaskAssign::where('user_id',Auth::user()->id)->orderBy('id','desc')->paginate(10);
        }
        return view('backend.layouts.dashboard', compact('tasks'));
    }

    public function store(Request $request){
        
       if ($request->password) {
            $data = [
                'name'   => $request->name,
                'email'  => $request->email,
                'phone'  => $request->phone,
                'password'=> Hash::make($request->password),
            ];
        } else {
            $data = [
                'name'   => $request->name,
                'email'  => $request->email,
                'phone'  => $request->phone,
                'password' => Auth::user()->password,
            ];
        }
        
        User::where('id', Auth::user()->id)->update($data);
        return back()->with('message','Profile Update Successfully');
    }
}
