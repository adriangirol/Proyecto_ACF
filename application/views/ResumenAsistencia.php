<?php?>
<h1 class="page-header ">Jugadores que Asistieron el dia : <?=$fecha?></h1>
  <?php echo validation_errors(); ?>
   <form action="" method="POST">
   <table class="table table-striped table-responsives table-hover">
   <tr>
     <th>Nombre</th>
   </tr>
   <tr>
    <?php foreach($misJugadores as $linea):?>
       <?php foreach($linea as $jugador):?>
        <td><?=$jugador['Nombre']?></td>
        <?php endforeach; ?> 
      </tr>
   <?php endforeach; ?> 
   </table>
  </form>
    <td align="center"><?= anchor("Welcome/Index/", " Volver a Principal ", array('class' => 'btn btn-default glyphicon glyphicon-ok btn-alert')) ?></p></td>
 
</div>
