<?php
    require_once 'connection.php';

    function getEmpleados($pdo){
        $query = "SELECT * FROM Empleado";
        $stmt = $pdo->prepare($query);
        $stmt-> execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function getEmpleado($ci,$pdo){
        $query= "SELECT * FROM Empleado WHERE ci = :ci";
        $stmt = $pdo->prepare($query);
        $stmt -> bindParam(':ci', $ci, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt -> fetch(PDO::FETCH_ASSOC);
    }

    function createEmpleado($pdo,$nombre,$apellido,$ci,$telefono,$direccion ,$idalmacen){
        $query = "INSERT INTO Empleado (Nombre,Apellido,CI,Telefono,Direccion,idalmacen ) VALUES (:nombre, :apellido, :ci, :telefono, :direccion, :idalmacen)";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':nombre',$nombre,PDO::PARAM_STR);
        $stmt->bindParam(':apellido',$apellido,PDO::PARAM_STR);
        $stmt->bindParam(':ci',$ci,PDO::PARAM_INT);
        $stmt->bindParam(':telefono',$telefono,PDO::PARAM_INT);
        $stmt->bindParam(':direccion',$direccion,PDO::PARAM_STR);
        $stmt->bindParam(':idalmacen',$idalmacen,PDO::PARAM_INT);
        $stmt->execute();
    }

    function updateEmpleado($pdo,$nombre,$apellido,$ci,$telefono,$direccion, $idalmacenen){
        $query = "UPDATE Empleado SET Nombre = :nombre , Apellido = :apellido, Telefono = :telefono, Direccion = :direccion, idalmacen = :idalmacen
                    WHERE ci = :ci";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':nombre',$nombre,PDO::PARAM_STR);
        $stmt->bindParam(':apellido',$apellido,PDO::PARAM_STR);
        $stmt->bindParam(':ci',$ci,PDO::PARAM_INT);
        $stmt->bindParam(':telefono',$telefono,PDO::PARAM_INT);
        $stmt->bindParam(':direccion',$direccion,PDO::PARAM_STR);
        $stmt->bindParam('idalmacen',$idalmacenen,PDO::PARAM_INT);
        $stmt->execute();
    }

    function deleteEmpleado($pdo,$ci){
        $query = "DELETE FROM Empleado WHERE ci = :ci";
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
            $telefono = $_POST['telefono'];
            $direccion = $_POST['direccion'];
            $idalmacen = $_POST['idalmacen'];
            createEmpleado($pdo,$nombre,$apellido,$ci,$telefono,$direccion,$idalmacen);
          }
          elseif($accion == "modificar"){
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $ci = $_POST['ci'];
            $telefono = $_POST['telefono'];
            $direccion = $_POST['direccion'];
            $idalmacen = $_POST['idalmacen'];
            updateEmpleado($pdo,$nombre,$apellido,$ci,$telefono,$direccion,$idalmacen);
          }
          elseif($accion == "eliminar"){
            $ci = $_POST['ci'];
            deleteEmpleado($pdo,$ci);
          }
    }


?>