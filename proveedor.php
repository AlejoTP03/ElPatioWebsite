<?php
    require_once 'connection.php';

    function getProveedores($pdo){
        $query = "SELECT * FROM Proveedor";
        $stmt = $pdo->prepare($query);
        $stmt-> execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function getProveedor($ci,$pdo){
        $query= "SELECT * FROM Proveedor WHERE ci = :ci";
        $stmt = $pdo->prepare($query);
        $stmt -> bindParam(':ci', $ci, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt -> fetch(PDO::FETCH_ASSOC);
    }

    function createProveedor($pdo,$nombre,$apellido,$ci,$municipio,$provincia,$codigoMaterial){
        $query = "INSERT INTO Proveedor (Nombre,Apellido,CI,Municipio,Provincia,codigomaterial) VALUES (:nombre, :apellido, :ci, :municipio, :provincia, :codigomaterial)";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':nombre',$nombre,PDO::PARAM_STR);
        $stmt->bindParam(':apellido',$apellido,PDO::PARAM_STR);
        $stmt->bindParam(':ci',$ci,PDO::PARAM_INT);
        $stmt->bindParam(':municipio',$municipio,PDO::PARAM_STR);
        $stmt->bindParam(':provincia',$provincia,PDO::PARAM_STR);
        $stmt->bindParam(':codigomaterial',$codigoMaterial,PDO::PARAM_INT);
        $stmt->execute();
    }

    function updateProveedor($pdo,$nombre,$apellido,$ci,$municipio,$provincia,$codigoMaterial){
        $query = "UPDATE Proveedor SET Nombre = :nombre , Apellido = :apellido, Municipio = :municipio, Provincia = :provincia, codigomaterial = :codigomaterial
                    WHERE ci = :ci";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':nombre',$nombre,PDO::PARAM_STR);
        $stmt->bindParam(':apellido',$apellido,PDO::PARAM_STR);
        $stmt->bindParam(':ci',$ci,PDO::PARAM_INT);
        $stmt->bindParam(':municipio',$municipio,PDO::PARAM_STR);
        $stmt->bindParam(':provincia',$provincia,PDO::PARAM_STR);
        $stmt->bindParam(':codigomaterial',$codigoMaterial,PDO::PARAM_INT);
        $stmt->execute();
    }

    function deleteProveedor($pdo,$ci){
        $query = "DELETE FROM Proveedor WHERE ci = :ci";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':ci',$ci,PDO::PARAM_INT);
        $stmt->execute();
    }

    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $accion = $_POST["accion"];
          if($accion =='agregar'){
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $ci = $_POST['ci'];
            $municipio = $_POST['municipio'];
            $provincia = $_POST['provincia'];
            $codigomaterial = $_POST['codigomaterial'];
            createProveedor($pdo,$nombre,$apellido,$ci,$municipio,$provincia,$codigomaterial);
          }
          elseif($accion == "modificar"){
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $ci = $_POST['ci'];
            $municipio = $_POST['municipio'];
            $provincia = $_POST['provincia'];
            $codigomaterial = $_POST['codigomaterial'];
            updateProveedor($pdo,$nombre,$apellido,$ci,$municipio,$provincia,$codigomaterial);
          }
          elseif($accion == "eliminar"){
            $ci = $_POST['ci'];
            deleteProveedor($pdo,$ci);
          }
    }

?>