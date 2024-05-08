<?php

    class Controlador{
        function tablas($conexion){
            $peticion = "SHOW TABLES IN jocarsa;";
            $resultado = mysqli_query($conexion,$peticion);
            $cadena = "";
            while($fila = mysqli_fetch_assoc($resultado)){
                $cadena .= "<a href='?tabla=".$fila['Tables_in_jocarsa']."'><button>".$fila['Tables_in_jocarsa']."</button></a>";
            }
            return $cadena;
        }
        function eliminar($conexion,$tabla,$id){
            $peticion = "DELETE FROM ".$tabla." WHERE Identificador = ".$id.";";
            $resultado = mysqli_query($conexion,$peticion);    
        }
        function buscar($conexion,$tabla,$id){
            // Quiero averiguar el modelo de datos concreto de una tabla cualquiera
            $cadena = "<table>";
            /////////////////////////////////////////////// TITULOS DE LA TABLA
            $peticion = "SHOW COLUMNS FROM ".$tabla.";";
            $resultado = mysqli_query($conexion,$peticion);
            $cadena .= "<tr>";
            while($fila = mysqli_fetch_assoc($resultado)){
                $cadena .= "<th>".$fila['Field']."</th>";
            }
            $cadena .= "</tr>";
            ////////////////////////////////////////////// CONTENIDO DE LA TABLA
            $peticion = "SELECT * FROM ".$tabla." WHERE Identificador = ".$id.";";
            $resultado = mysqli_query($conexion,$peticion);    
            while($fila = mysqli_fetch_assoc($resultado)){
                $cadena .= "<tr>";
                foreach($fila as $clave=>$valor){
                    $cadena .= "<td>".$valor."</td>";
                }
                $cadena .= "</tr>";
            }
            $cadena .= "</table>";   
            return $cadena;
        }
        function listar($conexion,$tabla){
            // Quiero averiguar el modelo de datos concreto de una tabla cualquiera
            $cadena = "<table>";
            /////////////////////////////////////////////// TITULOS DE LA TABLA
            $peticion = "SHOW COLUMNS FROM ".$tabla.";";
            $resultado = mysqli_query($conexion,$peticion);
            $cadena .= "<tr>";
            while($fila = mysqli_fetch_assoc($resultado)){
                $cadena .= "<th>".$fila['Field']."</th>";
            }
            $cadena .= "<th>Operaciones</th>";
            $cadena .= "</tr>";
            ////////////////////////////////////////////// CONTENIDO DE LA TABLA
            $peticion = "SELECT * FROM ".$tabla.";";
            $resultado = mysqli_query($conexion,$peticion);    
            while($fila = mysqli_fetch_assoc($resultado)){
                $cadena .= "<tr>";
                foreach($fila as $clave=>$valor){
                    $cadena .= "<td>".$valor."</td>";
                }
                $cadena .= "<td><a href='?tabla=".$_GET['tabla']."&id=".$fila['Identificador']."'><button>X</button></a></td>";
                $cadena .= "</tr>";
            }
            $cadena .= "</table>";   
            return $cadena;
        }
        function insertar($conexion,$tabla){
            /////////////////////////////////////////////// TITULOS DE LA TABLA
            $peticion = "SELECT * FROM ".$tabla." LIMIT 1;";
            $resultado = mysqli_query($conexion,$peticion);
            $cadena = "<h3>Inserta un nuevo registro</h3>";
            $cadena .= "<form method='POST' action=?tabla=".$_GET['tabla']."&operacion=insertar>";
            while($fila = mysqli_fetch_assoc($resultado)){
                foreach($fila as $clave=>$valor){
                $cadena .= "<input type='text' placeholder='".$clave."' name='".$clave."'><br>";
                }
            }
            $cadena .= "<input type='submit'>";
            $cadena .= "</form>";
            return $cadena;
        }
        function procesaInsertar($conexion,$tabla){
            
            $peticion = "INSERT INTO ".$tabla." VALUES (";
            foreach($_POST as $clave=>$valor){
                $peticion .= "'".$valor."',";
            }
            $peticion = substr($peticion, 0, -1);
            $peticion .= ");";
            $resultado = mysqli_query($conexion,$peticion);
            
        }
    }

?>