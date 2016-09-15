
<?php echo validation_errors(); ?>
<form action="" method="POST" >
    <HR width=100% align="center">
         <div class="form-group ">
          <b>Equipo:</b>
              <input type="text" readonly value="<?= $equipo ?>">
              <input hidden="number" value="<?= $idequipo ?>" name="idEquipo" id="idEquipo">
        </div>
        <div>
        <div class="form-group ">
        <b> Fecha: &nbsp</b>
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
