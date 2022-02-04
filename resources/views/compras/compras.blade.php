@extends('layouts.principal')
@section('contenido')
<!-- Start Content-->
@inject('metodo','App\Http\Controllers\ComprasController')
<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="/">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="/compras">Compras</a></li>
                        <li class="breadcrumb-item active">Listado de compras</li>
                    </ol>
                </div>
                <h4 class="page-title">Listado de facturas</h4>

            </div>
        </div>
    </div>
    <!-- end page title -->

    @foreach($clientes as $cliente)
    @if ($cliente->estado == 'COMPRA_NO_FACTURADA')
    <h3>Compras de: {{$cliente->user_name}}</h3>
    <?php  $compras_cliente=$metodo->compras_cliente($cliente->user_id) ?>
    <div class="row">
        <div class="col-12">
            <div class="card-box">
                <h4 class="header-title">Descarga</h4>
                <a onclick="facturar('{{$cliente->user_id}}');" class="button-list">
                    <button type="button" class="btn btn-success waves-effect waves-light">
                        <span class="btn-label"><i class="mdi mdi-plus-box"></i>
                        </span>Facturar</button>
                </a>

                <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap"
                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>Producto</th>
                            <th>Precio</th>
                            <th>Impuesto</th>
                            <th>Cliente</th>
                            <th>Estado</th>
                            <th>Fecha de compra</th>
                        </tr>
                    </thead>


                    <tbody>
                        @foreach($compras_cliente as $compra)
                        @if($compra->user_id == $cliente->user_id)
                        <tr>
                             <td>{{$compra->nombre_producto}}</td>
                            <td>{{$compra->total_precio}}</td>
                            <td>{{$compra->impuesto}}</td>
                            <td>{{$compra->user_name}}</td>
                            <td><span class="badge badge-danger">{{$compra->estado}}</span></td>
                            <td>{{$compra->created_at}}</td>

                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @endif
    @endforeach
    <!-- end row -->

    <h3>Compras facturadas</h3>
    <div class="row">
        <div class="col-12">
            <div class="card-box">
                <h4 class="header-title">Descarga</h4>


                <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap"
                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>Cliente</th>
                            <th>Precio total</th>
                            <th>Impuesto total</th>
                            <th>Ver detalles factura</th>
                            <th>Estado</th>
                            <th>Fecha de compra</th>
                        </tr>
                    </thead>


                    <tbody>
                        @foreach($facturas as $factura)
                        <tr>
                            <td>{{$factura->nombre_user}}</td>
                            <td>{{$factura->total_precio}}</td>
                            <td>{{$factura->total_impuesto}}</td>

                            <td>
                            <a  href="{{ route('ver_factura',$factura->id) }}" class="btn waves-effect waves-light btn-info" role="button">
                                <i class="mdi mdi-eye"></i></a>
                            </td>

                            <td><span class="badge badge-danger">{{$factura->estado}}</span></td>
                            <td>{{$factura->created_at}}</td>

                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- end row -->



</div> <!-- end container-fluid -->
@stop
