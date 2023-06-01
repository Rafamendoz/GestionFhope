/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!**************************************!*\
  !*** ./resources/js/venta_script.js ***!
  \**************************************/
function ConsultarEliminar(id) {
  Swal.fire({
    title: '¿Está seguro?',
    text: "No podrás revertir esto!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: '¡Sí, bórralo!',
    cancelButtonText: 'Cancelar'
  }).then(function (result) {
    if (result.isConfirmed) {
      Eliminar(id);
    }
  });
}
function Eliminar(id) {
  var username = "{{auth()->user()->email}}";
  var password = "{{auth()->user()->password}}";
  var headers = {
    "Authorization": "Basic " + btoa(username + ":" + password)
  };
  $.ajax({
    method: "PUT",
    url: "../../api/productoR/delete/" + id,
    headers: headers,
    data: {
      "estado": 2
    }
  }).done(function (data) {
    var response = JSON.parse(JSON.stringify(data));
    console.log(response);
    mostrarMensaje(response['Data_Respuesta']);
  }).fail(function (data) {
    var response = JSON.parse(JSON.stringify(data));
    console.log(response);
    mostrarMensaje(response['responseJSON']);
  });
}
function mostrarMensaje(dataResponse) {
  var Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: function didOpen(toast) {
      toast.addEventListener('mouseenter', Swal.stopTimer);
      toast.addEventListener('mouseleave', Swal.resumeTimer);
    },
    didClose: function didClose(toast) {
      if (dataResponse.Codigo == 200) {
        location.reload();
      }
    }
  });
  if (dataResponse.Codigo == 200) {
    Toast.fire({
      icon: 'success',
      title: dataResponse.Estado + "! " + dataResponse.Descripcion
    });
  } else {
    Toast.fire({
      icon: 'error',
      title: dataResponse.Estado + "! " + dataResponse.Mapping_Error[0].descripcion
    });
  }
}
/******/ })()
;