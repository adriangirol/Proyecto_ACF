<?php echo validation_errors(); ?>
<form action="" method="POST" >
    <HR width=100% align="center">
         <div class="form-group ">
              <?php echo form_label('Equipo: &nbsp;  '), form_dropdown('equipo', $equipos); ?>
        </div>
        <div>
        <div class="form-group ">
        <b>  Fecha: &nbsp;</b>
              <input type="date" name="fecha">
        </div>
        </div>
        <div class="form-group">
            <div>
            </div>
            <button class="btn btn-primary " name="guardar" type="submit">
                Guardar
            </button>
        </div>
</form>
