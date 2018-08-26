$(document).ready(function() {
  $('.altEmpCli').on('click', function() {
      $('.navega li').removeClass('active');
      $("#contenido").load('funciones/inc/altaEmpleadoCliente.php');
        return false;
  });
  $('.altIncPetAdmCli').on('click', function() {
      $('.navega li').removeClass('active');
      $("#contenido").load('funciones/inc/altaIncidenciaPeticionAdministradorCliente/altaIncidenciaPeticionAdministradorCliente.php');
        return false;
  });
  $('.altIncEmp').on('click', function() {
      $('.navega li').removeClass('active');
      $("#contenido").load('funciones/inc/altaIncidenciaEmpleado.php');
        return false;
  });
  $('.asiInc').on('click', function() {
      $('.navega li').removeClass('active');
      $("#contenido").load('funciones/inc/asignarmeIncidencia/asignarmeIncidencia.php');
        return false;
  });
  $('.bajEmpCli').on('click', function() {
    $('.navega li').removeClass('active');
    $("#contenido").load('funciones/inc/bajaEmpleadoCliente.php');
      return false;
  });
  $('.conBajPro').on('click', function() {
    $('.navega li').removeClass('active');
    $("#contenido").load('funciones/inc/contratarBajarProducto/contratarBajarProducto.php');
      return false;
  });
  $('.detInc').on('click', function() {
    $('.navega li').removeClass('active');
    $("#contenido").load('funciones/inc/detalleIncidencia/detalleIncidencia.php');
      return false;
  });
  $('.incSinAsi').on('click', function() {
    $('.navega li').removeClass('active');
    $("#contenido").load('funciones/inc/incidenciasSinAsignar/incidenciasSinAsignar.php');
      return false;
  });
  $('.misInc').on('click', function() {
    $('.navega li').removeClass('active');
    $("#contenido").load('funciones/inc/misIncidencias/misIncidencias.php');
      return false;
  });
  $('.modInc').on('click', function() {
    $('.navega li').removeClass('active');
    $("#contenido").load('funciones/inc/modificarIncidencia/modificarIncidencia.php');
      return false;
  });
  $('.modEmpCli').on('click', function() {
    $('.navega li').removeClass('active');
    $("#contenido").load('funciones/inc/modificarEmpleadoCliente/modificarEmpleadoCliente.php');
      return false;
  });
  $('.reabrirInc').on('click', function() {
    $('.navega li').removeClass('active');
    $("#contenido").load('funciones/inc/reabrirIncidencia/reabrirIncidencia.php');
      return false;
  });
  $('.reasignarInc').on('click', function() {
    $('.navega li').removeClass('active');
    $("#contenido").load('funciones/inc/reasignarIncidencia/reasignarIncidencia.php');
      return false;
  });
  $('.reportes').on('click', function() {
    $('.navega li').removeClass('active');
    $("#contenido").load('funciones/inc/reporte/reportes.php');
      return false;
  });
});
