<div id="exTab2">	
    <ul  class="nav nav-tabs">
        <li class="active">
            <a  href="#entrenamientos" data-toggle="tab">Entrenamientos</a>
        </li>
        <li>
            <a href="#partidos" data-toggle="tab">Partidos</a>
        </li>
    </ul>
    <div class="tab-content clearfix">
        <div class="tab-pane active" id="entrenamientos">
            <table class="table table-striped table-responsives table">
                <th>
                    <?php foreach ($entrenamientos as $entrenamiento): ?>
                <td align="center"><b><?= $entrenamiento ?></b></td>
                <?php endforeach; ?>
                </th>
                <?php for ($i = 0; $i < count($Jugadores); $i++): ?>
                    <tr>
                        <td><b><?= $Jugadores[$i]['Nombre'] ?></b></td>
                        <?php
                        for ($v = 0; $v < count($entrenamientos); $v++) {
                            if (isset($Jugadores[$i]['Entrenamientos'])&& in_array($entrenamientos[$v], $Jugadores[$i]['Entrenamientos'])) {
                                 echo '<td align="center"><img src="'.base_url().'asset/img/Okay.png" title="'.$entrenamientos[$v].'"> </td>';
                            } else {
                                echo '<td align="center"></td>';
                            }
                        }
                        echo "</tr>";
                    endfor;
                    ?>
            </table>
        </div>



        <div class="tab-pane" id="partidos">
            <table class="table table-striped table-responsives table" >
                <th>
                    <?php
                    foreach ($partidos as $partido) {
                        $IdaVuelta = $partido['Ida'];
                        if ($IdaVuelta == "1") {

                            $IdaVuelta = 'Ida';
                        } else {

                            $IdaVuelta = 'Vuelta';
                        }

                        echo "<td align = 'center'> <b>" . $partido['Rival'] . " - " . $IdaVuelta . "</b></td>";
                    }
                    ?>
                </th>
                <?php for ($i = 0; $i < count($Jugadores); $i++): ?>
                    <tr>
                        <td><b><?= $Jugadores[$i]['Nombre'] ?></b></td>
                        <?php
                        for ($v = 0; $v < count($partidos); $v++) {
                            if (isset($Jugadores[$i]['Partidos'])&&in_array($partidos[$v]['Fecha'], $Jugadores[$i]['Partidos'])) {
                                echo '<td align="center"><img src="'.base_url().'asset/img/Okay.png" title="'.$partidos[$v]['Fecha'].'"> </td>';
                            } else {
                                echo '<td align="center"></td>';
                            }
                        }
                        echo "</tr>";
                    endfor;
                    ?>
            </table>
        </div>

    </div>
</div>
<br>
    <td align="center"><?= anchor("Welcome/Index/", " Principal ", array('class' => 'btn glyphicon glyphicon-th-large ')) ?></p></td>
