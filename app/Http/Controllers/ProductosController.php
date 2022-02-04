<?php
namespace App\Http\Controllers;
use App\Models\ProductosModel;
use App\Models\ComprasModel;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
class ProductosController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = DB::table('productos')
        ->get();
        return view('products.index',['productos'=>$productos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $user=Auth::user();
        $producto= new ProductosModel;
        $producto->nombre=$request->get('nombre');
        $producto->precio=$request->get('precio');
        $producto->impuesto=$request->get('impuesto');
        $producto->estado="ACTIVO";
        $producto->save();

        if($producto->save()){
            return Redirect::to('productos_all')->with('errors','Registro guardado correctamente');
        }else{
           return false;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Auth::user()->tipo_usuario == "ADMINISTRADOR"){
            $producto= ProductosModel::findOrFail($id);
            return view('products.edit',['producto'=>$producto]);
          }else{
            return Redirect::to('welcome');
              }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(Auth::user()->tipo_usuario == "ADMINISTRADOR"){
            $user=Auth::user();
            $producto= ProductosModel::findOrFail($id);
            $producto->nombre=$request->get('nombre');
            $producto->precio=$request->get('precio');
            $producto->impuesto=$request->get('impuesto');
            $producto->estado="ACTIVO";
            $producto->update();

            return Redirect::to('productos_all')->with('errors','Registro actualizado correctamente');
            //
          }else{
            return false;
              }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Auth::user()->tipo_usuario == "ADMINISTRADOR"){
            $user=Auth::user();
            $tipo= ProductosModel::findOrFail($id);
            $tipo->estado="INACTIVO";
            $tipo->update();

            return Redirect::to('productos_all')->with('errors','Registro inactivado correctamente');

          }else{
            return false;
              }
    }




    public function productos()
    {
        $productos = DB::table('productos')
        ->where('estado','=','ACTIVO')
        ->get();
        return view('products.productos',['productos'=>$productos]);
    }

    public function comprar(Request $request,$id){

         $precio = ProductosModel::findOrFail($id)->precio;
         $user=Auth::user();

         $compra= new ComprasModel;
         $compra->id_producto=$id;
         $compra->id_user=$user->id;
         $compra->total_precio=$precio;
         $compra->estado="COMPRA_NO_FACTURADA";
         $compra->save();

         if($compra->save()){
            return response()->json(['compra'=>$compra]);
         }else{
            return false;
         }
    }

    public function productos_index()
    {

    }
}
