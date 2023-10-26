<?php
    require 'includes/app.php';
    incluirTemplate('header');
?>
  
    <section class="hero">
    
        <div class="contenido-hero">
            <h1>Tus Ideas Son Nuestro Norte</h1>
            <div class="ubicacion">
                <img src="/build/img/ubicacion.png" alt="icono ubicacion">
                <p>Talagante,</p>
                <p>RM.</p>         
            </div>
            <a class="boton" href="/">Contactar</a>
        </div> <!-- contenido-hero -->
    </section>

    <main class="contenedor sombra">
        <h2 class="areas">Áreas de Trabajo</h2>
        <div class="servicios">
            <div class="icono">
                <img src="build/img/icono1.svg" alt="Icono seguridad" loading="lazy">
                <h3>Contabilidad</h3>
                <p>Además de hacer tu declaración de impuestos mensual y anual, optimizamos tus planillas de cálculo para que todo tu proceso de control interno sea más eficiente y oportuno.
                   También contamos con herramientas actualizadas como Power BI para generar múltiples indicadores de gestión y KPIs. 
                </p>
            </div>
            <div class="icono">
                <img src="build/img/icono2.svg" alt="Icono Precio" loading="lazy">
                <h3>Marketing Digital</h3>
                <p>En la actualidad es imprescindible contar con herramientas que nos permitan llegar a nuestro cliente objetivo de una manera fácil y dinámica.
                    Para esto, contamos con especialistas en desarrollo web y campañas publicitarias para redes sociales.
                    Además de ayudamos en Google ADS.
                </p>
            </div>
            <div class="icono">
                <img src="build/img/icono3.svg" alt="Icono Tiempo" loading="lazy">
                <h3>Diseño Gráfico</h3>
                <p>Possimus, suscipit repudiandae. Autem deserunt aliquid deleniti sit minus consectetur obcaecati molestiae dolorem natus dolores reiciendis tempore, explicabo cum nobis laudantium. Voluptates?</p>
            </div>
            <div class="icono">
                <img src="build/img/icono3.svg" alt="Icono Tiempo" loading="lazy">
                <h3>Fotografía</h3>
                <p>Possimus, suscipit repudiandae. Autem deserunt aliquid deleniti sit minus consectetur obcaecati molestiae dolorem natus dolores reiciendis tempore, explicabo cum nobis laudantium. Voluptates?</p>
            </div>
        </div> 
    </main>

    <section class="contenedor">
        <h2>Reutilizamos Envases de Vidrio</h2>
        
        <?php
            include 'includes/templates/anuncios.php';
        ?>

        <div class="alinear-derecha">
            <a href="anuncios.php" class="boton-lila">Ver Todas</a>
        </div>
    </section>

        <section class="imagen-contacto">
            <h2>Encuentra la casa de tus sueños</h2>
            <p>Llena el formulario de contacto y un asesor se pondrá en contacto contigo a la brevedad</p>
            <a href="contacto.html" class="boton-amarillo">Contactános</a>
        </section>

    <div class="contenedor seccion seccion-inferior">
        <section class="blog">
            <h3>Nuestro Blog</h3>
            <article class="entrada-blog">
                <div class="imagen">
                    <picture>
                        <source srcset="build/img/img-web-4.webp" type="image/webp">
                        <source srcset="build/img/img-web-4.jpg" type="image/jpeg">
                        <img loading="lazy" src="build/img/img-web-4.jpg" alt="Texto Entrada Blog">
                    </picture>
                </div>
                <div class="texto-entrada">
                    <a href="entrada.html">
                        <h4>Terraza en el techo de tu casa</h4>
                        <p class="informacion-meta">Escrito el: <span>20/10/2021</span> por: <span>Admin</span> </p>
                        <p>
                            Consejos para construir una terraza en el techo de tu casa con los mejores materiales y ahorrando dinero
                        </p>
                    </a>
                </div>
            </article>
            <article class="entrada-blog">
                <div class="imagen">
                    <picture>
                        <source srcset="build/img/img-web-5.webp" type="image/webp">
                        <source srcset="build/img/img-web-5.jpg" type="image/jpeg">
                        <img loading="lazy" src="build/img/img-web-5.jpg" alt="Texto Entrada Blog">
                    </picture>
                </div>
                <div class="texto-entrada">
                    <a href="entrada.html">
                        <h4>Guía para la decoración de tu hogar</h4>
                        <p class="informacion-meta">Escrito el: <span>20/10/2021</span> por: <span>Admin</span> </p>
                        <p>
                            Maximiza el espacio en tu hogar con esta guia, aprende a combinar muebles y colores para darle vida a tu espacio
                        </p>
                    </a>
                </div>
            </article>
        </section>
        <section class="testimoniales">
            <h3>Testimoniales</h3>
            <div class="testimonial">
                <blockquote>
                    El personal se comportó de una excelente forma, muy buena atención y la casa que me ofrecieron cumple con todas mis expectativas.
                </blockquote>
                <p>- Roberto Bustamante</p>
            </div>
        </section>
    </div>

<?php
    incluirTemplate('footer');
?>