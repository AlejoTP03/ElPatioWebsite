<!DOCTYPE html>
<html>
<head>
    <title>Gestión Proveedores</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <div class="container">
            <img src="img/Logo.jpg" class="logo"/>
            <h1>Gestion de Proveedores</h1>
            <nav>
                <ul>
                <li><a href="#agregar">Agregar Proveedores</a></li>
                <li><a href="#eliminar">Eliminar Proveedores</a></li>
                <li><a href="#modificar">Modificar Proveedores</a></li>
                <li><a href="#mostrar">Mostrar Proveedores</a></li>
                </ul>
            </nav>
        </div>
   </header>

   <section>
    <h2 id="agregar">Agregar Proveedores</h2>

    <form action="proveedor.php" method="post" class="form-agregar-proveedores">
        <input type="hidden" name="accion" value="agregar">

        <label for="agregarNombreProveedor" class="form-agregar-proveedor-label">Nombre:</label>
        <input type="text" id="agregarNombreProveedor" name="nombre" placeholder="Nombre del Proveedor" class="form-agregar-proovedor-input">

        <label for="agregarApellidoProveedor" class="form-agregar-proveedor-label">Apellido:</label>
        <input type="text" id="agregarApellidoProveedor" name="apellido" placeholder="Apellido del Proveedor" class="form-agregar-proovedor-input">

        <label for="agregarCiProveedor" class="form-agregar-proveedor-label">Ci:</label>
        <input type="text" id="agregarCiProveedor" name="ci" placeholder="Ci del Proveedor" class="form-agregar-proovedor-input">

        <label for="agregarMunicipioProveedor" class="form-agregar-proveedor-label">Municipio:</label>
        <input type="text" id="agregarMunicipioProveedor" name="municipio" placeholder="Municipio del Proveedor" class="form-agregar-proovedor-input">

        <label for="agregarProvinciaProveedor" class="form-agregar-proveedor-label">Provincia:</label>
        <input type="text" id="agregarProvinciaProveedor" name="provincia" placeholder="Provincia del Proveedor" class="form-agregar-proovedor-input">
        
        <label for="codigomaterial" class="form-agregar-proveedor-label" >Codigo del Material: </label>
        <input type="text" id="codigomaterial" name="codigomaterial" class="form-agregar-proovedor-input" placeholder="Material que Contiene" required/>
       
        
        <br>
        <button type="submit" class="form-agregar-proovedor-button">Agregar</button>
    </form>
   </section>

   <section>
    <h2 id="modificar">Modificar Proveedores</h2>

    <form action="proveedor.php" method="post" class="form-agregar-proveedores">
        <input type="hidden" name="accion" value="modificar">
        
        <label for="modificarCiProveedor" class="form-modificar-proveedor-label">Ci:</label>
        <input type="text" id="modificarCiProveedor" name="ci" placeholder="Ci del Proveedor" class="form-modificar-proveedor-input">
        
        
        <label for="modificarNombreProveedor" class="form-modificar-proveedor-label">Nombre:</label>
        <input type="text" id="modificarNombreProveedor" name="nombre" placeholder="Nombre del Proveedor" class="form-modificar-proveedor-input">

        
        <label for="modificarApellidoProveedor" class="form-modificar-proveedor-label">Apellido:</label>
        <input type="text" id="modificarApellidoProveedor" name="apellido" placeholder="Apellido del Proveedor" class="form-modificar-proveedor-input">

        
        <label for="modificarMunicipioProveedor" class="form-modificar-proveedor-label">Municipio:</label>
        <input type="text" id="modificarMunicipioProveedor" name="municipio" placeholder="Municipio del Proveedor" class="form-modificar-proveedor-input">

        
        <label for="modificarProvinciaProveedor" class="form-modificar-proveedor-label">Provincia:</label>
        <input type="text" id="modificarProvinciaProveedor" name="provincia" placeholder="Provincia del Proveedor" class="form-modificar-proveedor-input">
        
        <label for="codigomaterial" class="form-modificar-proveedor-label" >Codigo del Material: </label>
        <input type="text" id="codigomaterial" name="codigomaterial" class="form-agregar-proovedor-input" placeholder="Material que Contiene" required/>

        <br>
        <button type="submit" class="form-modificar-proveedor-button">Modificar</button>
    </form>
   </section>

   <section>
    <h2 id="eliminar">Eliminar Proveedores</h2>

    <form action="proveedor.php" method="POST" class="form-eliminar-proveedor">
        <input type="hidden" name="accion" value="eliminar">

        <label for="eliminarProveedor" class="form-eliminar-proveedor-label">Ci:</label>
        <input type="text" id="eliminarProveedor" name="ci" placeholder="Ci del Proveedor" class="form-eliminar-proveedor-input">

        <br>
        <button type="submit" class="form-eliminar-proveedor-button">Eliminar</button>
    </form>
   </section>

   <section>
    <section>
        <h2>Tabla de Proveedores</h2>
        <table class="table">
            <thead>
                <tr>
                    <th class="th2">Nombre</th>
                    <th class="th2">Apellido</th>
                    <th class="th2">CI</th>
                    <th class="th2">Municipio</th>
                    <th class="th2">Provincia</th>
                    <th class="th2">Material</th>
                
                <tr>
            </thead>
            <tbody>
            <tbody>
                <?php include_once 'connection.php'?>
                <?php include_once 'proveedor.php'?>
                <?php foreach (getProveedores($pdo) as $proveedor): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($proveedor['nombre']); ?></td>
                        <td><?php echo htmlspecialchars($proveedor['apellido']); ?></td>
                        <td><?php echo htmlspecialchars($proveedor['ci']); ?></td>
                        <td><?php echo htmlspecialchars($proveedor['municipio']); ?></td>
                        <td><?php echo htmlspecialchars($proveedor['provincia']); ?></td>
                        <td><?php echo htmlspecialchars($proveedor['codigomaterial']); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>

            </tbody>
            
        </table>
   </section>
   </section>
</body>
</html>