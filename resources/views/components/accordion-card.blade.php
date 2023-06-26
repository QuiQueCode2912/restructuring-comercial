<div class="card">
  <div class="card-header" id="heading{{ $index }}">
    <h5 class="mb-0">
      <button class="btn btn-link" data-toggle="collapse" data-target="#collapse{{ $index }}" aria-expanded="{{ $index == 1 ? true : false }}" aria-controls="collapse{{ $index }}">
        {{ $name }}
        <small style="float:right; color:#0088ff">
        @switch($name)
          @case('Coffee breaks') 4 opciones @break
          @case('Lunch boxes') 1 opción @break
          @case('Almuerzos') 2 opciones @break
        @endswitch
        </small>
      </button>
    </h5>
  </div>

  <div id="collapse{{ $index }}" class="collapse {{ $index == 1 ? 'show' : '' }}" aria-labelledby="heading{{ $index }}" data-parent="#accordion">
    <div class="card-body">
    @switch($name)
    @case('Coffee breaks')
      <div class="row">
        <div class="col-md-1">
          <span class="large-number">1</span>
        </div>
        <div class="col-md-8">
          <p>
            <strong>Coffee break</strong><br />
            Incluye café, té, y agua en dispensador.
          </p>
        </div>
        <div class="col-md-3 text-right">
          <span style="color:#0088ff">El precio varía según lo solicitado</span> 
        </div>
      </div>
      <hr style="margin:10px 0 30px" />
      <div class="row">
        <div class="col-md-1">
          <span class="large-number">2</span>
        </div>
        <div class="col-md-8">
          <p>
            <strong>Coffee break</strong><br />
            Incluye 4 boquitas por persona (1 proteina, 2 carbohidratos, 1 postre) 
            café, té , agua en dispensador y jugo ó soda. Servido en desechables.
          </p>
        </div>
        <div class="col-md-3 text-right">
          <span style="color:#0088ff">El precio varía según lo solicitado</span> 
        </div>
      </div>
      <hr style="margin:10px 0 30px" />
      <div class="row">
        <div class="col-md-1">
          <span class="large-number">3</span>
        </div>
        <div class="col-md-8">
          <p>
            <strong>Coffee break</strong><br />
            Incluye 5 boquitas por persona (2 proteinas, 2 carbohidratos, 1 postre) café, té , 
            agua en dispensador y jugo ó soda. Servido en desechables
          </p>
        </div>
        <div class="col-md-3 text-right">
          <span style="color:#0088ff">El precio varía según lo solicitado</span> 
        </div>
      </div>
      <hr style="margin:10px 0 30px" />
      <div class="row">
        <div class="col-md-1">
          <span class="large-number">4</span>
        </div>
        <div class="col-md-8">
          <p>
            <strong>Coffee break</strong><br />
            Incluye 6 boquitas por persona (2 proteinas, 2 carbohidratos, 2 postres) café, 
            té , agua en dispensador y jugo ó soda. Servido en desechables
          </p>
        </div>
        <div class="col-md-3 text-right">
          <span style="color:#0088ff">El precio varía según lo solicitado</span> 
        </div>
      </div>
    @break
    @case('Lunch boxes')
      <div class="row">
        <div class="col-md-1">
          <span class="large-number">1</span>
        </div>
        <div class="col-md-8">
          <p>
            <strong>Lunch box</strong><br />
            El lunch box incluye un emparedado o ensalada, chips, mini postre, 
            soda ó jugo empacado en bolsa de papel
          </p>
        </div>
        <div class="col-md-3 text-right">
          <span style="color:#0088ff">El precio varía según lo solicitado</span> 
        </div>
      </div>
    @break
    @case('Almuerzos')
      <div class="row">
        <div class="col-md-1">
          <span class="large-number">1</span>
        </div>
        <div class="col-md-8">
          <p>
            <strong>Almuerzo</strong><br />
            Comida incluye 1 proteina, 2 guarniciones, postre, bebida, la vajilla, 
            el transporte, y el hielo. No incluye salonero, pero se puede 
            coordinar por un costo adicional.
          </p>
        </div>
        <div class="col-md-3 text-right">
          <span style="color:#0088ff">El precio varía según lo solicitado</span> 
        </div>
      </div>
      <hr style="margin:10px 0 30px" />
      <div class="row">
        <div class="col-md-1">
          <span class="large-number">2</span>
        </div>
        <div class="col-md-8">
          <p>
            <strong>Almuerzo</strong><br />
            Comida incluye 2 proteinas, 2 guarniciones, postre, bebida, la vajilla, 
            el transporte, y el hielo. No incluye salonero, pero se puede coordinar 
            por un costo adicional.
          </p>
        </div>
        <div class="col-md-3 text-right">
          <span style="color:#0088ff">El precio varía según lo solicitado</span> 
        </div>
      </div>
    @break
    @endswitch
    </div>
  </div>
</div>