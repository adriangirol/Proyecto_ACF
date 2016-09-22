<h1 class="page-header ">Fecha : <?=$fecha?>  - Rival: <?=$rival?> </h1>
  <?php echo validation_errors(); ?>
   <form action="" method="POST">
   <table class="table table-striped table-responsives table-hover">
   <tr>
     <th>Nombre</th>
     <th>Asistencia</th>
   </tr>
   <tr>
    <?php foreach($misJugadores as $linea):?>
    <!--  <tr onclick="Detalle('Jugadores','DatosJugador','<?=$linea["ID"]?>')" class="enlace" style="cursor: pointer; ">-->
       <td><?=$linea['Nombre']?></td>
       <td>
         <div class="checkbox">
             <input type="checkbox" name="check[]" value="<?=$linea["ID"]?>" id="check">
         </div>
      </td>
      </tr>
    <?php endforeach; ?>
      <input type="text" value="<?=$idEvento?>" name="idPartido" id="idPartido">
      <input type="hidden" value="<?=$fecha?>" name="fecha" id="fecha">
   </table>
      <input type="submit">
  </form>
 
</div>
