<?php

  require_once 'connection.php';

  function getAlmacenes($pdo) {
      $query = "SELECT * FROM Almacenes";
      $stmt = $pdo->prepare($query);
      $stmt->execute();
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    function getAlmacen($pdo, $codigo) {
      $query = "SELECT * FROM Almacenes WHERE codigo = :codigo";
      $stmt = $pdo->prepare($query);
      $stmt->bindParam(':codigo', $codigo, PDO::PARAM_INT);
      $stmt->execute();
      return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    function createAlmacen($pdo, $nombre, $codigo, $telefono, $codigomaterial) {
      $query = "INSERT INTO Almacenes (Nombre, Codigo, Telefono, codigomaterial) VALUES (:nombre, :codigo, :telefono, :codigomaterial)";
      $stmt = $pdo->prepare($query);
      $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
      $stmt->bindParam(':codigo', $codigo, PDO::PARAM_INT);
      $stmt->bindParam(':telefono', $telefono, PDO::PARAM_STR);
      $stmt->bindParam(':codigomaterial', $codigomaterial, PDO::PARAM_INT);
      $stmt->execute();
    }
      
    

    function updateAlmacen($pdo, $nombre, $codigo, $telefono, $codigomaterial) {
      $query = "UPDATE Almacenes SET Nombre = :nombre, Telefono = :telefono, codigomaterial = :codigomaterial WHERE codigo = :codigo";
      $stmt = $pdo->prepare($query);
      $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
      $stmt->bindParam(':codigo', $codigo, PDO::PARAM_INT);
      $stmt->bindParam(':telefono', $telefono, PDO::PARAM_STR);
      $stmt->bindParam(':codigomaterial', $codigomaterial, PDO::PARAM_INT);
      $stmt->execute();
    }

    function deleteAlmacen($pdo, $codigo) {
      $query = "DELETE FROM Almacenes WHERE codigo = :codigo";
      $stmt = $pdo->prepare($query);
      $stmt->bindParam(':codigo', $codigo, PDO::PARAM_INT);
      $stmt->execute();
    }

    if($_SERVER["REQUEST_METHOD"]=="POST"){
      $accion = $_POST["accion"];
        if($accion =='agregar'){
          $nombre = $_POST['nombre'];
          $codigo = $_POST['code'];
          $telefono = $_POST['telefono'];
          $codigomaterial = $_POST['codigomaterial'];
          createAlmacen($pdo,$nombre,$codigo,$telefono,$codigomaterial);
        }
        elseif($accion == "modificar"){
          $nombre = $_POST['nombre'];
          $codigo = $_POST['codigo'];
          $telefono = $_POST['telefono'];
          $codigomaterial = $_POST['codigomaterial'];
          updateAlmacen($pdo,$nombre,$codigo,$telefono,$codigomaterial);
        }
        elseif($accion == "eliminar"){
          $codigo = $_POST['codigo'];
          deleteAlmacen($pdo,$codigo);
        }
    }
 ?>