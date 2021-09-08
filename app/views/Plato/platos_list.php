<h2> Listado de Platos </h2>
<table class="table table-striped">
    <thead>
        <th>Nombre</th>
        <th>Descripción</th>
        <th>Precio</th>
        <th>Ver/Editar información de plato</th>
        <th>Ver/Editar fotos de plato</th>
        <th>Eliminar</th>
    </thead>
<tbody>
    <?php
    while ($row = $platos->fetch_assoc())
    {
        echo '<tr>';
        echo "<td>{$row['Nombre']}</td>";
        echo "<td>{$row['Descripcion']}</td>";
        echo "<td>{$row['Precio']}</td>";
        echo "<td><a href='" . FOLDER_PATH . "/Plato/PlatoList/{$row['Id']}'>Editar</a></td>";
        echo "<td><a href='" . FOLDER_PATH . "/Plato/PlatoFotos/{$row['Id']}'>Editar</a></td>";
        echo "<td><a href='" . FOLDER_PATH . "/Plato/removePlato/{$row['Id']}'>Eliminar</a></td>";
        
        echo '</tr>';
    }
    ?>
</tbody>
</table>
