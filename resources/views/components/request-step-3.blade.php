<div class="request-step">
  <div class="container">
    <h4>Estás a punto de terminar, <br>
      por favor verifica que los datos sean correctos</h4>
    <div class="row">
      <div class="col-12 col-md-6">
        <div class="form-group-preview">
          Nombre: <?php echo session()->get('first_name') ?>
          <a href="/cotizacion/datos-contacto#first_name">Editar</a>
        </div>
      </div>
      <div class="col-12 col-md-6">
        <div class="form-group-preview">
          Apellidos: <?php echo session()->get('last_name') ?>
          <a href="/cotizacion/datos-contacto#last_name">Editar</a>
        </div>
      </div>
      <div class="col-12 col-md-6">
        <div class="form-group-preview">
          Correo: <?php echo session()->get('email') ?>
          <a href="/cotizacion/datos-contacto#email">Editar</a>
        </div>
      </div>
      <div class="col-12 col-md-6">
        <div class="form-group-preview">
          Teléfono: <?php echo session()->get('phone') ?>
          <a href="/cotizacion/datos-contacto#phone">Editar</a>
        </div>
      </div>
      <div class="col-12 col-md-6">
        <div class="form-group-preview">
          Organización: <?php echo session()->get('company') ?>
          <a href="/cotizacion/datos-contacto#company">Editar</a>
        </div>
      </div>
      <div class="col-12 col-md-6">
        <div class="form-group-preview">
          RUC: <?php echo session()->get('00N3m00000QQOde') ?>
          <a href="/cotizacion/datos-contacto#identification">Editar</a>
        </div>
      </div>
    </div>
    <div class="row" style="margin-top:40px">
      <div class="col-12 col-md-6">
        <div class="form-group-preview">
          Evento: <?php echo session()->get('00N3m00000QQOdA') ?>
          <a href="/cotizacion/datos-evento#name">Editar</a>
        </div>
      </div>
      <div class="col-12 col-md-6">
        <div class="form-group-preview">
          Tipo de actividad: <?php echo session()->get('00N3m00000QMsCF') ?>
          <a href="/cotizacion/datos-evento#type">Editar</a>
        </div>
      </div>
      <div class="col-12 col-md-6">
        <div class="form-group-preview">
          Cantidad de personas: <?php echo session()->get('00N3m00000QMsCA') ?>
          <a href="/cotizacion/datos-evento#quantity">Editar</a>
        </div>
      </div>
      <div class="col-12 col-md-6">
        <div class="form-group-preview">
          Cómo imaginas tu actividad: <?php echo session()->get('00N3m00000QMsC5') ?>
          <a href="/cotizacion/datos-evento#how">Editar</a>
        </div>
      </div>
      <div class="col-12 col-md-6">
        <div class="form-group-preview">
          Desde: <?php echo session()->get('00N3m00000QMwta') ?>
          <a href="/cotizacion/datos-evento#start-date">Editar</a>
        </div>
      </div>
      <div class="col-12 col-md-6">
        <div class="form-group-preview">
          Hasta: <?php echo session()->get('00N3m00000QMwtf') ?>
          <a href="/cotizacion/datos-evento#end-date">Editar</a>
        </div>
      </div>
      <div class="col-12 col-md-6">
      </div>
      <div class="col-12 col-md-6">
        <div class="form-group-preview">
          Mis fechas <?php echo session()->get('00N3m00000QQOdy') == 1 ? 'SI' : 'NO' ?> son flexibles
          <a href="/cotizacion/datos-evento#variable-dates">Editar</a>
        </div>
      </div>
    </div>
    <div class="row" style="margin-top:40px">
      <div class="col-12 col-md-6">
        <div class="form-group-preview">
          <?php echo session()->get('00N3m00000QMsCK') == 'Si' ? 'SI' : 'NO' ?> necesito hospedaje
          <a href="/cotizacion/datos-evento#lodging">Editar</a>
        </div>
      </div>
      <div class="col-12 col-md-6">
        <div class="form-group-preview">
          <?php echo session()->get('00N3m00000QMsCP') == 'Si' ? 'SI' : 'NO' ?> necesito catering
          <a href="/cotizacion/datos-evento#catering">Editar</a>
        </div>
      </div>
      <div class="col-12">
        <div class="form-group-preview">
          <small>Describe tu evento</small>
          <?php echo session()->get('description') ?>
          <br /><br /><br />
          <a href="/cotizacion/datos-evento#description">Editar</a>
        </div>
      </div>
      <!--
      <div class="col-12 col-md-6">
        <p style="line-height:1rem; margin-top:47px"><small>Puedes compartir la agenda de tu evento,  material 
          promocional o cualquier otro documento que nos ayude a 
          entender mejor tus necesidades</small></p>
        <div class="form-group-preview">
          globalgame.docx
          <a href="#" style="margin-right:36px">Borrar</a>
          <i class="fe fe-upload"></i>
        </div>
      </div>
      -->
    </div>
    <div class="row" style="margin-top:40px">
      <div class="col-12 text-center">
        <p style="color:#0088ff; font-family:'Roboto', sans-serif; font-size:14px">Esta solicitud está sujeta a la disponibilidad de 
          los espacios al momento de ser procesada 
          por el equipo de la Ciudad del Saber</p>
      </div>
    </div>
    <div class="row buttons">
      <div class="col-12 text-center">
        <?php 
        $from_date = session()->get('00N3m00000QMwta') . ':00';
        $to_date   = session()->get('00N3m00000QMwtf') . ':00';
        ?>
        <input type=hidden name="oid" value="00D1N000002MAgJ">
        <input type=hidden name="retURL" value="https://comercial.ciudaddelsaber.org/cotizacion/solicitud-enviada"> 
        <input type="hidden" value="<?php echo session()->get('first_name') ?>" name="first_name" id="first_name" />
        <input type="hidden" value="<?php echo session()->get('last_name') ?>" name="last_name" id="last_name" />
        <input type="hidden" value="<?php echo session()->get('email') ?>" name="email" id="email" />
        <input type="hidden" value="<?php echo session()->get('phone') ?>" name="phone" id="phone" />
        <input type="hidden" value="<?php echo session()->get('company') ?>" name="company" id="company" />
        <input type="hidden" value="<?php echo session()->get('00N3m00000QQOde') ?>" name="00N3m00000QQOde" id="00N3m00000QQOde" />
        <input type="hidden" value="<?php echo session()->get('00N3m00000QQOdA') ?>" name="00N3m00000QQOdA" id="00N3m00000QQOdA" />
        <input type="hidden" value="<?php echo session()->get('00N3m00000QMsCF') ?>" name="00N3m00000QMsCF" id="00N3m00000QMsCF" />
        <input type="hidden" value="<?php echo session()->get('00N3m00000QMsCA') ?>" name="00N3m00000QMsCA" id="00N3m00000QMsCA" />
        <input type="hidden" value="<?php echo session()->get('00N3m00000QMsC5') ?>" name="00N3m00000QMsC5" id="00N3m00000QMsC5" />
        <input type="hidden" value="<?php echo $from_date ?>" name="00N3m00000QMwta" id="00N3m00000QMwta" />
        <input type="hidden" value="<?php echo $to_date ?>" name="00N3m00000QMwtf" id="00N3m00000QMwtf" />
        <input type="hidden" value="<?php echo session()->get('00N3m00000QQOdy') ?>" name="00N3m00000QQOdy" id="00N3m00000QQOdy" />
        <input type="hidden" value="<?php echo session()->get('00N3m00000QMsCK') ?>" name="00N3m00000QMsCK" id="00N3m00000QMsCK" />
        <input type="hidden" value="<?php echo session()->get('00N3m00000QMsCP') ?>" name="00N3m00000QMsCP" id="00N3m00000QMsCP" />
        <input type="hidden" value="<?php echo session()->get('description') ?>" name="description" id="description" />
        <input type="hidden" value="<?php echo session()->get('recordType') ?>" name="recordType" id="recordType" />
        <button type="submit" class="btn btn-primary submit-form">Confirmar</button>
      </div>
    </div>
  </div>
</div>