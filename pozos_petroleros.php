<?php include 'header.php'; ?>

<div class="row">
    <div class="col text-center">
        <h1>POZOS PETROLEROS</h1>
    </div>
</div>
<div class="row">
    <div class="col text-center">
        <table class="w-100">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Locación</td>
                    <td>Acciones</td>
                </tr>
            </thead>
            <tbody>
                <?php

                if ($res = pg_query($con, "SELECT * FROM pozos_petroleros ORDER BY id")) {
                    $pozos = pg_fetch_all($res);

                    foreach ($pozos as $pozo) {
                        echo "<tr><td>{$pozo['id']}</td><td>{$pozo['locacion']}</td>";
                        echo "<td><a class='btn btn-success' href='edit_form_pozos.php?id={$pozo['id']}'><i class=\"bi bi-pencil-square\"></i></a>";
                        echo "<a class='btn btn-danger' href='delete_pozo.php?id={$pozo['id']}'><i class=\"bi bi-x-circle-fill\"></i></a>";
                        echo "<a class='btn btn-primary' href='mediciones.php?id={$pozo['id']}'><i class=\"bi bi-bar-chart-fill\"></i></a></tr>";
                    }
                } else {
                    echo pg_last_error($con);
                }
                ?>
            </tbody>
        </table>
    </div>
    <div class="col">
        <div class="card">
            <div class="card-body">
                <form action="new_pozo.php" method="post">
                    <label for="locacion" class="form-label">Locación</label>
                    <input type="text" name="locacion" class="form-control"><br>
                    <input type="submit" value="Agregar pozo" class="btn btn-primary">
                </form>
            </div>
        </div>

    </div>
</div>

<?php include 'footer.php'; ?>