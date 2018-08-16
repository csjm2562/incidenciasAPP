<script>
  $('.btn').on('click', function() {
    $('.btn').removeClass('active');
    $("#contenido").load('funciones/inc/detalleIncidencia.php');
      return false;
  });
</script>
<div id="contenido">
  <h2 class="left">Localización</h2>
  <video class="responsive-video" controls>
    <source src="media/video.mp4" type="video/mp4">
  </video>
  <center>
    <div class="row">
      <button class="col s12 btn btn-large waves-effect">Volver</button>
    </div>
  </center>
</div>
