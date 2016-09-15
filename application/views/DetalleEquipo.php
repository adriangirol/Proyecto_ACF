<h1 class="page-header ">Lista de Jugadores</h1>
  <table class="table table-striped table-responsives table-hover">
         <tr>
           <th>Foto</th>
           <th>ID</th>
           <th >Nombre</th>
           <th >Posiciones</th>
         </tr>
         <tr>
             <?php foreach($miEquipo as $linea):?>
               <tr>
                 <td></td>
                 <td><?=$linea['ID']?></td>
                 <td><?=$linea['Nombre']?></td>
                 <td>
                <?php foreach ($linea['info'] as $posiciones): ?>
                  <?php foreach ($posiciones as $posicion): ?>
                    <li><?= $posicion ?></li>
                  <?php endforeach; ?>

                <?php endforeach;?>
              </td>
               </tr>

       <?php endforeach; ?><tr>

  </table>
</div>
