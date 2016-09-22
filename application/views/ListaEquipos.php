<h1 class="page-header ">Lista de Equipos</h1>
  <table class="table table-striped table-responsives table">
     <tr>
    <?php foreach($misEquipos as $linea):?>
      <tr>
          <td  onclick="Detalle('Equipos','DetalleEquipo','<?=$linea["Id_Equipo"]?>')" class="enlace" style="cursor: pointer; "><h5><b><?=$linea['Equipo']?></b></h5></td>
       <td><?php echo anchor("Partido/NuevoPartido/".$linea["Id_Equipo"]."",' Convocatoria',Array('class' => "btn btn-info glyphicon glyphicon-thumbs-up ", ));?></td>
       <td><?php echo anchor("Entrenamiento/NuevoEntrenamiento/".$linea["Id_Equipo"].""," Asistencia",Array('class' => 'btn btn-success glyphicon glyphicon-check ' ));?></td>
        <td><?php echo anchor("Seguimiento/VerSeguimientoPorEquipo/".$linea["Id_Equipo"].""," Seguimiento ",Array('class' => 'btn btn-default glyphicon glyphicon-list-alt ' ));?></td>
      </tr>

    <?php endforeach; ?><tr>

  </table>
</div>
