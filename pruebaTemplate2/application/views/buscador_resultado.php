<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    
    <title>Resultado buscador</title>
    
</head>
<body>
    
    <table>
    <tr>
        <th>Nombre direccion</th>
        <th>Numero direccion</th>
        <th>Url Foto</th>
        
    </tr>

    <?php foreach ($products as $product){ ?>
        <tr>
            <td><?php echo $product->direccion_nombre?></td>
            <td><?php echo $product->direccion_numero?></td>
            <td><?php echo $product->foto_url?></td>
        </tr>
    <?php } ?>
    </table>

    <?php
        echo $this->pagination->create_links();
    ?>

</body>
</html>