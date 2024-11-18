<!DOCTYPE html>
<html lang="en">
<head>
    <title>Gestion Empleados</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <div class="container">
            <img src="img/Logo.jpg" class="logo"/>
            <h1>Gestion de Empleados</h1>
            <nav>
                <ul>
                <li><a href="#agregar">Agregar Empleado</a></li>
                <li><a href="#eliminar">Eliminar Empleado</a></li>
                <li><a href="#modificar">Modificar Empleado</a></li>
                <li><a href="#mostrar">Mostrar Empleados</a></li>
                </ul>
            </nav>
        </div>
   </header>
   <section>
    <h2 id="agregar">Agregar Empleados</h2>
    <form action="empleados.php" method="post" class="form-agregar-empleados">
        <input type="hidden" name="accion" value="agregar">

        <label for="modificarCiEmpleado" class="form-agregar-empleado-label">Ci:</label>
        <input type="text" id="modificarCiEmpleado" name="ci" class="form-agregar-empleado-input" placeholder="Ci del Empleado">
        
        <label for="modificarNombreEmpleado" class="form-agregar-empleado-label">Nombre:</label>
        <input type="text" id="modificarNombreEmpleado" name="nombre" class="form-agregar-empleado-input" placeholder="Nombre del Empleado">
        
        <label for="modificarApellidoEmpleado" class="form-agregar-empleado-label">Apellido:</label>
        <input type="text" id="modificarApellidoEmpleado" name="apellido" class="form-agregar-empleado-input" placeholder="Apellido del Empleado">
        
        <label for="modificarTelefonoEmpleado" class="form-agregar-empleado-label">Teléfono:</label>
        <input type="text" id="modificarTelefonoEmpleado" name="telefono" class="form-agregar-empleado-input" placeholder="Teléfono del Empleado">
        
        <label for="modificarDireccionEmpleado" class="form-agregar-empleado-label">Dirección:</label>
        <input type="text" id="modificarDireccionEmpleado" name="direccion" class="form-agregar-empleado-input" placeholder="Dirección del Empleado">

        <label for="idalmacen"  >Almacen en que trabaja: </label>
        <input type="text" id="idalmacen" name="idalmacen"  placeholder="Almacen en que trabaja" required/>
        
        <br>
        <button type="submit">Agregar</button>
    </form>
   </section>
   <section>
    <h2 id="modificar">Modificar Empleados</h2>
    <form action="empleados.php" method="post" class="form-modificar-empleado">
        <input type="hidden" name="accion" value="modificar">

        <label for="modificarCiEmpleado" class="form-modificar-empleado-label">Ci:</label>
        <input type="text" id="modificarCiEmpleado" name="ci" class="form-modificar-empleado-input" placeholder="Ci del Empleado">
        
        <label for="modificarNombreEmpleado" class="form-modificar-empleado-label">Nombre:</label>
        <input type="text" id="modificarNombreEmpleado" name="nombre" class="form-modificar-empleado-input" placeholder="Nombre del Empleado">
        
        <label for="modificarApellidoEmpleado" class="form-modificar-empleado-label">Apellido:</label>
        <input type="text" id="modificarApellidoEmpleado" name="apellido" class="form-modificar-empleado-input" placeholder="Apellido del Empleado">
        
        <label for="modificarTelefonoEmpleado" class="form-modificar-empleado-label">Teléfono:</label>
        <input type="text" id="modificarTelefonoEmpleado" name="telefono" class="form-modificar-empleado-input" placeholder="Teléfono del Empleado">
        
        <label for="modificarDireccionEmpleado" class="form-modificar-empleado-label">Dirección:</label>
        <input type="text" id="modificarDireccionEmpleado" name="direccion" class="form-modificar-empleado-input" placeholder="Dirección del Empleado">

        <label class="form-modificar-empleado-label" for="idalmacen"  >Almacen en que trabaja: </label>
        <input class="form-modificar-empleado-input" type="text" id="idalmacen" name="idalmacen"  placeholder="Almacen en que trabaja" required/>

        <br>
        <button type="submit" class="form-modificar-empleado-button">Modificar</button>
    </form>   
    
   </section>
   <section>
    <h2 id="eliminar">Eliminar Empleados</h2>
    <form action="empleados.php" method="post" class="form-eliminar-empleado">
        <input type="hidden" name="accion" value="eliminar">

        <label for="eliminarCiEmpleado" class="form-eliminar-empleado-label">Ci:</label>
        <input id="eliminarCiEmpleado" type="text" name="ci" class="form-eliminar-empleado-input" placeholder="Ci del Empleado">
        
        <br>
        <button class="form-eliminar-empleado-button">Eliminar</button>
    </form>
    
   </section>
   <section>
    <h2>Tabla de Empleados</h2>
    <table class="table">
            <thead>
                <tr>
                    <th class="th2">Nombre</th>
                    <th class="th2">Apellido</th>
                    <th class="th2">CI</th>
                    <th class="th2">Teléfono</th>
                    <th class="th2">Direccion</th>
                    <th class="th2">Almacen</th>
                
                <tr>
            </thead>
            <tbody>
            <tbody>
                <?php include_once 'connection.php'?>
                <?php include_once 'empleados.php'?>
                <?php foreach (getEmpleados($pdo) as $empleado): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($empleado['nombre']); ?></td>
                        <td><?php echo htmlspecialchars($empleado['apellido']); ?></td>
                        <td><?php echo htmlspecialchars($empleado['ci']); ?></td>
                        <td><?php echo htmlspecialchars($empleado['telefono']); ?></td>
                        <td><?php echo htmlspecialchars($empleado['direccion']); ?></td>
                        <td><?php echo htmlspecialchars($empleado['idalmacen']); ?></td>
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