<?php
    $conexion=mysqli_connect('localhost','root','','clientes');
?>

<!DOCTYPE html>
<html>
    <head>
        <title>mostrar datos</title>
</head>
<body>

<br>


<table>
    <tr>
        <td>Nombre del cliente</td>
        <td>Documento de identidad</td>
        <td>Correo electronico</td>
        <td>Codigo del producto</td>
        <td>Mensaje</td>
</tr>
<?php
$sql="SELECT *from usuario";
$result=mysqli_query($conexion,$sql);

while($mostrar=mysqli_fetch_array($result)){
?>
<tr>
    <td><?php echo $mostrar ['user_name'] ?></td>
    <td><?php echo $mostrar ['user_id'] ?></td>
    <td><?php echo $mostrar ['user_mail'] ?></td>
    <td><?php echo $mostrar ['product_id'] ?></td>
    <td><?php echo $mostrar ['user_message'] ?></td>
</tr>
<?php
}
?>
</table>
</body>
</html>


