<?php include 'header.php'; 

$resultado = pg_query($con, "SELECT * FROM pozos_petroleros WHERE id = {$_GET['id']}");

$pozo = pg_fetch_assoc($resultado);

?>

<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <form action="edit_pozo.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $pozo['id'];?>">
                    <label for="locacion" class="form-label">Locación</label>
                    <input type="text" name="locacion" class="form-control" value="<?php echo $pozo['locacion'];?>"><br>
                    <input type="submit" value="Editar pozo" class="btn btn-primary">
                </form>
            </div>
        </div>

    </div>
</div>

<?php include 'footer.php'; ?>