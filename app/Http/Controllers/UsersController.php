<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\DB;
class UsersController extends Controller
{
    public  function __construct()
    {
        $this->middleware(['auth', 'roles:admin']);
    }


    public function index(Request $request)
    {
        $data = User::orderBy('id','DESC')->paginate(5);
            return view('users.index',compact('data'))
                ->with('i', ($request->input('page', 1) - 1) * 5);
    }


    public function usredit($id)
    {
        $user = User::find($id);
        $roles = Role::pluck('name','id')->all();
        $userRole = $user->roles->pluck('name','name')->all();
    
        return view('users.edit',compact('user','roles','userRole'));
    }



public function update_usr(Request $request, $id)

{


 

$user = User::findOrFail($id);




$user->roles()->sync($request->roles);

return back();
}

public function newuser(Request $request)
{
    $user = new User();
    $roles = Role::pluck('name','id')->all();
    $userRole = $user->roles->pluck('name','name')->all();

    return view('users.newusr',compact('roles','userRole'));
}

public function regusr(Request $request)

{

$user = User::create($request->all());

$user->roles()->attach($request->roles);
return redirect()->route('Usr');

}



public function delete_usr($id)

{


 

$user = User::findOrFail($id);




$user->delete();

return redirect()->route('Usr');
}



}
