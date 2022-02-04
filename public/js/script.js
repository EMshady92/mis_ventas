function comprar(id) {
    $.ajax({ //inicio ajax
        type: "GET", //tipo get
        method: 'get', //metodo get
        url: "/comprar/" + id, //declaro la ruta y los valores que mandara

        success: function (data) {
            //mensaje de confirmacion
            Swal.fire(
                'Exito!',
                'Compra registrada correctamente',
                'success'
            )


        }

    });
}

function facturar(id) {
    $.ajax({ //inicio ajax
        type: "GET", //tipo get
        method: 'get', //metodo get
        url: "/facturar/" + id, //declaro la ruta y los valores que mandara

        success: function (data) {
            //mensaje de confirmacion
            Swal.fire(
                'Exito!',
                'Factura registrada correctamente',
                'success'
            )


        }

    });
    setTimeout(function () { location.reload() }, 1000);
}

//FUNCION PARA INACTIVAR REGISTROS// AUX ES LA RUTA QUE RECIBE
function inactivar(id, aux) {
    Swal.fire({
        title: '¿Estás seguro?',
        text: "Se inactivará el registro",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, inactivar!'
    }).then((result) => {
        if (result.isConfirmed) {
            var token = $("#token").val();
            $.ajax({
                url: "/" + aux + "/" + id + "",
                headers: { 'X-CSRF-TOKEN': token },
                type: 'post',
                method: 'DELETE',
                dataType: 'json',
                success: function () {
                    Swal.fire(
                        'Inactivado!',
                        'El registro se ha inactivado.',
                        'success'
                    )
                }
            });

            setTimeout(function () { location.reload() }, 1000);

        }
    })
}
