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
       <td><?=$linea['Nombre']?></td>
      </tr>
    <?php endforeach; ?> 
   </table>
      <input type="submit">
  </form>
    <td align="center"><?= anchor("Welcome/Index/", " Volver a Principal ", array('class' => 'btn btn-default glyphicon glyphicon-ok btn-alert')) ?></p></td>
 
</div>
