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
                        <li class="breadcrumb-item active">Edición productos</li>
                    </ol>
                </div>
                <h4 class="page-title">Editar producto</h4>

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
                            <h4 class="header-title">Formulario de producto</h4>
                            <p class="sub-header">
                                Formulario para editar : {{$producto->nombre}}
                            .
                            </p>




                            <form action="{{url('/productos_all', [$producto->id])}}" id="formulario" method="post" class="form-horizontal parsley-examples" enctype="multipart/form-data" accept-charset="UTF-8" >
                            {{csrf_field()}}

							<input type="hidden" name="_method" value="PUT">

                            <div class="form-group" >
                                    <label for="AcuerdoName">Nombre<span class="text-danger">*</span></label>
                                    <input type="text" name="nombre"   parsley-trigger="change" required
                                     value="{{$producto->nombre}}" class="form-control" id="nombre">
                            </div>

                            <div class="form-group" >
                                    <label for="AcuerdoName">Precio<span class="text-danger">*</span></label>
                                    <input type="number" name="precio" step=".01"  parsley-trigger="change" required
                                    value="{{$producto->precio}}" class="form-control" id="precio">
                            </div>

                            <div class="form-group" >
                                <label for="AcuerdoName">Impuesto<span class="text-danger">*</span></label>
                                <input type="number" name="impuesto"  parsley-trigger="change" required
                                value="{{$producto->impuesto}}" class="form-control" id="impuesto">
                            </div>

                        </div>




                                <div class="form-group text-right mb-0">
                                    <button class="btn btn-primary waves-effect waves-light mr-1"  id="submit" type="submit">
                                        Guardar
                                    </button>
                                    <button type="reset" onclick="location.href='/catalogo_citas    '" class="btn btn-secondary waves-effect">
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


<script type="text/javascript">


</script>
@endsection
