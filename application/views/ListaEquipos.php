<h1 class="page-header ">Lista de Equipos</h1>
  <table class="table table-striped table-responsives table-hover">
     <tr>
    <?php foreach($misEquipos as $linea):?>
      <tr>
       <td  onclick="Detalle('Equipos','DetalleEquipo','<?=$linea["Id_Equipo"]?>')" class="enlace" style="cursor: pointer; "><?=$linea['Equipo']?></td>
       <td>	<?php echo anchor('Convocatoria/Convocatoria',' Convocatoria',Array('class' => "btn btn-info glyphicon glyphicon-thumbs-up ", ));?></td>
       <td><?php echo anchor("Entrenamiento/NuevoEntrenamiento/".$linea["Id_Equipo"].""," Asistencia",Array('class' => 'btn btn-success glyphicon glyphicon-list-alt ' ));?></td>
      </tr>

    <?php endforeach; ?><tr>

  </table>
</div>
