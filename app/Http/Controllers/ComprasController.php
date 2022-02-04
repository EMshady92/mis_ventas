<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductosModel;
use App\Models\ComprasModel;
use DB;
use Illuminate\Support\Facades\Auth;
class ComprasController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
    }


    public function compras()
    {

        $clientes=DB::table('compras')
        ->join('users','users.id','=','compras.id_user')
        ->where('compras.estado','=','COMPRA_NO_FACTURADA')
        ->select('compras.estado','users.nombre as user_name','users.id as user_id')
        ->distinct()
        ->get();



        $facturas = DB::table('facturas')
        ->join('users','users.id','=','facturas.id_user')
        ->select('facturas.*','users.nombre as nombre_user')
        ->get();

       return view('compras.compras',['facturas'=>$facturas,'clientes'=>$clientes]);
    }

    public function compras_cliente($id)
    {


        $compras_cliente = DB::table('compras')
        ->join('productos','productos.id','=','compras.id_producto')
        ->join('users','users.id','=','compras.id_user')
        ->where('compras.id_user','=',$id)
        ->where('compras.estado','=','COMPRA_NO_FACTURADA')
        ->select('compras.*','users.tipo_usuario','users.nombre as user_name','users.id as user_id','productos.nombre as nombre_producto','productos.impuesto')
        ->get();


        return $compras_cliente;
    }
}
