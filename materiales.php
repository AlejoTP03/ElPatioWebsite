<?php

  require_once 'connection.php';

  function getMateriales($pdo) {
      $query = "SELECT * FROM Material";
      $stmt = $pdo->prepare($query);
      $stmt->execute();
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    function getMaterial($pdo, $codigo) {
      $query = "SELECT * FROM Material WHERE codigomaterial = :codigomaterial";
      $stmt = $pdo->prepare($query);
      $stmt->bindParam(':codigomaterial', $codigo, PDO::PARAM_INT);
      $stmt->execute();
      return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    function createMaterial($pdo, $nombre, $codigoMaterial) {
      $query = "INSERT INTO Material (Nombre, codigomaterial) VALUES (:nombre, :codigoMaterial)";
      $stmt = $pdo->prepare($query);
      $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
      $stmt->bindParam(':codigoMaterial', $codigoMaterial, PDO::PARAM_INT);
      $stmt->execute();
    }

    function updateMAterial($pdo, $nombre, $codigomaterial) {
      $query = "UPDATE Material SET Nombre = :nombre WHERE codigomaterial = :codigomaterial";
      $stmt = $pdo->prepare($query);
      $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
      $stmt->bindParam(':codigomaterial', $codigomaterial, PDO::PARAM_INT);
      $stmt->execute();
    }

    function deleteMaterial($pdo, $codigomaterial) {
      $query = "DELETE FROM Material WHERE codigomaterial = :codigomaterial";
      $stmt = $pdo->prepare($query);
      $stmt->bindParam(':codigomaterial', $codigomaterial, PDO::PARAM_INT);
      $stmt->execute();
    }

    if($_SERVER["REQUEST_METHOD"]=="POST"){
      $accion = $_POST["accion"];
        if($accion =='agregar'){
          $nombre = $_POST['nombre'];
          $codigomaterial= $_POST['codigomaterial'];
          createMaterial($pdo,$nombre,$codigomaterial);
        }
        elseif($accion == "modificar"){
          $nombre= $_POST['nombre'];
          $codigomaterial = $_POST['codigomaterial'];
          updateMAterial($pdo,$nombre,$codigomaterial);
        }
        elseif($accion == "eliminar"){
          $codigomaterial = $_POST['codigomaterial'];
          deleteMaterial($pdo,$codigomaterial);
        }
      }
 ?>
