<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class SeguridadController extends Controller
{

    function __construct()
    {
        $this->middleware(['auth', 'roles:seguridad,admin']);
    }

public function index()
{

    $data2 = DB::table('tbl_seguridad') ->get();
    $data = DB::table('seguridad') ->get();
    return view('seguridad.index',compact('data','data2'));
}

 public function consultaf(Request $request)
    {
        $mes = $request->input('month');
        $mesii = $request->input('month2');
        $resultado= DB::select("SELECT * FROM seguridad WHERE DATE_FORMAT(fecha, '%Y-%m') = '$mes'");
        $resultadoii= DB::select("SELECT * FROM seguridad WHERE DATE_FORMAT(fecha, '%Y-%m') = '$mesii'");

         $concentrado  = array();

         $concentrado[] = $resultado;
         $concentrado[] = $resultadoii;


        return response(json_encode($concentrado),200)->header('content-type','text/plain');
    }


public function cap(Request $request)    {

    request()->validate([
        'des1' => 'required',
        'Observaciones' => 'required',
        'eventos' => 'required',
    ]);


$des = [];
$obs = [];
$eventos = [];
$fecha = date('Y-m-d');
$des = $request->input('des1');
$obs =  $request->input('Observaciones');
$eventos = $request->input('eventos');
$inicio = count($des);

for($i = 0; $i<$inicio; $i++)
{
    $indicador = DB::table('seguridad')->insert(array(
        'description' => $des[$i],
        'observaciones' => $obs[$i],
        'eventos' => $eventos[$i],
        'user_name' => auth()->user()->name,
        'fecha'=> $fecha
    ));
}
        
return redirect('/seguridad');
    }//finde la fun


   

}
