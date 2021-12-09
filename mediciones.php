<?php include 'header.php';

$mediciones = null;
?>


<div class="row">
    <div class="col text-center">
        <h1>MEDICIONES</h1>
    </div>
</div>
<div class="row">
    <div class="col text-center">
        <table class="w-100">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Medición</td>
                    <td>Fecha</td>
                    <td>Acciones</td>
                </tr>
            </thead>
            <tbody>
                <?php

                if ($res = pg_query($con, "SELECT * FROM mediciones WHERE pozo = '{$_GET['id']}' ORDER BY fecha")) {
                    $mediciones = pg_fetch_all($res);

                    foreach ($mediciones as $medicion) {
                        echo "<tr><td>{$medicion['id']}</td><td>{$medicion['medicion']}</td><td>{$medicion['fecha']}</td>";
                        echo "<td><a class='btn btn-success' href='edit_form_mediciones.php?id={$medicion['id']}'><i class=\"bi bi-pencil-square\"></i></a>";
                        echo "<a class='btn btn-danger' href='delete_medicion.php?id={$medicion['id']}'><i class=\"bi bi-x-circle-fill\"></i></a></tr>";
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
                <form action="new_medicion.php" method="post">
                    <input type="hidden" name="pozo" value="<?php echo $_GET['id'] ?>">
                    <label for="medicion">Medición</label>
                    <input type="number" class="form-control" name="medicion" min="0">
                    <label for="medicion">Tiempo</label>
                    <input type="datetime-local" name="fecha" class="form-control" placeholder="Fecha y hora">
                    <input type="submit" value="Agregar medida" class="btn btn-primary">
                </form>
            </div>
        </div>

    </div>
</div>

<canvas id="grafico"></canvas>

<script>
    <?php
    $medicion_json = array();

    foreach ($mediciones as $medicion) {
        array_push($medicion_json, json_encode($medicion));
    } ?>

    var data = [<?php echo implode(',', $medicion_json) ?>];

    var config = {
        type: 'line',
        data: {
            
            datasets: [{
                label: "mediciones",
                data: data.map(function(medicion) {
                    return {
                        y: medicion.medicion,
                        x: Date.parse(medicion.fecha)
                    }
                }),
                fill: false,
                borderColor: 'rgb(255, 0, 0)',
                backgroundColor: 'rgb(255, 0, 0)'
            }]
        },
        options: {
            scales: {
                x: {
                    type: 'time',
                    time: {
                        unit: 'day'
                    }
                }
            },
            zone: "Venezuela/Caracas"
        }
    };

    var chart = new Chart(document.getElementById('grafico').getContext('2d'), config);
</script>

<?php include 'footer.php'; ?>