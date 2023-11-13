<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $users = User::where('is_admin', 1)->latest('id')->paginate(10);

        return view('admin.users.index',compact('users'));
    }



    public function create(){

        return view('admin.users.create');
    }


    public function store(Request $request){
        $request->validate([
            'name'                  => 'required',
            'email'                 => 'required|unique:users',
            'phone'                 => 'required',
            'password_confirmation' => 'required',
            'password'              => 'required|confirmed',
            'avater'                => 'nullable|file|image|mimes:jpeg,png,jpg,gif,svg',
        ]);


        $user = User::create([
            'name'                  => $request->name,
            'email'                 => $request->email,
            'phone'                 => $request->phone,
            'password'              => bcrypt($request->password),
            'is_admin'              => 1,
        ]);

        if ($request->hasFile('avater')){
            
            $image = $request->file('avater');
            $image_name = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('uploads/admin/avater'), $image_name);

            $user->avater = 'uploads/admin/avater/'.$image_name;
            $user->save();
        }


        return redirect()->route('admin.users.index')->with('success','User Created Successfully');


    }


    

    public function destroy($id){
        
        $user = User::findOrFail($id);

        if ($user->email == auth()->user()->email){
            return response()->json([
                'error'=>'You can not delete yourself'
            ],422);
        }{
            $user->delete();
            return response()->json([
                'success'=>'User Deleted Successfully'
            ],202);
        }
    }
}
