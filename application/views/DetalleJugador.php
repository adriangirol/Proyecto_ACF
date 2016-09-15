<h1 class="page-header ">Lista de Jugadores</h1>
  <table class="table table-striped table-responsives table-hover">
         <tr>
           <th>Foto</th>
           <th>ID</th>
           <th>Nombre</th>
           <th>Categoria</th>
           <th>Equipo</th>
           <th>Posiciones</th>
         </tr>
         <tr>
             <?php foreach($miJugador as $linea):?>
               <tr>
                 <td></td>
                 <td><?=$linea['ID']?></td>
                 <td><?=$linea['Nombre']?></td>
                 <td><?=$linea['Categoria']?></td>
                 <td><?=$linea['Equipo']?></td>
                 <td>

                   <?php foreach ($posiciones as $key ): ?>
                    <dd><?=$key['Posicion']?></dd>
                   <?php endforeach; ?>

                 </td>
               </tr>

       <?php endforeach; ?><tr>

  </table>
</div>
