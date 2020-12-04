<div class="card">
  <div class="card-header" id="heading{{ $index }}">
    <h5 class="mb-0">
      <button class="btn btn-link" data-toggle="collapse" data-target="#collapse{{ $index }}" aria-expanded="{{ $index == 1 ? true : false }}" aria-controls="collapse{{ $index }}">
        {{ $name }}
        <small style="float:right; color:#0088ff">Opciones 2</small>
      </button>
    </h5>
  </div>

  <div id="collapse{{ $index }}" class="collapse {{ $index == 1 ? 'show' : '' }}" aria-labelledby="heading{{ $index }}" data-parent="#accordion">
    <div class="card-body">
    <div class="row">
        <div class="col-md-1">
          <span style="font-size:64px; color:#0088ff; line-height:56px">1</span>
        </div>
        <div class="col-md-8">
          <p>
            <strong>Comida Standard</strong><br />
            La cena incluye 1 proteína, 2 guarniciones, postre, bebida, 
            la vajilla, el salonero, el transporte y el hielo. 
            Nota: La bebida que se sirve es jugo.
          </p>
        </div>
        <div class="col-md-3 text-right">
          <span style="color:#0088ff">$13</span> x persona 
          <hr style="margin:10px 0" />
          <span style="color:#0088ff">de 15 a 50</span><br />personas
        </div>
      </div>
      <hr style="margin:10px 0 30px" />
      <div class="row">
        <div class="col-md-1">
          <span style="font-size:64px; color:#0088ff; line-height:56px">2</span>
        </div>
        <div class="col-md-8">
          <p>
            <strong>Comida Premium</strong><br />
            La cena incluye 1 proteína, 2 guarniciones, postre, bebida, 
            la vajilla, el salonero, el transporte y el hielo. 
            Nota: La bebida que se sirve es jugo.
          </p>
        </div>
        <div class="col-md-3 text-right">
          <span style="color:#0088ff">$13</span> x persona 
          <hr style="margin:10px 0" />
          <span style="color:#0088ff">de 15 a 50</span><br />personas
        </div>
      </div>
    </div>
  </div>
</div>