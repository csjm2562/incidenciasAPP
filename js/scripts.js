$(document).ready(function() {
  $('.altIncAdm').on('click', function() {
    $('.navega li').removeClass('active');
    $("#contenido").load('funciones/inc/altaIncidenciaAdministrador.php');
      return false;
  });
  $('.altIncEmp').on('click', function() {
    $('.navega li').removeClass('active');
    $("#contenido").load('funciones/inc/altaIncidenciaEmpleado.php');
      return false;
  });
  $('.altPetAdm').on('click', function() {
    $('.navega li').removeClass('active');
    $("#contenido").load('funciones/inc/altaPeticionAdministrador.php');
      return false;
  });
  $('.altPetEmp').on('click', function() {
    $('.navega li').removeClass('active');
    $("#contenido").load('funciones/inc/altaPeticionAdministrador.php');
      return false;
  });
  $('.asiInc').on('click', function() {
    $('.navega li').removeClass('active');
    $("#contenido").load('funciones/inc/asignarmeIncidencia.php');
      return false;
  });
  $('.bajEmpCli').on('click', function() {
    $('.navega li').removeClass('active');
    $("#contenido").load('funciones/inc/bajaEmpleadoCliente.php');
      return false;
  });
  $('.conPro').on('click', function() {
    $('.navega li').removeClass('active');
    $("#contenido").load('funciones/inc/contrataProducto.php');
      return false;
  });
  $('.detInc').on('click', function() {
    $('.navega li').removeClass('active');
    $("#contenido").load('funciones/inc/detalleIncidencia.php');
      return false;
  });
  $('.incAsiAMi').on('click', function() {
    $('.navega li').removeClass('active');
    $('#contenido').load('funciones/inc/incidenciasAsignadasAMi.php');
  });
  $('.incSinAsi').on('click', function() {
    $('.navega li').removeClass('active');
    $("#contenido").load('funciones/inc/incidenciasSinAsignar.php');
      return false;
  });
  $('.misIncEmp').on('click', function() {
    $('.navega li').removeClass('active');
    $("#contenido").load('funciones/inc/misIncidenciasEmpleado.php');
      return false;
  });
  $('.misIncCli').on('click', function() {
    $('.navega li').removeClass('active');
    $("#contenido").load('funciones/inc/misIncidenciasCliente.php');
      return false;
  });
  $('.modEmpCli').on('click', function() {
    $('.navega li').removeClass('active');
    $("#contenido").load('funciones/inc/modificarEmpleadoCliente.php');
      return false;
  });
  $('.modInc').on('click', function() {
    $('.navega li').removeClass('active');
    $("#contenido").load('funciones/inc/modificarIncidencia.php');
      return false;
  });
  $('.reabrirInc').on('click', function() {
    $('.navega li').removeClass('active');
    $("#contenido").load('funciones/inc/reabrirIncidencia.php');
      return false;
  });
  $('.reasignarInc').on('click', function() {
    $('.navega li').removeClass('active');
    $("#contenido").load('funciones/inc/reasignarIncidencia.php');
      return false;
  });
  $('.reportes').on('click', function() {
    $('.navega li').removeClass('active');
    $("#contenido").load('funciones/inc/reportes.php');
      return false;
  });


  $('.altEmpCli').on('click', function() {
      $('.navega li').removeClass('active');
      $("#contenido").load('funciones/inc/altaEmpleadoCliente/altaEmpleadoCliente.php');
        return false;
  });
  $('.altIncPetAdmCli').on('click', function() {
      $('.navega li').removeClass('active');
      $("#contenido").load('funciones/inc/altaIncidenciaAdministrador.php');
        return false;
  });
  $('.conBajPro').on('click', function() {
    $('.navega li').removeClass('active');
    $("#contenido").load('funciones/inc/contratarBajarProducto/contratarBajarProducto.php');
      return false;
  });
});
