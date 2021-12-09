<?php include 'header.php';

$resultado = pg_query($con, "SELECT * FROM mediciones WHERE id = {$_GET['id']}");

$medicion = pg_fetch_assoc($resultado);

?>

<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <form action="edit_medicion.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $medicion['id'] ?>">
                    <label for="medicion">Medición</label>
                    <input type="number" class="form-control" name="medicion" value="<?php echo $medicion['medicion']?>" min="0">
                    <label for="medicion">Tiempo</label>
                    <input type="datetime-local" name="fecha" class="form-control" placeholder="Fecha y hora"
                        value="<?php echo $medicion['fecha']?>">
                    <input type="submit" value="Editar medida" class="btn btn-primary">
                </form>
            </div>
        </div>

    </div>
</div>

<?php include 'footer.php'; ?>