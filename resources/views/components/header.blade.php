@if ($menu == "true")
<div class="header">
  <div class="container">
    <a href="#" class="menu-toggle"><i class="fe fe-menu"></i></a>
    <ul class="menu">
      <li class="has-childs">
        <a href="https://ciudaddelsaber.org/que-es-ciudad-del-saber/">Nosotros</a>
        <ul>
          <li><a href="https://ciudaddelsaber.org/que-es-ciudad-del-saber/">¿Qué es Ciudad del Saber?</a></li>
          <li><a href="https://ciudaddelsaber.org/que-hay-en-el-campus/">¿Qué hay en el campus?</a></li>
          <li><a href="https://ciudaddelsaber.org/nuestra-mision/">Nuestra misión</a></li>
          <li><a href="https://ciudaddelsaber.org/nuestra-vision/">Nuestra visión</a></li>
          <li><a href="https://ciudaddelsaber.org/nuestro-equipo/">Nuestro equipo</a></li>
          <li><a href="https://ciudaddelsaber.org/gobierno-corporativo/">Gobierno corporativo</a></li>
        </ul>
      </li>
      <li class="has-childs">
        <a href="https://ciudaddelsaber.org/conoce-la-historia/">Visítanos</a>
        <ul>
          <li><a href="https://ciudaddelsaber.org/conoce-la-historia/">Conoce la historia</a></li>
          <li><a href="https://ciudaddelsaber.org/asiste-a-una-conferencia-o-a-un-concierto/">Asiste a una conferencia o a un concierto</a></li>
          <li><a href="https://ciudaddelsaber.org/ven-a-comer-y-a-hacer-compras/">Ven a comer y a hacer compras</a></li>
          <li><a href="https://ciudaddelsaber.org/con-la-familia-aire-libre-y-deportes/">Con la familia, aire libre y deportes</a></li>
          <li><a href="https://ciudaddelsaber.org/trae-tus-materiales-al-reciclaje/">Trae tus materiales para reciclar</a></li>
          <li><a href="https://ciudaddelsaber.org/usa-el-transporte-publico/">Usa el transporte público</a></li>
        </ul>
      </li>
      <li class="has-childs">
        <a href="/">Servicios</a>
        <ul>
          <li><a href="/ateneo">Ateneo</a></li>
          <li><a href="/centro-convenciones">Centro de convenciones</a></li>
          <li><a href="/aulas-105">Aulas 105</a></li>
          <li><a href="https://live.ipms247.com/booking/book-rooms-complejodehospedaje-es-Spanish" target="_blank">Complejo de hospedaje</a></li>
          <!--<li><a href="/residencias">Residencias</a></li>-->
          <?php if (session()->get('is-cds-user')) : ?>
          <li><a href="/espacios-fcds">Espacios FCdS</a></li>
          <?php endif ?>
        </ul>
      </li>
      <li class="has-childs">
        <a href="https://ciudaddelsaber.org/proximos-eventos/">Eventos</a>
        <ul>
          <li><a href="https://ciudaddelsaber.org/proximos-eventos/">Próximos eventos</a></li>
          <li><a href="https://ciudaddelsaber.org/eventos-pasados/">Eventos pasados</a></li>
        </ul>
      </li>
      <li class="has-childs">
        <a href="https://ciudaddelsaber.org/noticias/">Prensa</a>
        <ul>
          <li><a href="https://ciudaddelsaber.org/noticias/">Noticias</a></li>
          <li><a href="https://ciudaddelsaber.org/descargas/">Descargas</a></li>
          <li><a href="https://issuu.com/ciudaddelsaber/docs/cds_sapiens03">Revisat Sapiens</a></li>
        </ul>
      </li>
      <li class="has-childs">
        <a href="https://ciudaddelsaber.org/oportunidades/">Oportunidades</a>
        <ul>
          <li><a href="https://ciudaddelsaber.org/oportunidades/ofertas-academicas/">Ofertas académicas</a></li>
          <li><a href="https://ciudaddelsaber.org/oportunidades/empleos/">Empleos</a></li>
          <li><a href="https://ciudaddelsaber.org/oportunidades/convocatorias/">Convocatorias</a></li>
          <li><a href="https://ciudaddelsaber.org/oportunidades/pasantias/">Pasantías</a></li>
          <li><a href="https://ciudaddelsaber.org/oportunidades/becas/">Becas</a></li>
        </ul>
      </li>
      <li class="has-childs">
        <a href="https://ciudaddelsaber.org/temas/fundacion/">Temas</a>
        <ul>
          <li><a href="https://ciudaddelsaber.org/temas/fundacion/">Fundación</a></li>
          <li><a href="https://ciudaddelsaber.org/temas/formacion/">Formación</a></li>
          <li><a href="https://ciudaddelsaber.org/temas/emprendimiento/">Emprendimiento</a></li>
          <li><a href="https://ciudaddelsaber.org/temas/investigacion-desarrollo-innovacion/">I + D + i</a></li>
          <li><a href="https://ciudaddelsaber.org/temas/cooperacion-y-solidaridad/">Cooperación y solidaridad</a></li>
          <li><a href="https://ciudaddelsaber.org/temas/sostenibilidad/">Sostenibilidad</a></li>
          <li><a href="https://ciudaddelsaber.org/temas/cultura-comunidad/">Cultura y comunidad</a></li>
        </ul>
      </li>
      <li><a href="https://ciudaddelsaber.org/"><i class="fe fe-search"></i></a></li>
      <li><a href="https://ciudaddelsaber.org/en/">Inglés</a></li>
      <li><a href="https://ciudaddelsaber.org/">Español</a></li>
      <li><a href="https://ciudaddelsaber.org/wp-login.php"><i class="fe fe-lock"></i> Login</a></li>
      <li class="has-childs">
        <a href="https://ciudaddelsaber.org/ser-miembro/">Ser miembro</a>
        <ul>
          <li><a href="https://ciudaddelsaber.org/ser-miembro/empresas/">Empresas</a></li>
          <li><a href="https://ciudaddelsaber.org/ser-miembro/centro-de-innovacion">Emprendimientos</a></li>
          <li><a href="https://ciudaddelsaber.org/ser-miembro/programas-academicos">Programas académicos</a></li>
          <li><a href="https://ciudaddelsaber.org/ser-miembro/organismos-internacionales-y-ongs">Organismos internacionales y ONGs</a></li>
          <li><a href="https://ciudaddelsaber.org/ser-miembro/entidades-gubernamentales">Entidads gubernamentales</a></li>
          <li><a href="https://ciudaddelsaber.org/ser-miembro/servicios-comerciales">Servicios comerciales</a></li>
          <li><a href="https://ciudaddelsaber.org/directorio/">Directorio</a></li>
        </ul>
      </li>
    </ul>
    <a href="https://ciudaddelsaber.org" class="logo">
      <img src="/assets/images/logo-white.png" />
    </a>
  </div>
</div>
@else
<div class="header small">
  <div class="container">
    <a href="/" class="menu-toggle"><i class="fe fe-arrow-left"></i></a>
    <ul class="menu">
      <li><a href="/"><i class="fe fe-arrow reflect"></i> Volver al inicio</a></li>
    </ul>
    <a href="https://ciudaddelsaber.org" class="logo">
      <img src="/assets/images/logo-white.png" />
    </a>
  </div>
</div>
@endif