<?php
  require 'includes/funciones.php';
  incluirTemplate('header');
?>
    <main class="contenedor seccion contenido-centrado">
      <h1>Guia para la decoracion de tu hogar</h1>

      <picture>
        <source srcset="build/img/destacada2.webp" type="image/webp" />
        <source srcset="build/img/destacada2.jpg" type="image/jpeg" />
        <img
          src="build/img/destacada2.jpg"
          alt="Imagen de la propiedad"
          loading="lazy"
        />
      </picture>
      <p class="informacion-meta">
        Escrito el: <span>20/10/2024</span> por: <span>Admin</span>
      </p>
      <div class="resumen-propiedad">
        <p>
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Id magnam
          fugiat ab. Nisi dicta quae perspiciatis autem vitae dolores mollitia
          quas, id non laboriosam doloremque eum nam assumenda. Vero,
          perspiciatis! Lorem ipsum dolor sit amet consectetur adipisicing elit.
          Laudantium, ad perferendis quis, possimus placeat sequi officiis
          dignissimos nemo in facere amet ullam reprehenderit magni suscipit
          architecto maxime corrupti excepturi omnis? Lorem ipsum, dolor sit
          amet consectetur adipisicing elit. Dolorem officiis rem aut cumque
          odio, fuga amet voluptate accusamus possimus. Quis, molestiae ratione
          nobis ex iusto laudantium id nemo aspernatur veniam?
        </p>
        <p>
          Lorem ipsum dolor sit amet consectetur, adipisicing elit. Officia
          deserunt ipsa asperiores fuga nam hic, rem, nihil commodi sapiente
          sunt ut vitae consectetur nesciunt deleniti illum? Odit a molestiae
          ipsum! Magnam nisi voluptatibus voluptate, consequuntur fugit numquam
          debitis eius incidunt dolor nemo aliquid est fugiat reiciendis vel
          architecto! Rem voluptates inventore culpa facilis praesentium debitis
          distinctio labore error molestias blanditiis!
        </p>
      </div>
    </main>
<?php
  incluirTemplate('footer'); 
?>
