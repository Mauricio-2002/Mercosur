<?php
include_once 'crud.php';
include_once 'db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MERCOSUR</title>
    <link rel="stylesheet" type="text/css" href="css/estilos.css">
    <link rel="shortcut icon" href="img/card.png">
</head>
<body>
    <H1 style="color: #ffffff"  align="center">MERCOSUR</H1>
    <center>
        <br>
        <br>
        <div id="form">
            <form method="post">
                <table width="100%" border="1" cellpadding="15" class="Tabla01">
                    <tr>
                        <td>
                            <input type="text" name="nombre" placeholder="Nombre" value="<?php if(isset($_GET['edit'])) echo $getROW['nombre']; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" name="tipo" placeholder="Tipo" value="<?php if(isset($_GET['edit'])) echo $getROW['tipo']; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" name="precio" placeholder="Precio" value="<?php if(isset($_GET['edit'])) echo $getROW['precio']; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" name="descripcion" placeholder="Descripción" value="<?php if(isset($_GET['edit'])) echo $getROW['descripcion']; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <select name="idpais" class="caja" style="width: 460px">
                                <option>Pais Importado</option>
                                <?php
                                    $resultSet = $MySQLiconn->query("SELECT idpais FROM pais");
                                    while ($rows = $resultSet->fetch_assoc()){
                                        # code...
                                        $idpais = $rows['idpais'];
                                        echo "<option value ='$idpais'>$idpais</option>";
                                    }
                                    
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <select name="idpais2" class="caja" style="width: 460px">
                                <option>Pais Exportado</option>
                                <?php
                                    $resultSet = $MySQLiconn->query("SELECT idpais2 FROM pais2");
                                    while ($rows = $resultSet->fetch_assoc()){
                                        # code...
                                        $idpais2 = $rows['idpais2'];
                                        echo "<option value ='$idpais2'>$idpais2</option>";
                                    }
                                    
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <?php
                            if (isset($_GET['edit'])){
                                ?>
                                <button type="submit" name="update">Editar</button>
                                <?php
                            }else{
                                ?>
                                <button type="submit" name="save">Registrar</button>
                                <?php
                            }
                            ?>
                        </td>
                    </tr>
                </table>
            </form>
            <br><br>
            <table width="100%" border="1" cellpadding="15" align="center" id="Tabla02">
                <tr>
                    <td>ID</td>
                    <td>Nombre</td>
                    <td>Tipo</td>
                    <td>Precio</td>
                    <td>Descripcion</td>
                    <td>Pais Import</td>
                    <td>Pais Export</td>
                    <td colspan="2">Acciones</td>
                </tr>
                <?php
                $res = $MySQLiconn->query("SELECT * FROM productos");
                while ($row=$res->fetch_array()){
                ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['nombre']; ?></td>
                    <td><?php echo $row['tipo']; ?></td>
                    <td><?php echo $row['precio']; ?></td>
                    <td><?php echo $row['descripcion']; ?></td>
                    <td><?php echo $row['idpais']; ?></td>
                    <td><?php echo $row['idpais2']; ?></td>
                    <td><a href="?edit=<?php echo $row['id'];?>" onclick="return confirm('Confrimar Edición')">Editar</a></td>
                    <td><a href="?del=<?php echo $row['id'];?>" onclick="return confirm('Confrimar Eliminación')">Eliminar</a></td>
                </tr>
                <?php
                }
                ?>
            </table>
        </div>
    </center>
</body>
</html>