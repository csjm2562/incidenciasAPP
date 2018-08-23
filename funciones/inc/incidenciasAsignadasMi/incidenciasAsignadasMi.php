<?php
  chdir("../../");
  require 'conexion.php';
  session_start();
	$idUsuario = $_SESSION['id_usuario'];
	$sql = "SELECT id FROM usuarios WHERE id = '$idUsuario'";
	$result = $mysqli->query($sql);
	$row = $result->fetch_assoc();
?>
<h4>Incidencias asignadas a mi</h4>
<p><?php echo 'Bienvenido(a) '.utf8_decode($row['id']); ?></p>
<div class="divider"></div>
<table>
  <thead>
    <tr>
      <th class="center">ID</th>
      <th class="center">Estado</th>
      <th class="center">URL</th>
      <th class="center">Comentario</th>
      <th class="center">Localización</th>
    </tr>
  </thead>
  <tbody id="tablaIncidencia">

  </tbody>
</table>
<ul class="pagination center" id="paginador"></ul>
<script>
  var paginador;
  var totalPaginas;
  var itemsPorPagina = 7;
  var numerosPorPagina = 15;
  alert(id);
  function crearPaginador(totalItems) {
    paginador = $(".pagination");
    totalPaginas = Math.ceil(totalItems/itemsPorPagina);
    $('<li><a href="#!" class="first_link" title="Primero"><i class="fas fa-chevron-left"></i></li>').appendTo(paginador);
    $('<li><a href="#!" class="prev_link"></a></li>').appendTo(paginador);
    var pag = 0;
    while (totalPaginas > pag) {
      $('<li><a href="#!" class="page_link">'+(pag + 1)+'</a></li>').appendTo(paginador);
      pag++;
    }
    if (numerosPorPagina > 1) {
      $('.page_link').hide();
      $('.page_link').slice(0, numerosPorPagina).show();
    }
    $('<li><a href="#!" class="next_link"></a></li>').appendTo(paginador);
    $('<li><a href="#!" class="last_link" title="Último"><i class="fas fa-chevron-right"></i></li>').appendTo(paginador);
    paginador.find(".page_link:first").addClass("active");
    paginador.find(".page_link:first").parents("li").addClass("active");
    paginador.find(".prev_link").hide();
    paginador.find(".next_link").hide();
    paginador.find("li .page_link").click(function() {
      var irpagina = $(this).html().valueOf()-1;
			cargaPagina(irpagina);
			return false;
    });
    paginador.find("li .first_link").click(function() {
      var irpagina = 0;
			cargaPagina(irpagina);
			return false;
		});
    paginador.find("li .last_link").click(function() {
			var irpagina =totalPaginas -1;
			cargaPagina(irpagina);
			return false;
		});
    cargaPagina(0);
  }

  function cargaPagina(pagina) {
    var desde = pagina * itemsPorPagina;
		$.ajax({
			data:{"param1":"dame","limit":itemsPorPagina,"offset":desde},
			type:"GET",
			dataType:"json",
			url:"funciones/inc/incidenciasAsignadasMi/conexionIncidencia.php"
		}).done(function(data,textStatus,jqXHR) {
      var lista = data.lista;
			$("#tablaIncidencia").html("");
			$.each(lista, function(ind, elem){
  			$("<tr>"+
          "<td class='center'>"+elem.idIncidencia+"</td>"+
  				"<td class='center'>"+elem.estado_actual+"</td>"+
  				"<td class='center'>"+elem.url_video+"</td>"+
  				"<td class='center'>"+elem.comentarios+"</td>"+
  				"<td class='center'>"+elem.localizacion+"</td>"+
  				"</tr>").appendTo($("#tablaIncidencia"));
  		});
		}).fail(function(jqXHR,textStatus,textError) {
				alert("Error al realizar la peticion dame".textError);
		});
		paginador.data("pag",pagina);
		if(numerosPorPagina > 1) {
      $(".page_link").hide();
			if(pagina < (totalPaginas - numerosPorPagina))	{
        $(".page_link").slice(pagina,numerosPorPagina + pagina).show();
			}	else {
				if(totalPaginas > numerosPorPagina)
          $(".page_link").slice(totalPaginas- numerosPorPagina).show();
				else
					$(".page_link").slice(0).show();
			}
		}
		paginador.children().removeClass("active");
		paginador.children().eq(pagina+2).addClass("active");
	}

  $(function() {
    $.ajax({
      data:{"param1":"cuantos","id":"$row['id']"},
      type:"GET",
      dataType:"json",
      url:"funciones/inc/incidenciasAsignadasMi/conexionIncidencia.php"
    }).done(function(data,textStatus,jqXHR) {
      var total = data.total;
      crearPaginador(total);
    }).fail(function(jqXHR,textStatus,textError) {
      alert("Error al realizar la peticion cuantos".textError);
    });
  });
</script>
