<?php
  require 'includes/funciones.php';
  incluirTemplate('header');
?>
    <main class="contenedor">
      <h1>Conoce Sobre Nosotros</h1>
      <div class="contenido-nosotros">
        <div class="imagen">
          <picture>
            <source srcset="build/img/nosotros.webp" type="image/webp" />
            <source srcset="build/img/nosotros.jpg" type="image/jpeg" />
            <img
              loading="lazy"
              src="build/img/nosotros.jpg"
              alt="Sobre Nosotros"
            />
          </picture>
        </div>
        <div class="texto-nosotros">
          <blockquote>25 años de experiencia</blockquote>
          <p>
            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Hic illo
            fugit deserunt cupiditate numquam esse tempora corrupti sapiente
            dignissimos molestiae aliquid enim ipsa, corporis, beatae voluptas,
            porro atque assumenda voluptatem. Lorem ipsum dolor sit, amet
            consectetur adipisicing elit. Aliquid quia culpa suscipit sequi ad
            similique aperiam ut, quasi assumenda veritatis, laborum veniam,
            enim iure commodi facere ipsum nostrum dolores exercitationem!
          </p>
          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam,
            ipsam! At odit necessitatibus labore alias quibusdam ipsa officiis
            ipsum. Ad animi pariatur error sint excepturi sunt perferendis
            obcaecati illum quisquam.
          </p>
        </div>
      </div>
    </main>
    <section class="contenedor">
      <h1>Mas Sobre Nosotros</h1>
      <div class="iconos-nosotros">
        <div class="icono">
          <img
            src="build/img/icono1.svg"
            alt="Icono seguridad"
            loading="lazy"
          />
          <h3>Seguridad</h3>
          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi,
            voluptate ut. Sit eos assumenda nam alias vitae aspernatur cum
            mollitia, dicta temporibus molestias omnis, eius possimus cumque
            voluptatibus sapiente enim.
          </p>
        </div>
        <div class="icono">
          <img src="build/img/icono2.svg" alt="Icono Precio" loading="lazy" />
          <h3>Precio</h3>
          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi,
            voluptate ut. Sit eos assumenda nam alias vitae aspernatur cum
            mollitia, dicta temporibus molestias omnis, eius possimus cumque
            voluptatibus sapiente enim.
          </p>
        </div>
        <div class="icono">
          <img src="build/img/icono3.svg" alt="Icono Tiempo" loading="lazy" />
          <h3>A Tiempo</h3>
          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi,
            voluptate ut. Sit eos assumenda nam alias vitae aspernatur cum
            mollitia, dicta temporibus molestias omnis, eius possimus cumque
            voluptatibus sapiente enim.
          </p>
        </div>
      </div>
    </section>
<?php
  incluirTemplate('footer'); 
?>
