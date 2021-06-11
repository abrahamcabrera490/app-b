<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Model\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
//use Illuminate\Http\File;
use Illuminate\Support\Facades\Response as FacadeResponse;
use Illuminate\Support\Facades\File;



class UsersTicket extends Controller
{
    

public function __construct()
{
    $this->middleware(['auth','roles:admin,user']);
}


public function index(Request $request)
{
    return view('tickets.index');
}


public function newticket(Request $request)
{
    
$file = $request->file('upload_file');
$user  = $request->input('user');
$dpto = $request->input('dpto');
$task = $request->input('task');
$dtime  = $request->input('date');
$status = 'pendiente';



    $file_name  = time().$file->getClientOriginalName();
    Storage::disk('images')->put($file_name, File::get($file));

$inset = DB::table('ticket')->insert(array(
    'user_name' => $user,
    'dpto' => $dpto,
    'updated_at' => $dtime,
    'task'  => $task,
    'image_work_before' => $file_name,
    'status' => $status,
));

return redirect('/home');
}

public function orders_show(Request $request)
{
    $data = DB::table('ticket') ->get();
    return view('tickets.orders',compact('data'));
}


public function run_ticket($id)
{


$data = DB::table('ticket')->get()->where('id', $id);

return view('tickets.run',compact('data'));
}

public function watch_image($filename)
{

$file = Storage::disk('images')->get($filename);

return new Response($file, 200);

}



}
