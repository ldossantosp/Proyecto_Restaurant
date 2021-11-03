<h3> Mi Pedido </h3>

<table class="table">
<tr>
    <td> Nombre Plato </td>
    <td> Cantidad </td>
    <td> SubTotal </td>
</tr>           
<?php
    while ($row = $info_pedido->fetch_assoc())
    {
        echo "
            <tr> 
                <td>{$row['Nombre']} </td>

        ";
    }

?>