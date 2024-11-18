<!DOCTYPE html>
<html lang="en">
<head>
    <title>Gestion Materiales</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <div class="container">
            <img src="img/Logo.jpg" class="logo"/>
            <h1>Gestión de Materiales</h1>
            <nav>
                <ul>
                <li><a href="#agregar">Agregar Material</a></li>
                <li><a href="#eliminar">Eliminar Material</a></li>
                <li><a href="#modificar">Modificar Material</a></li>
                <li><a href="#mostrar">Mostrar Materiales</a></li>
                </ul>
            </nav>
        </div>
   </header>
   <section>
    <h2 id="agregar">Agregar Materiales</h2>
    <form  method="POST" action="materiales.php" class="form-agregar-materiales">
        <input type="hidden" name="accion" value="agregar">

        <label for="nombre">Nombre: </label>
        <input type="text" id="nombre" name="nombre" placeholder="Nombre del Material" required/>

        <label for="code">Código: </label>
        <input type="text" id="code" name="codigomaterial" placeholder="Código del Material" required/>

        <br>
        <button type="submit">Agregar</button>
    </form>
   </section>
   <section>
    <h2 id="modificar">Modificar Materiales</h2>
    <form  method="POST" action="materiales.php" class="form-modificar-material">
        <input type="hidden" name="accion" value="modificar">

        <label for="codigomaterial" class="form-modificar-empleado-label">Código:</label>
        <input type="text" id="codigomaterial" name="codigomaterial" class="form-modificar-empleado-input" placeholder="Código del Material">
        
        <label for="nombre" class="form-modificar-empleado-label">Nombre:</label>
        <input type="text" id="nombre" name="nombre" class="form-modificar-empleado-input" placeholder="Nombre del Material">
        <br>
        <button type="submit" class="form-modificar-empleado-button">Modificar</button>
    </form>
    
   </section>
   <section>
    <h2 id="eliminar">Eliminar Materiales</h2>
    <form  method="POST" action="materiales.php"class="form-eliminar-material">
        <input type="hidden" name="accion" value="eliminar">
        
        <label for="eliminarCodigoMaterial" class="form-eliminar-material-label">Código:</label>
        <input type="number" id="eliminarCodigoMaterial" name="codigomaterial" placeholder="Código del Material" class="form-eliminar-material-input">
        <br>
        <button type="submit" class="form-eliminar-material-button">Eliminar</button>
    </form>
   </section>
   <section>
    <h2>Tabla Materiales</h2>
    <table class="table">
            <thead>
                <tr>
                    <th class="th2">Nombre</th>
                    <th class="th2">Código</th>
                    
                <tr>
            </thead>
            <tbody>
            <tbody>
                <?php include_once 'connection.php'?>
                <?php include_once 'materiales.php'?>
                <?php foreach (getMateriales($pdo) as $material): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($material['nombre']); ?></td>
                        <td><?php echo htmlspecialchars($material['codigomaterial']); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>

            </tbody>
            
        </table>
   </section>
   <footer>
    <p>&copy;2024 El Patio Todos los Derechos Reservados</p> 
   </footer>
</body>
</html>