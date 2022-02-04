<?php

namespace App\Http\Controllers;
use App\Models\ProductosModel;
use App\Models\ComprasModel;
use App\Models\FacturasModel;
use DB;
use Illuminate\Http\Request;

class FacturasController extends Controller
{
    public function facturar($id)
    {

        $compras_cliente = DB::table('compras')
        ->join('productos','productos.id','=','compras.id_producto')
        ->join('users','users.id','=','compras.id_user')
        ->where('compras.id_user','=',$id)
        ->where('compras.estado','=','COMPRA_NO_FACTURADA')
        ->select('compras.*','users.tipo_usuario','users.nombre as user_name','productos.nombre as nombre_producto','productos.impuesto','productos.impuesto')
        ->get();


        $total_precio = 0;
        foreach($compras_cliente as $compra_precio){
            $total_precio = $compra_precio->total_precio + $total_precio;

        }

        $total_impuestos = 0;
        foreach($compras_cliente as $compra_impuesto){
            $total_impuestos = $compra_impuesto->impuesto + $total_impuestos;

        }


            $factura= new FacturasModel;
            $factura->id_user=$id;
            $factura->total_precio=$total_precio;
            $factura->total_impuesto=$total_impuestos;
            $factura->estado="ACTIVO";
            $factura->save();

            if($factura->save()){
                foreach( $compras_cliente as $compra_cliente){
                    $compra=ComprasModel::findOrFail($compra_cliente->id);
                    $compra->id_factura = $factura->id;
                    $compra->estado = "COMPRA_FACTURADA";
                    $compra->update();
                }


                if($compra->update()){
                return response()->json(['factura'=>$factura]);
                }else{
                return false;
                }

            }else{
            return false;
            }


    }

        public function ver_factura($id)
    {

        $facturas = DB::table('facturas')
        ->join('users','users.id','=','facturas.id_user')
        ->join('compras','compras.id_factura','=','facturas.id')
        ->where('facturas.id','=',$id)
        ->select('facturas.*','users.nombre as nombre_user')
        ->first();

        $compras = DB::table('compras')
        ->join('productos','productos.id','=','compras.id_producto')
        ->join('users','users.id','=','compras.id_user')
        ->where('compras.id_factura','=',$id)
        ->where('compras.estado','=','COMPRA_FACTURADA')
        ->select('compras.*','users.tipo_usuario','users.nombre as user_name','productos.nombre as nombre_producto','productos.impuesto','productos.impuesto')
        ->orderby('compras.created_at','ASC')
        ->get();

        //var_dump($compras);

       return view('facturas.ver_factura',['facturas'=>$facturas,'compras'=>$compras]);
    }
}
