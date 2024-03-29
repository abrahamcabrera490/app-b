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


if(empty($file))

{

$file_name = " ";


}
else
{
    $file_name  = time().$file->getClientOriginalName();
    Storage::disk('images')->put($file_name, File::get($file));

}
    
$inset = DB::table('ticket')->insert(array(
    'user_name' => $user,
    'dpto' => $dpto,
    'updated_at' => $dtime,
    'task'  => $task,
    'image_work_before' => $file_name,
    'status' => $status,
    'priority' => 'P/A',
    'date_time' => date("Y-m-d H:i:s"),
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






public function close_ticket(Request $request, $id)
{

 
$realtime = $request->input('date');
$decription = $request->input('description');
$tools = $request->input('tools');
$file = $request->file('upload_file');
$firm = $request->input('firm');
if(empty($file))

{

$file_name = " ";


}
else
{
    $file_name  = time().$file->getClientOriginalName();
    Storage::disk('images')->put($file_name, File::get($file));

}
    

$update =DB::table('ticket')->where('id',$id)->update(array(


"real_delivery_time"  => $realtime,
"firm_path"  => $firm,
"description_work"=> $decription,
"image_work_after" => $file_name,
"used_material" => $tools,
"status" => 'realizado',


/*
"real_delivery_time"  => null,
"firm_path"  => null,
"description_work"=> null,
"image_work_after" => null,
"used_material" => null,
"status" => 'pendiente',
*/

));
return redirect('/home');
}



public function print($id)
{


$data = DB::table('ticket')->get()->where('id', $id);

return view('tickets.order',compact('data'));
}
public function task_priority($id)
{


$data = DB::table('ticket')->get()->where('id', $id);

return view('tickets.prioridad',compact('data'));
}

public function  assigned_prioriti(Request $request, $id)
{

    $priority = $request->input('priority');

    $data = DB::table('ticket')->get()->where('id', $id);

    $update =DB::table('ticket')->where('id',$id)->update(array(

        "priority"  => $priority,
 
        ));

    return redirect()->route('orders_show');
}

}
