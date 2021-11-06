<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class LogisticaController extends Controller
{

    function __construct()
    {
        $this->middleware(['auth', 'roles:logistica']);
    }

public function index()
{

    $data2 = DB::table('tbl_logistica') ->get();
    $data = DB::table('logistica') ->get();
    return view('logistica.index',compact('data','data2'));
}


public function consultaf(Request $request)
{
    $mes = $request->input('month');
    $mesii = $request->input('month2');
    $resultado= DB::select("SELECT * FROM logistica WHERE DATE_FORMAT(fecha, '%Y-%m') = '$mes'");
    $resultadoii= DB::select("SELECT * FROM logistica WHERE DATE_FORMAT(fecha, '%Y-%m') = '$mesii'");

     $concentrado  = array();

     $concentrado[] = $resultado;
     $concentrado[] = $resultadoii;


    return response(json_encode($concentrado),200)->header('content-type','text/plain');
}



public function prom(Request $request)
{

    $mespasado= DB::select("SELECT AVG(eventos) AS PROM1 FROM  logistica WHERE MONTH(fecha)=  MONTH(NOW())-1");
    $fechaactual= DB::select("SELECT AVG(eventos) as PROM2 FROM  logistica WHERE MONTH(fecha)=  MONTH(NOW())");
    
   foreach($mespasado as $x)
   {
       $op1 = $x->PROM1;
   }

   foreach($fechaactual as $y)
   {
       $op2 = $y->PROM2;
   }

$promedio=($op2*100)/$op1;
  
return response(json_encode($promedio),200)->header('content-type','text/plain');
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

$des = $request->input('des1');
$obs =  $request->input('Observaciones');
$eventos = $request->input('eventos');
$inicio = count($des);
$fecha = date('Y-m-d');
for($i = 0; $i<$inicio; $i++)
{
    $indicador = DB::table('logistica')->insert(array(
        'description' => $des[$i],
        'observaciones' => $obs[$i],
        'eventos' => $eventos[$i],
        'user_name' => auth()->user()->name,
        'fecha'=> $fecha
    ));
}
        
return redirect('/logistica');
    }//finde la fun

}
