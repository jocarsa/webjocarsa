<?php include "inc/cabecera.php" ?>
            <section>
                <h3>Contacto</h3>
                <form action="procesa.php" method="POST">
                    <label for="nombre">
                        Introduce tu nombre:
                    </label><br>
                    <input type="text" name="nombre" id="nombre" class="control"><br>
                    <label for="asunto">
                        Introduce el asunto de tu mensaje:
                    </label><br>
                    <input type="text" name="asunto" id="asunto" class="control"><br>
                    <label for="email">
                        Introduce tu email:
                    </label><br>
                    <input type="text" name="email" id="email" class="control"><br>
                    <label for="mensaje">
                        Introduce tu mensaje:
                    </label><br>
                    <textarea name="mensaje" id="mensaje" class="control"></textarea><br>
                    <input type="submit" disabled="true" id="botonEnviar">
                </form>
            </section>
            <aside>
                Diseñador Industrial. Experto en programación y gráficos 3d. Profesor en formación tanto presencial como online. Profesor en LinkedIn Learning y en Capitol Empresa. CEO y Fundador en JOCARSA. Desarrollo de Proyectos de Robótica, Infografía CGI, Visualización 3D Interactiva en Realidad Virtual operando el estado del arte de la tecnología.
            </aside>
            <script src="js/validarFormulario.js"></script>
<?php include "inc/piedepagina.php" ?>