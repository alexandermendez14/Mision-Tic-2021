<?php
$user_name = $_POST['user_name'];
$user_id = $_POST['user_id'];
$user_mail = $_POST['user_mail'];
$product_name = $_POST['product_name'];
$product_id = $_POST['product_id'];
$user_message = $_POST['user_message'];

if(!empty($user_name)||!empty($user_id)||!empty($user_mail)||!empty($product_id)||!empty($user_message)){
    $host="localhost";
    $dbusername="root";
    $dbpassword="";
    $dbname="clientes";

    $conn = new mysqli($host,$dbusername,$dbpassword,$dbname);
    if(mysqli_connect_error()){
        die('connect error('.mysqli_connect_errno().')'.mysqli_connect_error());
    }
    else{
        $SELECT = "SELECT user_id from usuario where user_id = ? limit 1";
        $INSERT = "INSERT INTO usuario (user_name, user_id, user_mail, product_id, user_message)
        values(?,?,?,?,?)";

        $stmt=$conn->prepare($SELECT);
        $stmt -> bind_param("i",$user_id);
        $stmt ->execute();
        $stmt ->bind_result($user_id);
        $stmt ->store_result();
        $rnum = $stmt ->num_rows;
        if($rnum ==0){
            $stmt->close();
            $stmt = $conn->prepare($INSERT);
            $stmt ->bind_param("sisis",$user_name,$user_id,$user_mail,$product_id,$user_message);
            $stmt ->execute();
            echo "REGISTRO COMPLETADO.";

        }
        else{
            echo "Alguien ha registrado ese número de documento de identidad.";

        }
        $stmt->close();
        
    }
}
else{
    echo "Todos los datos son obligatorios";
    die();
}

?>