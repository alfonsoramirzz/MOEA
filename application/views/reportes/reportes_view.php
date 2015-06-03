<!-- Single button -->
<div class="btn-group">
    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
      Seleccione el reporte <span class="caret"></span>
    </button>
    <ul class="dropdown-menu" role="menu">
      <li><a onclick="verReportContenido('1')">Convocatorias</a></li>
      <li><a onclick="verReportContenido('2')">Por Area de Formación</a></li>
      <li><a onclick="verReportContenido('3')">Por Pais</a></li>
      <li><a onclick="verReportContenido('4')">Por universidad</a></li>
    </ul>
</div>
<br><br>
<a href="verReporteContenido" class="btn btn-primary">TEST</a>
<div id="area_report">
    <object data="<?= base_url(); ?>recursos/pdf/temporal.pdf" type="application/pdf" width="100%" height="1000"></object>
</div>