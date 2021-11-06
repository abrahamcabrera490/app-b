<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class SistemasController extends Controller
{

    function __construct()
    {
        $this->middleware(['auth', 'roles:admin']);
    }

public function index()
{


    $data = DB::table('sistemas') ->get();
    $data2 = DB::table('tbl_administracion') ->get();
    $mespasado= DB::select("SELECT * FROM  sistemas WHERE MONTH(fecha)=  MONTH(NOW())-1");
    $fechaactual= DB::select("SELECT *  FROM  sistemas WHERE MONTH(fecha)=  MONTH(NOW())");
    return view('sistemas.index',compact('data','data2','mespasado','fechaactual'));
}
public function bf()
    {
        return view('sistemas.busca');
    }
    
    public function consultaf(Request $request)
    {
        $mes = $request->input('month');
        $mesii = $request->input('month2');
        $resultado= DB::select("SELECT * FROM sistemas WHERE DATE_FORMAT(fecha, '%Y-%m') = '$mes'");
        $resultadoii= DB::select("SELECT * FROM sistemas WHERE DATE_FORMAT(fecha, '%Y-%m') = '$mesii'");

         $concentrado  = array();

         $concentrado[] = $resultado;
         $concentrado[] = $resultadoii;


        return response(json_encode($concentrado),200)->header('content-type','text/plain');
    }
    
public function prom(Request $request)
{

    $mespasado= DB::select("SELECT AVG(eventos) AS PROM1 FROM  sistemas WHERE DATE_FORMAT(fecha, '%Y-%m')=  MONTH(NOW())-1");
    $fechaactual= DB::select("SELECT AVG(eventos) as PROM2 FROM  sistemas WHERE MONTH(fecha)=  MONTH(NOW())");
    
   foreach($mespasado as $x)
   {
       $op1 = $x->PROM1;
   }

   foreach($fechaactual as $y)
   {
       $op2 = $y->PROM2;
   }

$promedio=($op1*100)/$op2;
  
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
$fecha = date('Y-m-d');


var_dump($fecha);

$des = $request->input('des1');
$obs =  $request->input('Observaciones');
$eventos = $request->input('eventos');
$inicio = count($des);

for($i = 0; $i<$inicio; $i++)
{
    $indicador = DB::table('sistemas')->insert(array(
        'desctription' => $des[$i],
        'observaciones' => $obs[$i],
        'eventos' => $eventos[$i],
        'user_id' => auth()->user()->id,
        'fecha'=>  $fecha
    ));
}
        
return redirect('/sistemas');
    }//finde la fun



    


} //fin de la clase

