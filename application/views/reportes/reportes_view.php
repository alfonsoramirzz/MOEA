<div class="form-group" >
  <label for="">Tipo</label><br>
  <select id="Reporte" name="tipoReporte">
      <option>Seleccione un Reporte...</option>
      <option id="1"  onclick="getTipos()">Convocatorias</option>
      <option id="2"  onclick="getTipos()">Grado</option>
      <option id="3"  onclick="getTipos()">Por Area de Formación</option>
      <option id="4"  onclick="getTipos()">Por Pais</option>
      <option id="5"  onclick="getTipos()">Por universidad</option>
      <option id="6"  onclick="getTipos()">Favoritas</option>
  </select>
</div>
<div id="FiltroReportes"> 
</div>
<br><br>
<div id="area_report">
    <object id="objectPDF" data="<?= base_url(); ?>recursos/pdf/temporal.pdf?#zoom=80" 
            type="application/pdf" width="100%" height="1000" zoom="100%"></object>
</div>