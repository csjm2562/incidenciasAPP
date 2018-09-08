<h4>Reportes</h4><br>
<div class="divider"></div>
<table class="highlight responsive-table">
  <thead>
    <tr>
      <th class="center">ID</th>
      <th class="center">Usuario</th>
      <th class="center">Tipo de reporte</th>
      <th class="center">Fecha</th>
    </tr>
  </thead>
  <tbody id="tablaReportes">

  </tbody>
</table>
<ul class="pagination center" id="paginador"></ul>
<script>
  var paginador;
  var totalPaginas;
  var itemsPorPagina = 7;
  var numerosPorPagina = 15;
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
			url:"funciones/inc/conexiones/conexion_reporte.php"
		}).done(function(data,textStatus,jqXHR) {
      var lista = data.lista;
			$("#tablaReportes").html("");
			$.each(lista, function(ind, elem){
  			$("<tr>"+
          "<td class='center'>"+elem.id_reporte+"</td>"+
  				"<td class='center'>"+elem.id_cliente+"</td>"+
  				"<td class='center'>"+elem.tipo_reporte+"</td>"+
  				"<td class='center'>"+elem.fecha+"</td>"+
  				"</tr>").appendTo($("#tablaReportes"));
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
      data:{"param1":"cuantos"},
      type:"GET",
      dataType:"json",
      url:"funciones/inc/conexiones/conexion_reporte.php"
    }).done(function(data,textStatus,jqXHR) {
      var total = data.total;
      crearPaginador(total);
    }).fail(function(jqXHR,textStatus,textError) {
      alert("Error al realizar la peticion cuantos".textError);
    });
  });
</script>
