<!DOCTYPE html>
<html lang="en">
<head>
    <title>Gestion Almacenes</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <div class="container">
            <img src="img/Logo.jpg" class="logo"/>
            <h1>Gestión de Almacenes</h1>
            <nav>
                <ul>
                <li><a href="#agregar">Agregar Almacén</a></li>
                <li><a href="#eliminar">Eliminar Almacén</a></li>
                <li><a href="#modificar">Modificar Almacén</a></li>
                <li><a href="#mostrar">Mostrar Almacenes</a></li>
                </ul>
            </nav>
        </div>
   </header>
   <section>
    <h2 id="agregar">Agregar Almacenes</h2>
    <form method="POST" action="almacenes.php"  class="form-agregar-almacenes">
        <input type="hidden" name="accion" value="agregar">

        <label for="name">Nombre: </label>
        <input type="text" id="name" name="nombre" placeholder="Nombre del Almacén" required/>

        <label for="code">Código: </label>
        <input type="text" id="code" name="code" placeholder="Código del Almacén" required/>

        <label for="telefono">Teléfono: </label>
        <input type="number" id="telefono" name="telefono" placeholder="Teléfono del Almacén" required/>

        <label for="codigomaterial">Codigo del Material que Contiene: </label>
        <input type="text" id="codigomaterial" name="codigomaterial" placeholder="Material que Contiene" required/>

        <br>
        <button type="submit" class="form-modificar-almacen-button">Agregar</button>
    </form>
   </section>
   <section>
    <h2 id="modificar">Modificar Almacenes</h2>
    <form  method="post" action="almacenes.php" class="form-modificar-almacenes">
        <input type="hidden" name="accion" value="modificar">

        <label for="modificarCodigoAlmacen" class="form-modificar-almacen-label">Código:</label>
        <input type="text" id="modificarCodigoAlmacen" name="codigo" class="form-modificar-almacen-input" placeholder="Código del Almacén" required>
        
        <label for="modificarNombreAlmacen" class="form-modificar-almacen-label">Nombre:</label>
        <input type="text" id="modificarNombreAlmacen" name="nombre" class="form-modificar-almacen-input" placeholder="Nombre del Almacén" required>
        
        <label for="modificarTelefonoAlmacen" class="form-modificar-almacen-label">Teléfono:</label>
        <input type="number" id="modificarTelefonoAlmacen" name="telefono" class="form-modificar-almacen-input" placeholder="Teléfono del Almacén"required>

        <label for="codigomaterial" class="form-modificar-almacen-label" >Codigo del Material que Contiene: </label>
        <input type="text" id="codigomaterial" name="codigomaterial" class="form-modificar-almacen-input" placeholder="Material que Contiene" required/>
        
        <br>
        <button type="submit" class="form-modificar-almacen-button">Modificar</button>
    </form>
    
   </section>
   <section>
    <h2 id="eliminar">Eliminar Almacenes</h2>
    <form method="post" action="almacenes.php" class="form-eliminar-almacenes">
        <input type="hidden" name="accion" value="eliminar">

        <label for="eliminarCodigoAlmacen" class="form-eliminar-almacen-label">Código:</label>
        <input id="eliminarCodigoAlmacen" type="text" name="codigo" class="form-eliminar-almacen-input" placeholder="Código del Almacón" required>
        
        <br>
        <button type="submit" class="form-eliminar-almacen-button">Eliminar</button>
    </form>
   </section>
   <section>
        <h2>Tabla de Almacences</h2>
        <table class="table">
            <thead>
                <tr>
                    <th class="th2">Nombre</th>
                    <th class="th2">Código</th>
                    <th class="th2">Teléfono</th>
                    <th class="th2">Codigo Material</th>
                
                <tr>
            </thead>
            <tbody>
            <tbody>
                <?php include_once 'connection.php'?>
                <?php include_once 'almacenes.php'?>
                <?php foreach (getAlmacenes($pdo) as $almacen): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($almacen['nombre']); ?></td>
                        <td><?php echo htmlspecialchars($almacen['codigo']); ?></td>
                        <td><?php echo htmlspecialchars($almacen['telefono']); ?></td>
                        <td><?php echo htmlspecialchars($almacen['codigomaterial']); ?></td>
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