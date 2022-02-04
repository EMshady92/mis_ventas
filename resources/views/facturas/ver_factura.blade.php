@extends('layouts.principal')
@section('contenido')



<!-- Start Content-->
<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="/">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="">Facturas</a></li>
                        <li class="breadcrumb-item active">Detalles de factura</li>
                    </ol>
                </div>
                <h4 class="page-title">Detalles de Factura</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <form action="#" id="form" method="post" files="true" enctype="multipart/form-data"
        class="form-horizontal parsley-examples">
        {{csrf_field()}}

        <div class="row">
            <div class="col-12">
                <div class="card-box">
                    <h4 class="header-title">Datos:</h4>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="card-box">
                                <div class="table-responsive">
                                    <table class="table table-borderless mb-0">




                                        <tr class="bg-light text-dark">
                                            <th>Nombre:</th>
                                            <td><select class="form-control" style="width: 100%" name="nombre[]"
                                                    id="nombre" data-toggle="select2" multiple="multiple" disabled>
                                                    <option selected>
                                                        {{$facturas->nombre_user}}
                                                    </option>
                                                </select></td>

                                        </tr>

                                        <tr class="bg-light text-dark">
                                            <th>Total precio:</th>
                                            <td><select class="form-control" style="width: 100%" name="total_precio[]"
                                                    id="total_precio" data-toggle="select2" multiple="multiple" disabled>
                                                    <option selected>
                                                       $ {{$facturas->total_precio}}
                                                    </option>
                                                </select></td>

                                        </tr>




                                        <tr class="bg-white text-dark">
                                            <th>Total impuesto: </th>
                                            <td id="estado"><select class="form-control " style="width: 100%"
                                                    name="total_impuesto[]" id="total_impuesto" data-toggle="select2"
                                                    multiple="multiple" disabled>

                                                    <option selected>
                                                       $ {{$facturas->total_impuesto}}
                                                    </option>

                                                </select></td>
                                        </tr>

                                        <tr class="bg-white text-dark">
                                            <th>Estado: </th>
                                            <td id="estado"><select class="form-control " style="width: 100%"
                                                    name="estado[]" id="estado" data-toggle="select2"
                                                    multiple="multiple" disabled>

                                                    <option selected>
                                                        {{$facturas->estado}}
                                                    </option>

                                                </select></td>
                                        </tr>


                                        <tr class="bg-white text-dark">
                                            <th>Fecha de captura:</th>
                                            <td id="num_exp2"><select class="form-control " style="width: 100%"
                                                    name="created[]" id="created" data-toggle="select2"
                                                    multiple="multiple" disabled>

                                                    <option selected>
                                                        {{$facturas->created_at}}
                                                    </option>

                                                </select></td>
                                        </tr>

                                        <tr class="bg-light text-dark">
                                            <th>Ultima actualización: </th>
                                            <td> <select class="form-control s " style="width: 100%"
                                                    name="updated[]" id="updated" data-toggle="select2"
                                                    multiple="multiple" disabled>
                                                    <option selected>
                                                        {{$facturas->updated_at}}
                                                    </option>

                                                </select></td>
                                        </tr>




                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="card-box">
                                <h4 class="header-title">Detalles compras</h4>

                                <div class="table-responsive">
                                    <table class="table mb-0">
                                        <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Producto</th>
                                            <th>Precio producto</th>
                                            <th>Impuesto producto</th>
                                            <th>Fecha de registro</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($compras as $compra)
                                            <tr>
                                                <td>{{$compra->user_name}}</td>
                                                <td>{{$compra->nombre_producto}}</td>
                                                <td>${{$compra->total_precio}}</td>
                                                <td>${{$compra->impuesto}}</td>
                                                <td>{{$compra->created_at}}</td>
                                            </tr>
                                            @endforeach
                                            <tr>
                                                <th></th>
                                                <th></th>
                                                <th>Precio total</th>
                                                <th>Impuesto total</th>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td>$ {{$facturas->total_precio}}</td>
                                                <td>$ {{$facturas->total_impuesto}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>

                    </div>
                    <!--Fin del row -->

                </div>
            </div>


        </div>
        <!-- end row -->





    </form>

</div> <!-- end container-fluid -->

@stop
