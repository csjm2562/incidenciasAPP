$(document).ready(function() {
  $('.altEmpCli').on('click', function() {
      $('.navega li').removeClass('active');
      $("#contenido").load('funciones/inc/altaEmpleadoCliente.php');
        return false;
  });
  $('.altIncAdmCli').on('click', function() {
      $('.navega li').removeClass('active');
      $("#contenido").load('funciones/inc/altaIncidenciaAdministradorCliente.php');
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
    $("#contenido").load('funciones/inc/contrataBajaProducto.php');
      return false;
  });
  $('.detInc').on('click', function() {
    $('.navega li').removeClass('active');
    $("#contenido").load('funciones/inc/detalleIncidencia.php');
      return false;
  });
  $('.incAsiMi').on('click', function() {
    $('.navega li').removeClass('active');
    $("#contenido").load('funciones/inc/incidenciasAsignadasMi/incidenciasAsignadasMi.php');
      return false;
  });
  $('.incSinAsi').on('click', function() {
    $('.navega li').removeClass('active');
    $("#contenido").load('funciones/inc/incidenciasSinAsignar/incidenciasSinAsignar.php');
      return false;
  });
  $('.misInc').on('click', function() {
    $('.navega li').removeClass('active');
    $("#contenido").load('funciones/inc/misIncidencias.php');
      return false;
  });
  $('.modInc').on('click', function() {
    $('.navega li').removeClass('active');
    $("#contenido").load('funciones/inc/modificarIncidencia.php');
      return false;
  });
  $('.modEmpCli').on('click', function() {
    $('.navega li').removeClass('active');
    $("#contenido").load('funciones/inc/modificarEmpleadoCliente/modificarEmpleadoCliente.php');
      return false;
  });
  $('.reabrirInc').on('click', function() {
    $('.navega li').removeClass('active');
    $("#contenido").load('funciones/inc/reabrirIncidencia.php');
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
