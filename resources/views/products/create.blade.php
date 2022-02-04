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
                        <li class="breadcrumb-item"><a href="/productos_all">Productos</a></li>
                        <li class="breadcrumb-item active">Registro de productos</li>
                    </ol>
                </div>
                <h4 class="page-title">Registrar nuevo tipo de productos</h4>

            </div>
        </div>
    </div>
    <!-- end page title -->



    <div class="row">
        <div class="col-12">
            <div class="card-box">

                <div class="row">
                    <div class="col-lg-6">
                        <div>
                            <h4 class="header-title">Formulario de registro</h4>
                            <p class="sub-header">
                                Formulario para registrar nuevos productos.
                            </p>




                            <form action="{{route('productos_all.store')}}" method="post" id="formulario" class="form-horizontal parsley-examples">
                            {{csrf_field()}}






                                <div class="form-group" >
                                    <label for="AcuerdoName">Nombre<span class="text-danger">*</span></label>
                                    <input type="text" name="nombre"  parsley-trigger="change" required
                                     placeholder="Ingrese el nombre del nuevo producto" class="form-control" id="nombre">
                                </div>

                                <div class="form-group" >
                                    <label for="AcuerdoName">Precio<span class="text-danger">*</span></label>
                                    <input type="number" name="precio" step=".01" parsley-trigger="change" required
                                    class="form-control" id="precio">
                                </div>

                                <div class="form-group" >
                                    <label for="AcuerdoName">Impuesto<span class="text-danger">*</span></label>
                                    <input type="text" name="impuesto"  parsley-trigger="change" required
                                    class="form-control" id="impuesto">
                                </div>
                                 </div>






                                <div class="form-group text-right mb-0">
                                    <button class="btn btn-primary waves-effect waves-light mr-1" id="submit"  type="submit">
                                        Guardar
                                    </button>
                                    <button type="reset" onclick="location.href='/productos_all'" class="btn btn-secondary waves-effect">
                                        Cancelar
                                    </button>
                                </div>

                            </form>
                        </div>

                    </div>
                </div>
             </div>

        </div>
    </div> <!-- end row -->








</div> <!-- end container-fluid -->
            @stop
