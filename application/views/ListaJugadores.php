<h1 class="page-header ">Jugadores</h1>
  <table class="table table-striped table-responsives table-hover">
   <tr>
    <?php foreach($misJugadores as $linea):?>
      <tr onclick="Detalle('Jugadores','DatosJugador','<?=$linea["ID"]?>')" class="enlace" style="cursor: pointer; ">
       <td><?=$linea['Nombre']?></td>
      </tr>

    <?php endforeach; ?>

  </table>
</div>
